
/*输入空字符检测*/
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

function check2(){

	var userID = document.getElementById("userID").value;

	if(userID == ""){
		alert("用户id不能为空");
		return false;
	}

	return true;
}

//-------------------------------------------
/*充值板块动画*/
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

//-------------------------------------------
/*检测密码强度*/
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
};

//-------------------------------------------
//ajax加载姓名

function loadUser(){
	$.ajax({
		type: "GET",
		url: "TreatLoadUser.php",
		data: {userID: $("#userID").val()},
		success: function(result){
			$("#showname").html(result);
		}
	});
}

$("#userID").click(function(){
	loadUser();
});

$("#userID").keyup(function(){
	loadUser();
});

$("#userID").blur(function(){
	loadUser();
});


