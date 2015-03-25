
<?php 

$host = $_SERVER['HTTP_HOST'];
$name = "root";
$password = "root";
$dbname = "mfzmdb";

$conn = mysql_connect($host, $name, $password);
if (!$conn){
  	die("Connect Fail");
}

mysql_select_db($dbname, $conn);


?>

