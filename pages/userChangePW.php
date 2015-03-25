<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>会员修改密码</title>

<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/userChangePW.css" rel="stylesheet" type="text/css" />

<style type="text/css">


</style>
</head>
<body>
<?php 
	session_start();
	$userLoginFlag = null;
	if(isset($_SESSION["userLoginFlag"])){
		$userLoginFlag = $_SESSION["userLoginFlag"];
	}
	
	if($userLoginFlag != "success"){	
		echo "<script>alert('对不起，您还未登录或者当前页面已过期！');location.href='userLogin.php';</script>";
		exit();
	}
?>

<?php include("ConnectDB.php") ?>

<?php 
	$userID = $_SESSION["userID"];

	$sql = "SELECT userPWP FROM userinfo_tb WHERE userID='$userID'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$str = $row["userPWP"];
	$question = substr($str, 0, strpos($str, "-"));
?> 	

	<img class="logo" src="../static/img/logo.png">

	<div class="main">
		<p class="title">会员修改密码</p>
		<form action="TreatUserChangePW.php" method="post" onsubmit="return check();">
			<p><input type="password" name="oldUserPW" id="oldUserPW" placeholder="原密码"></p>
			<p><input type="password" name="newUserPW" id="newUserPW" placeholder="新密码"></p>
			<p>问题：【<?php echo $question ?>】</p>
			<p><input type="text" name="answer" id="answer" placeholder="请回答密保问题"></p>
			<p><input type="submit" value="修改密码"></p>
		</form>
		<hr>
		<p class="left link"><a href="../index.php">回首页</a></p>
		<p class="right link"><a href="user.php">我的空间</a></p>
		<div class="cb"></div>
	</div>

	<iframe class="foot" src="footer.html"></iframe>
	
<script type="text/javascript">
function check(){

	var oldUserPW = document.getElementById("oldUserPW").value;
	var newUserPW = document.getElementById("newUserPW").value;
	var answer = document.getElementById("answer").value;

	if(oldUserPW == ""){
		alert("原密码不能为空");
		return false;
	}

	if(newUserPW == ""){
		alert("新密码不能为空");
		return false;
	}

	if(answer == ""){
		alert("请回答密保问题");
		return false;
	}

	return true;
}


</script>

</body>
</html>


