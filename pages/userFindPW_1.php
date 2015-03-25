<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>会员找回密码（第1步）</title>
<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/userFindPW_1.css" rel="stylesheet" type="text/css" />
<style type="text/css">


</style>
</head>
<body>

	<img class="logo" src="../static/img/logo.png">

	<div class="main">
		<p class="title">第一步</p>
		<p>请输入用户id：</p>
		<form action="userFindPW_2.php" method="post" onsubmit="return check();">
			<p><input type="text" name="userID" id="userID" placeholder="用户id"></p>
			<p><input type="submit" value="下一步"></p>
		</form>
		<hr>
		<p class="left link"><a href="../index.php">回首页</a></p>
		<div class="cb"></div>
	</div>

	<iframe class="foot" src="footer.html"></iframe>
	
<script type="text/javascript">
function check(){

	var userID = document.getElementById("userID").value;

	if(userID == ""){
		alert("店家id不能为空");
		return false;
	}

	return true;
}


</script>

</body>
</html>


