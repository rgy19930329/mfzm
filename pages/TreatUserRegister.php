<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>会员注册</title>
<style type="text/css">




</style>
</head>
<body>
<?php include("ConnectDB.php") ?>

<?php 

	$userName = $_POST["userName"];
	$userPW = $_POST["userPW"];
	$cardId = $_POST["cardId"];
	$bbsID = $_POST["bbsID"];

	$sql = "INSERT INTO userinfo_tb (userName, bbsID, userPW, cardId, startTime, remainAmount) VALUES ('$userName', '$bbsID','$userPW', '$cardId', now(), '0')";
	mysql_query($sql);

	$sql = "SELECT max(userID) FROM userinfo_tb";
	$res = mysql_query($sql);
	$maxUserId = array_shift(mysql_fetch_row($res));

	$tip = "[ $userName ]，恭喜您已注册成功！请记住您的帐号以供登录:".$maxUserId;
	echo "<script>alert('$tip');location.href='userLogin.php';</script>";
	mysql_close($conn);
?>

<p><a href="../index.php">返回首页</a></p>

</body>
</html>