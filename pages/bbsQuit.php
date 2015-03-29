<?php ob_start(); ?>
<meta charset="utf-8"> 

<?php 
	session_start();
	unset($_SESSION["bbsLoginFlag"]);
	echo "<script>alert('店家已经退出登录');location.href='bbsLogin.php';</script>";
?>












