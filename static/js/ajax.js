function createXmlHttp(){
	var xmlHttp = null;

	if(window.ActiveXObject){//IE浏览器
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}else if(window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}

	return xmlHttp;
}

function readyStateChange(xmlHttp){
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
			console.log(xmlHttp.responseText);
		}else{
			console.log("fail");
		}
	}
}

function doGet(url){
	var xmlHttp = createXmlHttp();
	xmlHttp.open("GET", url, true);//这里的true表示 异步传输
	xmlHttp.send(null);
	readyStateChange(xmlHttp);
}

function doPost(url,data){
	var xmlHttp = createXmlHttp();
	xmlHttp.open("POST", url, true);//这里的true表示 异步传输
	xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlHttp.send(data);
}