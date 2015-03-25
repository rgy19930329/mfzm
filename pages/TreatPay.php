
<meta charset="utf-8">

<?php 
	session_start();
	$userLoginFlag = null;
	if(isset($_SESSION["userLoginFlag"])){
		$userLoginFlag = $_SESSION["userLoginFlag"];
	}
	
	if($userLoginFlag !== "success"){	
		echo "<script>alert('对不起，您还未登录或者当前页面已过期！');location.href='userLogin.php';</script>";
		exit();
	}
?>

<?php include("ConnectDB.php") ?>

<?php 

	$userID = $_SESSION["userID"];
	$amount = $_POST["amount"];
	$userPW = $_POST["userPW"];

	if(!isset($amount)||!isset($userPW)){
		$url = "userLogin.php";
		header("Location: $url");
		exit();
	}

	$sql = "SELECT userPW FROM userinfo_tb WHERE userID='$userID'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$passw = $row["userPW"];

	if($userPW !== $passw){
		echo "<script>alert('支付密码不正确！');location.href='user.php';</script>";
		exit();
	}

	$sql = "SELECT bbsID FROM userinfo_tb WHERE userID='$userID'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$bbsID = $row["bbsID"];

	$sql = "INSERT INTO amountinfo_tb (userID, bbsID, time, amount) VALUES ('$userID', '$bbsID', now(), '$amount')";
	mysql_query($sql);
	$flag_1 = mysql_affected_rows();
	$sql = "UPDATE userinfo_tb SET remainAmount=remainAmount-'$amount' WHERE userID='$userID'";
	mysql_query($sql);
	$flag_2 = mysql_affected_rows();

	if($flag_1==0||$flag_2==0){
		echo "<script>alert('支付出现错误！');location.href='user.php';</script>";
	}else{
		echo "<script>alert('支付成功！');location.href='user.php';</script>";
	}
	
	mysql_close($conn);

?>











