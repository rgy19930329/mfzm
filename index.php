<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>魔发之门</title>

<link href="static/css/base.css" rel="stylesheet" type="text/css" />
<link href="static/css/common.css" rel="stylesheet" type="text/css" />
<link href="static/css/index.css" rel="stylesheet" type="text/css" />

<style type="text/css">




</style>
</head>
<body>

	<div class="middle">
		<h1>魔发之门</h1>

		<div class="neck">
			<a href="">首页</a>
			<a href="">关于本站</a>
			<a href="">联系我们</a>
		</div>

		<div class="main">
			<div class="handler">
				<table>
					<tr>
						<td><a href="pages/userLogin.php">用户登录</a></td>
						<td></td>
						<td><a href="pages/user.php">用户空间</a></td>
					</tr>
					<tr>
						<td></td>
						<td><a href="pages/bbsRegister.php">店家注册</a></td>
						<td></td>
					</tr>
					<tr>
						<td><a href="pages/bbsLogin.php">店家登录</a></td>
						<td></td>
						<td><a href="pages/bbshop.php">店家空间</a></td>
					</tr>
				</table>
			</div>

			<div class="recommend">
				<p class="title">今日店家推荐:</p>

				<?php include("pages/ConnectDB.php") ?>	

				<?php 
					$sql = "SELECT bbsID, barberShop, location FROM bbsinfo_tb";
					$result = mysql_query($sql);
				?>

				<div class="bbsshow">
					<table>
						<tr>
							<th>店家编号</th>
							<th>店家名称</th>
							<th>所在地址</th>
						</tr>
						<?php while($row = mysql_fetch_array($result)){ ?>
								<tr>
									<?php 
										$bbsID = $row["bbsID"];
										$barberShop = $row["barberShop"];
										$location = $row["location"];
										$url = "pages/bbsForAll.php?bbsID=$bbsID&barberShop=$barberShop&location=$location";
									?>
									<td><?php echo $bbsID ?></td>
									<td><a href="<?php echo $url ?>" class="barberShop"><?php echo $barberShop ?></td>
									<td><?php echo $location ?></td>
								</tr>
						<?php	} ?>
					</table>
				</div>
				
			</div>

			<div class="cb"></div>

		</div>

		

		<div class="foot">
			<p>Copyright © 2015   <a href="">Kylin</a></p>
		</div>

	</div>

	

</body>
</html>


