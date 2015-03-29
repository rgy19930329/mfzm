<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店家修改密码</title>

<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/bbsChangePW.css" rel="stylesheet" type="text/css" />

<style type="text/css">


</style>
</head>
<body>
<?php 
	session_start();
	$bbsLoginFlag = null;
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

	$sql = "SELECT bbsPWP FROM bbsinfo_tb WHERE bbsID='$bbsID'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$str = $row["bbsPWP"];
	$question = substr($str, 0, strpos($str, "-"));
?> 	
	
	<img class="logo" src="../static/img/logo.png">

	<div class="main">
		<p class="title">店家修改密码</p>
		<form action="TreatBbsChangePW.php" method="post" onsubmit="return check();">
			<p><input type="password" name="oldBbsPW" id="oldBbsPW" maxlength="20" placeholder="原密码"></p>
			<p><input type="password" name="newBbsPW" id="newBbsPW" maxlength="20" placeholder="新密码"></p>
			<p>问题：【<?php echo $question ?>】</p>
			<p><input type="text" name="answer" id="answer" maxlength="20" placeholder="请回答密保问题"></p>
			<p><input type="submit" value="修改密码"></p>
		</form>
		<hr>
		<p class="left link"><a href="../index.php">回首页</a></p>
		<p class="right link"><a href="bbshop.php">店家空间</a></p>
		<div class="cb"></div>
	</div>

	<iframe class="foot" src="footer.html"></iframe>
	
<script type="text/javascript">
function check(){

	var oldBbsPW = document.getElementById("oldBbsPW").value;
	var newBbsPW = document.getElementById("newBbsPW").value;
	var answer = document.getElementById("answer").value;

	if(oldBbsPW == ""){
		alert("原密码不能为空");
		return false;
	}

	if(newBbsPW == ""){
		alert("新密码不能为空");
		return false;
	}

	if(answer == ""){
		alert("请回答密保问题！");
		return false;
	}

	if(answer.length > 10){
		alert("密保问题不能超过10个字符！");
		return false;
	}

	return true;
}


</script>

</body>
</html>


