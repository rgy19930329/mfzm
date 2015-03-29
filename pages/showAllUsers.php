<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>本店所有会员信息</title>

<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/showAllUsers.css" rel="stylesheet" type="text/css" />

<style type="text/css">


</style>
</head>
<body>
<?php 
	session_start();
	$userLoginFlag = null;
	if(isset($_SESSION["bbsLoginFlag"])){
		$bbsLoginFlag = $_SESSION["bbsLoginFlag"];
	}
	
	if($bbsLoginFlag != "success"){	
		echo "<script>alert('对不起，您还未登录或者当前页面已过期！');location.href='bbsLogin.php';</script>";
		exit();
	}
?>

<?php 
	$bbsID = $_GET["bbsID"];
	$barberShop = $_GET["barberShop"];
	$location = $_GET["location"];
	if(!isset($bbsID)||!isset($barberShop)||!isset($location)){
		$url = "bbshop.php";
		header("Location: $url");
		exit();
	}
?> 

	<div class="head">
		<a href="bbshop.php"><img class="icon home" src="../static/img/prev.png"></a>
		<div class="head_inner">
			<div class="head_inner_left">
				<span class="name"><?php echo $barberShop ?>【店家】 "后台管理"</span>
			</div>

			<div class="head_inner_right">
				<p><span>帐号：【<?php echo $bbsID ?>】</span></p>
				<p>
					<span>
						<?php $url = "bbsForAll.php?bbsID=$bbsID&barberShop=$barberShop&location=$location" ?>
						店家招牌：【<a href="<?php echo $url ?>"><?php echo $barberShop ?></a>】
					</span>
				</p>
			</div>
			<div class="cb"></div>
		</div>
		<a href="bbsQuit.php"><img class="icon quit" src="../static/img/quit.png"></a>
	</div>
	
<?php include("ConnectDB.php") ?>

<?php
	$sql = "SELECT userID, userName, cardID, startTime, remainAmount FROM userinfo_tb WHERE bbsID='$bbsID'";
	$result = mysql_query($sql);
?>

	<div class="main">
		<div class="middle">
			<table>
				<tr>
					<th>用户ID</th>
					<th>用户姓名</th>
					<th>卡号</th>
					<th>注册时间</th>
					<th>剩余金额</th>
				</tr>
				<?php while($row = mysql_fetch_array($result)){ ?>
						<tr>
							<td><?php echo $row["userID"] ?></td>
							<td><?php echo $row["userName"] ?></td>
							<td><?php echo $row["cardID"] ?></td>
							<td><?php echo $row["startTime"] ?></td>
							<td><?php echo $row["remainAmount"] ?></td>
						</tr>
				<?php	} ?>
			</table>
		</div>
	</div>

<?php mysql_close($conn); ?>		


	<iframe class="foot" src="footer.html"></iframe>


</body>
</html>