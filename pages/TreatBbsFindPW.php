
<meta charset="utf-8">

<?php include("ConnectDB.php") ?>

<?php 

	$bbsID = $_POST["bbsID"];
	$bbsPW = $_POST["bbsPW"];
	$bbsPWP = $_POST["bbsPWP"];
	$myAnswer = $_POST["answer"];

	if(!isset($bbsID)||!isset($bbsPW)||!isset($bbsPWP)||!isset($myAnswer)){
		$url = "bbsFindPW_1.php";
		header("Location: $url");
		exit();
	}

	$answer = substr($bbsPWP, strpos($bbsPWP, "-")+1);

	if($myAnswer == $answer){
		$tip = "店家[".$bbsID."]，你的密码已找回->[".$bbsPW."]，请妥善保管！";
		echo "<script>alert('$tip');location.href='bbsLogin.php';</script>";
	}else{
		echo "<script>alert('密码找回失败，请检查密保问题的回答是否正确！');location.href='bbsFindPW_1.php';</script>";
	}
	
?>

<?php mysql_close($conn); ?>




