<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>所有会员信息</title>
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
	$sql = "SELECT * FROM userinfo_tb";
	$result = mysql_query($sql);
?> 

	<table>
		<tr>
			<th>userID</th>
			<th>bbsID</th>
			<th>userName</th>
			<th>userPW</th>
			<th>cardID</th>
			<th>userPWP</th>
			<th>startTime</th>
			<th>remainAmount</th>
			<th>allRecharge</th>
		</tr>
		<?php while($row = mysql_fetch_array($result)){ ?>
				<tr>
					<td><?php echo $row["userID"] ?></td>
					<td><?php echo $row["bbsID"] ?></td>
					<td><?php echo $row["userName"] ?></td>
					<td><?php echo $row["userPW"] ?></td>
					<td><?php echo $row["cardID"] ?></td>
					<td><?php echo $row["userPWP"] ?></td>
					<td><?php echo $row["startTime"] ?></td>
					<td><?php echo $row["remainAmount"] ?></td>
					<td><?php echo $row["allRecharge"] ?></td>
				</tr>
		<?php	} ?>
	</table>

<?php mysql_close($conn); ?>		

</body>
</html>