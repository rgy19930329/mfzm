
<meta charset="utf-8">

<?php 
	session_start();
	$userLoginFlag = null;
	if(isset($_SESSION["userLoginFlag"])){
		$userLoginFlag = $_SESSION["userLoginFlag"];
	}
	
	if($userLoginFlag != "success"){	
		echo "<script>alert('对不起，您还未登录或者当前页面已过期！');location.href='userLogin.php';</script>";
		exit();
	}
?>

<?php include("ConnectDB.php") ?>

<?php 

	$userID = $_SESSION["userID"];

	$question = $_POST["question"];
	$answer = $_POST["answer"];

	if(!isset($question)||!isset($answer)){
		$url = "userLogin.php";
		header("Location: $url");
		exit();
	}

	$userPWP = $question."-".$answer;

	$sql = "UPDATE userinfo_tb SET userPWP='$userPWP' WHERE userID='$userID'";
	mysql_query($sql);

	if(mysql_affected_rows()){
		echo "<script>alert('密保设置成功！');location.href='userLogin.php';</script>";
	}else{
		echo "<script>alert('密保设置失败！');location.href='userLogin.php';</script>";
	}

?>

<?php mysql_close($conn); ?>










