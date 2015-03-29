<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店家空间</title>

<script type="text/javascript" src="../static/js/jquery-1.8.2.min.js"></script>

<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/bbshop.css" rel="stylesheet" type="text/css" />

<style type="text/css">


</style>
</head>
<body>

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
	$bbsID = $_SESSION["bbsID"];
 
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
				<span class="name">您好！<?php echo $barberShop ?>【店家】</span>
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

	<div id="rechargePanel">
		<p class="title">充值</p>
		<form action="TreatRecharge.php" method="post" onsubmit="return check2();">
			<p><input type="text" name="userID" id="userID" placeholder="用户id"></p>
			<p>
				<select name="amount" id="amount">
					<option value="10">10元</option>
					<option value="20">20元</option>
					<option value="50" selected>50元</option>
				    <option value="60">60元</option>
				    <option value="70">70元</option>
				    <option value="80">80元</option>
				    <option value="90">90元</option>
				    <option value="100">100元</option>
				    <option value="150">150元</option>
				    <option value="200">200元</option>
				    <option value="300">300元</option>
				    <option value="400">400元</option>
				    <option value="500">500元</option>
				    <option value="800">800元</option>
				    <option value="1000">1000元</option>
				    <option value="2000">2000元</option>
				    <option value="5000">5000元</option>
				</select>
				<span class="showname">加载姓名</span>
			</p>
			<p><input type="submit" value="充  值"><input type="button" value="取  消" id="cancel"></p>
		</form>
	</div>

	<div class="main">
		<div class="middle">
			<div class="main_inner fl">
				<p class="title">店家名片</p>
				<p>店家招牌：<?php echo $barberShop ?></p>
				<p>店家帐号：<?php echo $bbsID ?></p>
				<p>所在地：<?php echo $location ?></p>
			</div>

			<div class="main_inner fl">
				<p class="title">操作平台</p>
				<p><input type="button" value="充  值" id="recharge"></p>
				<p class="box_2">
					<?php $url = "showAllUsers.php?bbsID=$bbsID&barberShop=$barberShop&location=$location" ?>
					<a href="<?php echo $url ?>">浏览所有会员</a>
				</p>
				<hr>
				<p class="box fl"><a href="bbsChangePW.php" class="">修改密码</a></p>
				<p class="box fr"><a href="bbsSetPWP.php" class="">设置密保</a></p>
			</div>

			<div class="main_inner fl">
				<p class="title">会员注册</p>
				<form action="TreatUserRegister.php" method="post" onsubmit="return check();">
					<p><input type="hidden" name="bbsID" value="<?php echo $bbsID ?>"></p>
					<p><input type="text" name="userName" id="userName" placeholder="会员姓名"></p>
					<p><input type="text" name="cardId" id="cardId" placeholder="会员卡号"></p>
					<p><input type="password" name="userPW" id="userPW" maxlength="20" placeholder="设置密码（6-20个字符）"></p>
					<p>
						<table class="pwpower">
							<tr>
								<td id="strength_L" >弱</td>    
	            				<td id="strength_M" >中</td>    
	            				<td id="strength_H" >强</td>
							</tr>
						</table>
					</p>
					<p><input type="password" name="userPWInsure" id="userPWInsure" maxlength="20" placeholder="密码确认"></p>
					<p><input type="submit" value="提  交"></p>
				</form>
			</div>
			<div class="cb"></div>
		</div>

	</div>

	<iframe class="foot" src="footer.html"></iframe>


	


<script type="text/javascript">
function check(){

	var userName = document.getElementById("userName").value;
	var cardId = document.getElementById("cardId").value;
	var userPW = document.getElementById("userPW").value;
	var userPWInsure = document.getElementById("userPWInsure").value;

	if(userName == ""){
		alert("会员姓名不能为空");
		return false;
	}

	if(cardId == ""){
		alert("会员卡号不能为空");
		return false;
	}

	if(userPW.length < 6){
		alert("设置的密码不能少于6个字符");
		return false;
	}

	if(userPWInsure == ""){
		alert("密码确认不能为空");
		return false;
	}

	if(userPW != userPWInsure){
		alert("两次密码不同，请重新输入！");
		document.getElementById("userPW").value = "";
		document.getElementById("userPWInsure").value = "";
		return false;
	}

	return true;
}

</script>

<script type="text/javascript">

function check2(){

	var userID = document.getElementById("userID").value;

	if(userID == ""){
		alert("用户id不能为空");
		return false;
	}

	return true;
}

</script>

<script type="text/javascript">


$("#recharge").click(function(){
	$("#rechargePanel").show();
	var mydiv = $("#rechargePanel");
	mydiv.animate({"top": "300px"},1000);
	mydiv.animate({"top": "250px"},300);
});

$("#cancel").click(function(){
	$("#userID").val("");
	var mydiv = $("#rechargePanel");
	mydiv.animate({"top": "300px"},300);
	mydiv.animate({"top": "-100px"},1000);
	setTimeout('$("#rechargePanel").hide()',1300);
});

</script>

<script type="text/javascript">    
//判断输入密码的类型    
function CharMode(iN) {
		if (iN >= 48 && iN <= 57) //数字    
			return 1;
		if (iN >= 65 && iN <= 90) //大写    
			return 2;
		if (iN >= 97 && iN <= 122) //小写    
			return 4;
		else
			return 8;
	}
//bitTotal函数    
//计算密码模式    
function bitTotal(num) {
		modes = 0;
		for (i = 0; i < 4; i++) {
			if (num & 1) modes++;
			num >>>= 1;
		}
		return modes;
	}
//返回强度级别    
function checkStrong(sPW) {
	if (sPW.length < 6)
		return 1;
	Modes = 0;
	for (i = 0; i < sPW.length; i++) {
		//密码模式    
		Modes |= CharMode(sPW.charCodeAt(i));
	}
	return bitTotal(Modes);
}

//显示颜色    
function pwStrength(pwd) {
	var Dfault_color = "#FFF0F5"; //默认颜色  
	var L_color = "#5599FF"; //低强度的颜色，且只显示在最左边的单元格中  
	var M_color = "#0066FF"; //中等强度的颜色，且只显示在左边两个单元格中  
	var H_color = "#0044BB"; //高强度的颜色，三个单元格都显示  
	var Lcolor, Mcolor, Hcolor, S_level;
	if (pwd == null || pwd == '') {
		Lcolor = Mcolor = Hcolor = Dfault_color;
	} else {
		S_level = checkStrong(pwd);
		switch (S_level) {
			case 0:
				Lcolor = Mcolor = Hcolor = Dfault_color;
				break;
			case 1:
				Lcolor = L_color;
				Mcolor = Hcolor = Dfault_color;
				break;
			case 2:
				Lcolor = L_color;
				Mcolor = M_color;
				Hcolor = Dfault_color;
				break;
			default:
				Lcolor = L_color;
				Mcolor = M_color;
				Hcolor = H_color;
		}
	}
	document.getElementById("strength_L").style.background = Lcolor;
	document.getElementById("strength_M").style.background = Mcolor;
	document.getElementById("strength_H").style.background = Hcolor;
	return;
}

///////////////////////////////

var obj = document.getElementById("userPW");

obj.onkeyup = function(){
	pwStrength(obj.value);
};

obj.onblur = function(){
	pwStrength(obj.value);
	//alert(obj.value);
};

</script>  

</body>
</html>