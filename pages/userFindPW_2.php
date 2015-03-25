<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>用户找回密码（第2步）</title>
<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/userFindPW_2.css" rel="stylesheet" type="text/css" />
<style type="text/css">


</style>
</head>
<body>
<?php
	$userID = $_POST["userID"];

	if(!isset($userID)){
		$url = "userFindPW_1.php";
		header("Location: $url");
	}
?>

<?php include("ConnectDB.php") ?>

<?php
	$sql = "SELECT userPW, userPWP FROM userinfo_tb WHERE userID='$userID'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);

	if($row == 0){
		echo "<script>alert('对不起，该用户不存在！');location.href='userFindPW_1.php';</script>";
		exit();
	}

	$userPW = $row["userPW"];
	$userPWP = $row["userPWP"];
	$question = substr($userPWP, 0, strpos($userPWP, "-"));
?>

	<img class="logo" src="../static/img/logo.png">

	<div class="main">
		<p class="title">第二步</p> 
		<p>密保问题：【<?php echo $question ?>】</p>
		<form action="TreatUserFindPW.php" method="post" onsubmit="return check();">
			<input type="hidden" name="userID" value="<?php echo $userID ?>">
			<input type="hidden" name="userPW" value="<?php echo $userPW ?>">
			<input type="hidden" name="userPWP" value="<?php echo $userPWP ?>">
			<p><input type="text" name="answer" id="answer" placeholder="请输入密保问题的答案"></p>
			<p><input type="submit" value="下一步"></p>
		</form>
		<hr>
		<p class="left link"><a href="../index.php">回首页</a></p>
		<div class="cb"></div>
	</div>

	<iframe class="foot" src="footer.html"></iframe>
	
<script type="text/javascript">
function check(){

	var answer = document.getElementById("answer").value;

	if(answer == ""){
		alert("密保答案不能为空");
		return false;
	}

	return true;
}


</script>

</body>
</html>


