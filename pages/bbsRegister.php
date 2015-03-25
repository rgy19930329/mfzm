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

</body>
</html>