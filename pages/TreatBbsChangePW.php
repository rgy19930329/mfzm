<?php ob_start(); ?>
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

	$oldBbsPW = $_POST["oldBbsPW"];
	$newBbsPW = $_POST["newBbsPW"];
	$myAnswer = $_POST["answer"];

	if(!isset($oldBbsPW)||!isset($newBbsPW)||!isset($myAnswer)){
		$url = "bbsLogin.php";
		header("Location: $url");
		exit();
	}

	$sql = "SELECT bbsPW, bbsPWP FROM bbsinfo_tb WHERE bbsID='$bbsID'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);

	$bbsPW = $row["bbsPW"];
	$bbsPWP = $row["bbsPWP"];
	$answer = substr($bbsPWP, strpos($bbsPWP, "-")+1);

	if($oldBbsPW == $bbsPW && $myAnswer == $answer){
		$sql = "UPDATE bbsinfo_tb SET bbsPW='$newBbsPW' WHERE bbsID='$bbsID'";
		mysql_query($sql);
		echo "<script>alert('密码已更改！');location.href='bbsLogin.php';</script>";
	}else{
		echo "<script>alert('密码更改失败，请检查原密码以及密保问题的回答是否正确！');location.href='bbsChangePW.php';</script>";
	}
	
?>

<?php mysql_close($conn); ?>










