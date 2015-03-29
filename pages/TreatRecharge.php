<meta charset="utf-8">
<?php ob_start(); ?>

<?php 
	session_start();
	$bbsLoginFlag = null;
	if(isset($_SESSION["bbsLoginFlag"])){
		$bbsLoginFlag = $_SESSION["bbsLoginFlag"];
	}
	
	if($bbsLoginFlag != "success"){	
		echo "<script>alert('对不起，您还未登录或者当前页面已过期！请重新登录');location.href='bbsLogin.php';</script>";
		exit();
	}
?>
	
<?php include("ConnectDB.php") ?>
	
<?php 

	$amount = $_POST["amount"];
	$userID = $_POST["userID"];
	$bbsID = $_SESSION["bbsID"];

	if(!isset($amount)||!isset($userID)){
		$url = "bbsLogin.php";
		header("Location: $url");
		exit();
	}

	//判断该用户是否存在，存在则充值，不存在则提示错误
	$sql = "SELECT * FROM userinfo_tb WHERE userID='$userID'";
	$res = mysql_query($sql);
	$row = mysql_num_rows($res);
	if($row == 0){
		echo "<script>alert('该用户不存在！请仔细检查用户id');location.href='bbshop.php';</script>";
		exit();
	}else{
		//判断，如果当前帐号属于该理发店，则执行充值操作，否则报错
		//（该用户不是贵店会员，你不能为他/她充值）
		$sql = "SELECT * FROM userinfo_tb WHERE bbsID='$bbsID' AND userID='$userID'";
		$res = mysql_query($sql);
		$row = mysql_num_rows($res);
		if($row == 0){
			$tip = "帐号为[ ".$userID." ]的用户不是贵店会员，您不能为他/她充值！";
			echo "<script>alert('$tip');location.href='bbshop.php';</script>";
			exit();
		}

		$sql = "SELECT userName, remainAmount FROM userinfo_tb WHERE userID='$userID'";
		$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		$userName = $row["userName"];
		$remainAmount = $row["remainAmount"];

		$currentAmount = $amount + $remainAmount;

		$sql = "UPDATE userinfo_tb SET remainAmount='$currentAmount',allRecharge=allRecharge+'$amount' WHERE userID='$userID'";
		mysql_query($sql);

		$sql = "INSERT INTO incomeinfo_tb (bbsID, userID, time, income) VALUES ('$bbsID', '$userID', now(), '$amount')";
		mysql_query($sql);

		mysql_close($conn);

		$result = "亲爱的用户：".$userName."，您已充值".$amount."元，当前账户余额：".$currentAmount."元";
		echo "<script>alert('$result');location.href='userLogin.php';</script>";
	}
?>	
	

