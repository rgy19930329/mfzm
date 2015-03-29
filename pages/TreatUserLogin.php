<?php ob_start(); ?>
<meta charset="utf-8">

<?php include("ConnectDB.php") ?>

<?php 

	$userID = $_POST["userID"];
	$userPW = $_POST["userPW"];
	if(!isset($userID)||!isset($userPW)){
		echo "<script>location.href='userLogin.php';</script>";
		exit();
	}

	$sql = "SELECT userPW FROM userinfo_tb WHERE userID='$userID'";
	$res = mysql_query($sql);

	if(!mysql_affected_rows()){
		echo "<script>alert('登录失败！请检查id和密码是否正确');location.href='userLogin.php';</script>";
		exit();
	}

	$row = mysql_fetch_array($res);
	$passw = $row["userPW"];

	if($userPW == $passw){
		session_start();
		$_SESSION["userLoginFlag"] = "success";
		$_SESSION["userID"] = $userID;
		$url = "user.php";
		header("Location: $url"); 
	}else{
		echo "<script>alert('登录失败！请检查id和密码是否正确');location.href='userLogin.php';</script>";
	}
	
?>

<?php mysql_close($conn); ?>










