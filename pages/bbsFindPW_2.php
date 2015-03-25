<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店家找回密码（第2步）</title>

<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/bbsFindPW_2.css" rel="stylesheet" type="text/css" />

<style type="text/css">


</style>
</head>
<body>
<?php
	$bbsID = $_POST["bbsID"];

	if(!isset($bbsID)){
		$url = "bbsFindPW_1.php";
		header("Location: $url");
	}
?>

<?php include("ConnectDB.php") ?>

<?php
	$sql = "SELECT bbsPW, bbsPWP FROM bbsinfo_tb WHERE bbsID='$bbsID'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);

	if($row == 0){
		echo "<script>alert('对不起，该用户不存在！');location.href='bbsFindPW_1.php';</script>";
		exit();
	}

	$bbsPW = $row["bbsPW"];
	$bbsPWP = $row["bbsPWP"];
	$question = substr($bbsPWP, 0, strpos($bbsPWP, "-"));
?>

	<img class="logo" src="../static/img/logo.png">

	<div class="main">
		<p class="title">第二步</p> 
		<p>密保问题：【<?php echo $question ?>】</p>
		<form action="TreatBbsFindPW.php" method="post" onsubmit="return check();">
			<input type="hidden" name="bbsID" value="<?php echo $bbsID ?>">
			<input type="hidden" name="bbsPW" value="<?php echo $bbsPW ?>">
			<input type="hidden" name="bbsPWP" value="<?php echo $bbsPWP ?>">
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


