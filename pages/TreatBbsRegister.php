<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店家注册</title>
<style type="text/css">



</style>
</head>
<body>
	
<?php include("ConnectDB.php") ?>

<?php 

	$barberShop = $_POST["barberShop"];
	$bbsPW = $_POST["bbsPW"];
	$province = $_POST["province"];
	$city = $_POST["city"];
	$question = $_POST["question"];
	$answer = $_POST["answer"];
	$bbsPWP = $question."-".$answer;

	if(!isset($barberShop)||!isset($bbsPW)||!isset($province)||!isset($city)||!isset($question)||!isset($answer)){
		$url = "bbsRegister.php";
		header("Location: $url");
		exit();
	}
	
	if($province == "无" || $city == "无" || empty($city)){
		echo "<script>alert('请将地址信息输入完整！');location.href='bbsRegister.php';</script>";
		exit;
	}

	$location = $province."-".$city;

	$sql = "INSERT INTO bbsinfo_tb (barberShop, bbsPW, bbsPWP, startTime, location) VALUES ('$barberShop','$bbsPW', '$bbsPWP', now(), '$location')";
	mysql_query($sql);

	$sql = "SELECT max(bbsID) FROM bbsinfo_tb";
	$res = mysql_query($sql);
	$maxBbsID = array_shift(mysql_fetch_row($res));
	
	$tip = "[ $barberShop ]，恭喜贵店已注册成功！请记住您的帐号以供登录:".$maxBbsID;
	echo "<script>alert('$tip');location.href='bbsLogin.php';</script>";
	mysql_close($conn);
?>

<p><a href="../index.php">返回首页</a></p>

</body>
</html>