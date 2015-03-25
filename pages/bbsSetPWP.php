<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店家设置密保</title>

<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/bbsSetPWP.css" rel="stylesheet" type="text/css" />

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
	
	<img class="logo" src="../static/img/logo.png">

	<div class="main">
		<p class="title">店家设置密保</p>
		<p>（重新设置会覆盖以前的密保）</p>
		<form action="TreatBbsSetPWP.php" method="post" onsubmit="return check();">
			<p><input type="text" name="question" id="question" maxlength="10" placeholder="设置密保问题"><span>（不超过10个字符）</span></p>
			<p><input type="text" name="answer" id="answer" maxlength="10" placeholder="设置密保答案"><span>（不超过10个字符）</span></p>
			<p><input type="submit" value="设置密保"></p>
		</form>
		<hr>
		<p class="left link"><a href="../index.php">回首页</a></p>
		<p class="right link"><a href="bbshop.php">店家空间</a></p>
		<div class="cb"></div>
	</div>

	<iframe class="foot" src="footer.html"></iframe>
	
<script type="text/javascript">
function check(){

	var question = document.getElementById("question").value;
	var answer = document.getElementById("answer").value;

	if(question == ""){
		alert("密保问题不能为空");
		return false;
	}

	if(answer == ""){
		alert("密保答案不能为空");
		return false;
	}

	if(question.indexOf("-")>-1 || answer.indexOf("-")>-1){
		alert("密保问题和密保答案中不能包含字符‘-’");
		return false;
	}

	return true;
}


</script>

</body>
</html>


