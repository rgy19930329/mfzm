<?php ob_start(); ?>

<?php 
	session_start();
	$bbsLoginFlag = null;
	if(isset($_SESSION["bbsLoginFlag"])){
		$bbsLoginFlag = $_SESSION["bbsLoginFlag"];
	}
	
	if($bbsLoginFlag != "success"){	
		echo "<script>location.href='bbsLogin.php';</script>";
		exit();
	}
?>

<?php include("ConnectDB.php") ?>

<?php 
	$userID = $_GET["userID"];
	$bbsID = $_SESSION["bbsID"];

	$sql = "SELECT userName FROM userinfo_tb WHERE bbsID='$bbsID' AND userID='$userID'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$userName = $row["userName"];
	header('Content-Type: text/plain');
	header('Content-Length: '.strlen($userName));
	if(isset($userName)){
		echo $userName;
	}else{
		echo "无此会员";
	}
	exit();
?>





