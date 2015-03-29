<?php ob_start(); ?>
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

	$oldUserPW = $_POST["oldUserPW"];
	$newUserPW = $_POST["newUserPW"];
	$myAnswer = $_POST["answer"];

	if(!isset($oldUserPW)||!isset($newUserPW)||!isset($myAnswer)){
		$url = "userLogin.php";
		header("Location: $url");
		exit();
	}

	$sql = "SELECT userPW, userPWP FROM userinfo_tb WHERE userID='$userID'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);

	$userPW = $row["userPW"];
	$userPWP = $row["userPWP"];
	$answer = substr($userPWP, strpos($userPWP, "-")+1);

	if($oldUserPW == $userPW && $myAnswer == $answer){
		$sql = "UPDATE userinfo_tb SET userPW='$newUserPW' WHERE userID='$userID'";
		mysql_query($sql);
		echo "<script>alert('密码已更改！');location.href='userLogin.php';</script>";
	}else{
		echo "<script>alert('密码更改失败，请检查原密码以及密保问题的回答是否正确！');location.href='userChangePW.php';</script>";
	}
	
?>

<?php mysql_close($conn); ?>










