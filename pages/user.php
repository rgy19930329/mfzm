<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>我的空间</title>

<script type="text/javascript" src="../static/js/jquery-1.8.2.min.js"></script>

<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/user.css" rel="stylesheet" type="text/css" />

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

	$sql = "SELECT bbsID, userName,cardID,remainAmount FROM userinfo_tb WHERE userID='$userID'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$bbsID = $row["bbsID"];
	$userName = $row["userName"];
	$cardID = $row["cardID"];
	$remainAmount = $row["remainAmount"];

	$sql = "SELECT barberShop, location FROM bbsinfo_tb WHERE bbsID='$bbsID'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);

	$barberShop = $row["barberShop"];
	$location = $row["location"];
?>

	<div class="head">
		<a href="../index.php"><img class="icon home" src="../static/img/home.png"></a>
		<div class="head_inner">
			<div class="head_inner_left">
				<span class="name">您好！<?php echo $userName ?>【会员】</span>
			</div>

			<div class="head_inner_right">
				<p><span>店家编号：【<?php echo $bbsID ?>】</span></p>
				<p>
					<span>
						<?php $url = "bbsForAll.php?bbsID=$bbsID&barberShop=$barberShop&location=$location" ?>
						店家招牌：【<a href="<?php echo $url ?>"><?php echo $barberShop ?></a>】
					</span>
				</p>
			</div>
			<div class="cb"></div>
		</div>
		<a href="userQuit.php"><img class="icon quit" src="../static/img/quit.png"></a>
	</div>

	<div id="payPanel">
		<p class="title">支付</p>
		<form action="TreatPay.php" method="post" onsubmit="return check();">
			<p><input type="text" placeholder="支付金额" name="amount" id="amount"></p>
			<p><input type="password" placeholder="支付密码（登录密码）" name="userPW" id="password"></p>
			<p><input type="submit" value="支  付"><input type="button" value="取  消" id="cancel"></p>
		</form>
	</div>

	<hr>

	<div class="main">
		<div class="middle">
			<div class="main_inner fl">
				<p class="title">用户名片</p>
				<p>用户姓名：<?php echo $userName ?></p>
				<p>用户ID：<?php echo $userID ?></p>
				<p>所属店家：<?php echo $barberShop ?></p>
				<p>店家编号：<?php echo $bbsID ?></p>
				<p>卡号：<?php echo $cardID ?></p>
				<p class="emphasize">账户余额：<?php echo $remainAmount ?>元</p>
			</div>

			<div class="main_inner fl">
				<p class="title">操作平台</p>
				<p><input type="button" value="支 付" id="pay"></p>
				<hr>
				<p class="box fl"><a href="userChangePW.php" class="">修改密码</a></p>
				<p class="box fr"><a href="userSetPWP.php" class="">设置密保</a></p>
			</div>

			<div class="main_inner right fl">
				<p class="title">消费记录</p>
			<?php 
				$sql = "SELECT time,amount FROM amountinfo_tb WHERE userID='$userID'";
				$result = mysql_query($sql);
			?>

			<?php	
				if(!mysql_affected_rows()){ ?>
					<h2>暂无消费记录</h2>
			<?php
				}else{ ?>
				<div class="record">
					<table>
						<tr>
							<th>时间</th>
							<th>消费金额</th>
						</tr>
						<?php while($row = mysql_fetch_array($result)){ ?>
								<tr>
									<td><?php echo $row["time"] ?></td>
									<td><?php echo $row["amount"]."元" ?></td>
								</tr>
						<?php	} ?>
						
					</table>
				</div>	 
				

			<?php mysql_close($conn); } ?>
			</div>

			<div class="cb"></div>
		</div>
	</div>

	<iframe class="foot" src="footer.html"></iframe>
	

	
<script type="text/javascript">
function check(){

	var amount = document.getElementById("amount").value;
	var password = document.getElementById("password").value;
	var remainAmount = <?php echo $remainAmount ?>;

	if(amount == ""){
		alert("支付金额不能为空");
		return false;
	}

	if(password == ""){
		alert("支付密码不能为空");
		return false;
	}

	if(remainAmount<amount){
		alert("账户余额不足，无法完成支付，请充值");
		return false;
	}

	return true;
}


</script>

<script type="text/javascript">

$("#pay").click(function(){
	$("#payPanel").show();
	var mydiv = $("#payPanel");
	mydiv.animate({"top": "300px"},1000);
	mydiv.animate({"top": "250px"},300);
});

$("#cancel").click(function(){
	$("#amount").val("");
	$("#password").val("");
	var mydiv = $("#payPanel");
	mydiv.animate({"top": "300px"},300);
	mydiv.animate({"top": "-100px"},1000);
	setTimeout('$("#payPanel").hide()',1300);
});

</script>

</body>
</html>


