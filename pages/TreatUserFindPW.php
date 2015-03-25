
<meta charset="utf-8">

<?php include("ConnectDB.php") ?>

<?php 

	$userID = $_POST["userID"];
	$userPW = $_POST["userPW"];
	$userPWP = $_POST["userPWP"];
	$myAnswer = $_POST["answer"];

	if(!isset($userID)||!isset($userPW)||!isset($userPWP)||!isset($myAnswer)){
		$url = "userFindPW_1.php";
		header("Location: $url");
		exit();
	}

	$answer = substr($userPWP, strpos($userPWP, "-")+1);

	if($myAnswer == $answer){
		$tip = "用户[".$userID."]，你的密码已找回->[".$userPW."]，请妥善保管！";
		echo "<script>alert('$tip');location.href='userLogin.php';</script>";
	}else{
		echo "<script>alert('密码找回失败，请检查密保问题的回答是否正确！');location.href='userFindPW_1.php';</script>";
	}
	
?>

<?php mysql_close($conn); ?>










