<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>所有店家信息</title>
<style type="text/css">

*{margin: 0;padding: 0}

table {
	width: 100%;
}

td,th {
	padding: 10px;
	border: 1px solid #777;
	font-family: "Microsoft YaHei";
}

td:hover {
	background-color: #888;
}



</style>
</head>
<body>
<?php include("ConnectDB.php") ?>

<?php 
	$sql = "SELECT * FROM bbsinfo_tb";
	$result = mysql_query($sql);
?>

<table>
		<tr>
			<th>bbsID</th>
			<th>barberShop</th>
			<th>bbsPW</th>
			<th>bbsPWP</th>
			<th>startTime</th>
			<th>location</th>
		</tr>
		<?php while($row = mysql_fetch_array($result)){ ?>
				<tr>
					<td><?php echo $row["bbsID"] ?></td>
					<td><?php echo $row["barberShop"] ?></td>
					<td><?php echo $row["bbsPW"] ?></td>
					<td><?php echo $row["bbsPWP"] ?></td>
					<td><?php echo $row["startTime"] ?></td>
					<td><?php echo $row["location"] ?></td>
				</tr>
		<?php	} ?>
	</table>

<?php mysql_close($conn); ?>		

</body>
</html>