<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店家登录</title>

<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/bbsLogin.css" rel="stylesheet" type="text/css" />

<style type="text/css">


</style>
</head>
<body>

	<img class="logo" src="../static/img/logo.png">

	<div class="main">
		<p class="title">店家登录</p>
		<form action="TreatBbsLogin.php" method="post" onsubmit="return check();">
			<p><input type="text" name="bbsID" id="bbsID" placeholder="店家id"></p>
			<p><input type="password" name="bbsPW" id="bbsPW" maxlength="20" placeholder="密码"></p>
			<p><input type="submit" value="登  录"></p>
		</form>
		<p class="tr f14"><a href="bbsFindPW_1.php">忘记登录密码？</a></p>
		<hr>
		<p class="link"><a href="../index.php">首页</a></p>
	</div>

	<iframe class="foot" src="footer.html"></iframe>

<script type="text/javascript">

function check(){

	var bbsID = document.getElementById("bbsID").value;
	var bbsPW = document.getElementById("bbsPW").value;

	if(bbsID == ""){
		alert("店家id不能为空");
		return false;
	}

	if(bbsPW == ""){
		alert("密码不能为空");
		return false;
	}

	return true;
}

</script>


</body>
</html>


