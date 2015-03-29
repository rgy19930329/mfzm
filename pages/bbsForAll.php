<meta charset="utf-8">
<?php include("ConnectDB.php") ?>

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

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店家【<?php echo $barberShop ?>】的空间</title>

<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/bbsForAll.css" rel="stylesheet" type="text/css" />

<style type="text/css">



</style>
</head>
<body>

	<div class="head">
		<a href="../index.php"><img class="icon home" src="../static/img/home.png"></a>
		<div class="head_inner">
			<div class="head_inner_left">
				<span class="name">【<?php echo $barberShop ?>】 "空间"</span>
			</div>

			<div class="head_inner_right">
				<p><span>店家编号：【<?php echo $bbsID ?>】</span></p>
				<p>
					<span>
						所在地：【<?php echo $location ?></a>】
					</span>
				</p>
			</div>
			<div class="cb"></div>
		</div>
	</div>

<?php
	$sql = "SELECT userID, userName, allRecharge FROM userinfo_tb WHERE bbsID='$bbsID' ORDER BY allRecharge desc";
	$result = mysql_query($sql);
?>

	<div class="main">
		<div class="middle">
			<table>
				<tr>
					<th>会员ID</th>
					<th>会员姓名</th>
					<th>店内排名</th>
				</tr>
				<?php $rank = 1; ?>
				<?php while($row = mysql_fetch_array($result)){ ?>
						<tr>
							<td><?php echo $row["userID"] ?></td>
							<td><?php echo $row["userName"] ?></td>
							<td>
								<?php 
									switch ($rank) {
										case '1':
											echo "状元";
											break;
										case '2':
											echo "榜眼";
											break;
										case '3':
											echo "探花";
											break;
										default:
											echo $rank;
											break;
									}
									$rank++;
								?>
							</td>
						</tr>
				<?php	} ?>
			</table>
		</div>
	</div>

<?php mysql_close($conn); ?>	

	<iframe class="foot" src="footer.html"></iframe>	


</body>
</html>