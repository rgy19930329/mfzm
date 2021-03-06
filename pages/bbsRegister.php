<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>店家注册</title>
<script language="javascript" src="../static/js/city.js"></script>

<link href="../static/css/base.css" rel="stylesheet" type="text/css" />
<link href="../static/css/common.css" rel="stylesheet" type="text/css" />
<link href="../static/css/bbsRegister.css" rel="stylesheet" type="text/css" />

<style type="text/css">



</style>
</head>
<body>

	<img class="logo" src="../static/img/logo.png">

	<div class="main">
		<p class="title">店家注册</p>
		<form action="TreatBbsRegister.php" method="post" name="bbsRegister" onsubmit="return check();">
			<div class="main_left">
				<p><input type="text" name="barberShop" id="barberShop" placeholder="加盟店名称"></p>
				<p>
					<select name="province" id="province" onchange="changecity()" >
					    <option selected value="无">=选择省份=</option>
					    <option value="北京">北京</option>
					    <option value="天津">天津</option>
					    <option value="上海">上海</option>
					    <option value="重庆">重庆</option>
					    <option value="江苏">江苏</option>
					    <option value="广东">广东</option>
					    <option value="浙江">浙江</option>
					    <option value="福建">福建</option>
					    <option value="湖南">湖南</option>
					    <option value="湖北">湖北</option>
					    <option value="山东">山东</option>
					    <option value="辽宁">辽宁</option>
					    <option value="吉林">吉林</option>
					    <option value="云南">云南</option>
					    <option value="四川">四川</option>
					    <option value="安徽">安徽</option>
					    <option value="江西">江西</option>
					    <option value="黑龙江">黑龙江</option>
					    <option value="河北">河北</option>
					    <option value="陕西">陕西</option>
					    <option value="海南">海南</option>
					    <option value="河南">河南</option>
					    <option value="山西">山西</option>
					    <option value="内蒙古">内蒙古</option>
					    <option value="广西">广西</option>
					    <option value="贵州">贵州</option>
					    <option value="宁夏">宁夏</option>
					    <option value="青海">青海</option>
					    <option value="新疆">新疆</option>
					    <option value="西藏">西藏</option>
					    <option value="甘肃">甘肃</option>
					    <option value="台湾">台湾</option>
					    <option value="香港">香港</option>
					    <option value="澳门">澳门</option>
					</select>
	 
					<select name="city" class="city" id="city">
					  <option selected value="无">=所在城市=</option>
					</select>
				</p>

				<p><input type="password" name="bbsPW" id="bbsPW" maxlength="20" placeholder="设置密码"></p>
				<p>
					<table class="pwpower">
						<tr>
							<td id="strength_L" >弱</td>    
            				<td id="strength_M" >中</td>    
            				<td id="strength_H" >强</td>
						</tr>
					</table>
				</p>
				<p><input type="password" name="bbsPWInsure" id="bbsPWInsure" maxlength="20" placeholder="密码确认"></p>
			</div>
			
			<div class="main_right">
				<p><input type="text" placeholder="设置密保问题[小于10个字符]" name="question" maxlength="10" id="question"></p>
				<p><input type="text" placeholder="设置密保答案[小于10个字符]" name="answer" maxlength="10" id="answer"></p>
				<p class="tip">请认真填写密保信息，找回密码时会用到！</p>
				<p><input type="submit" value="提  交"></p>
			</div>

			<div class="cb"></div>
			
		</form>
	</div>

	<iframe class="foot" src="footer.html"></iframe>

<script type="text/javascript">

function check(){

	var barberShop = document.getElementById("barberShop").value;
	var bbsPW = document.getElementById("bbsPW").value;
	var bbsPWInsure = document.getElementById("bbsPWInsure").value;
	var province = document.getElementById("province").value;
	var city = document.getElementById("city").value;
	var question = document.getElementById("question").value;
	var answer = document.getElementById("answer").value;

	if(barberShop == ""){
		alert("加盟店名称不能为空");
		return false;
	}

	if(barberShop.length > 12){
		alert("加盟店名称过长");
		return false;
	}

	if(bbsPW == ""){
		alert("密码不能为空");
		return false;
	}

	if(bbsPWInsure == ""){
		alert("密码确认不能为空");
		return false;
	}

	if(province == "" || city == "" || province == "无" || city == "无"){
		alert("请确认省份和城市选择正确！");
		return false;
	}

	if(question == ""){
		alert("密保问题不能为空");
		return false;
	}

	if(answer == ""){
		alert("密保答案不能为空");
		return false;
	}

	if(question.indexOf("-")>-1 || answer.indexOf("-")>-1){
		alert("密保问题和密保答案中不能包含字符‘-’");
		return false;
	}

	return true;

}

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

var obj = document.getElementById("bbsPW");

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