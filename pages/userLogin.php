<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>会员登录</title>

<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/userLogin.css" rel="stylesheet" type="text/css" />

<style type="text/css">


</style>
</head>
<body>

	<img class="logo" src="../static/img/logo.png">

	<div class="main">
		<p class="title">会员登录</p>
		<form action="TreatUserLogin.php" method="post" onsubmit="return check();">
			<p><input type="text" name="userID" id="userID" placeholder="用户id"></p>
			<p><input type="password" name="userPW" id="userPW" placeholder="密码"></p>
			<p><input type="submit" value="登  录"></p>
		</form>
		<p class="tr f14"><a href="userFindPW_1.php">忘记登录密码？</a></p>
		<hr>
		<p class="left link"><a href="../index.php">回首页</a></p>
		<p class="right link"><a href="bbshop.php">店家空间</a></p>
		<div class="cb"></div>
	</div>

	
	<iframe class="foot" src="footer.html"></iframe>
	
	
<script type="text/javascript">
function check(){

	var userID = document.getElementById("userID").value;
	var userPW = document.getElementById("userPW").value;

	if(userID == ""){
		alert("用户id不能为空");
		return false;
	}

	if(userPW == ""){
		alert("密码不能为空");
		return false;
	}

	return true;
}
</script>

</body>
</html>


