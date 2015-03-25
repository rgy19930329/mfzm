
<meta charset="utf-8">

<?php 
	session_start();
	$userLoginFlag = null;
	if(isset($_SESSION["bbsLoginFlag"])){
		$bbsLoginFlag = $_SESSION["bbsLoginFlag"];
	}
	
	if($bbsLoginFlag != "success"){	
		echo "<script>alert('对不起，您还未登录或者当前页面已过期！');location.href='bbsLogin.php';</script>";
		exit();
	}
?>

<?php include("ConnectDB.php") ?>

<?php 

	$bbsID = $_SESSION["bbsID"];

	$question = $_POST["question"];
	$answer = $_POST["answer"];

	if(!isset($question)||!isset($answer)){
		$url = "bbsLogin.php";
		header("Location: $url");
		exit();
	}

	$bbsPWP = $question."-".$answer;

	$sql = "UPDATE bbsinfo_tb SET bbsPWP='$bbsPWP' WHERE bbsID='$bbsID'";
	mysql_query($sql);

	if(mysql_affected_rows()){
		echo "<script>alert('密保设置成功！');location.href='bbshop.php';</script>";
	}else{
		echo "<script>alert('密保设置失败！');location.href='bbsLogin.php';</script>";
	}
	
?>

<?php mysql_close($conn); ?>










