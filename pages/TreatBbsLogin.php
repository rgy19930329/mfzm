<?php ob_start(); ?>
<meta charset="utf-8">

<?php include("ConnectDB.php") ?>

<?php 

	$bbsID = $_POST["bbsID"];
	$bbsPW = $_POST["bbsPW"];

	$sql = "SELECT bbsPW FROM bbsinfo_tb WHERE bbsID='$bbsID'";
	$res = mysql_query($sql);
	$passw = array_shift(mysql_fetch_row($res));
	if($bbsPW == $passw){
		session_start();
		$_SESSION["bbsLoginFlag"] = "success";
		$_SESSION["bbsID"] = $bbsID;
		$url = "bbshop.php";
		header("Location: $url"); 
	}else{
		echo "<script>alert('登录失败！请检查店家id和密码是否正确');location.href='bbsLogin.php';</script>";
	}

?>

<?php mysql_close($conn); ?>










