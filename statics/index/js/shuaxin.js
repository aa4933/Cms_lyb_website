
if (document.getElementById("img_one")) {var intervalprice1 = setInterval(loadprice1,30000);}
///60秒自动刷新一次

function loadprice1(){
auimgurl=document.getElementById("img_one").src;
document.getElementById("img_one").src=auimgurl+ "?rnd=" + Math.random();
//转载请保留出处: www.tc711.com 原创
}
