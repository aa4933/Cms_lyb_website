var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

function jsddm_open()
{	jsddm_canceltimer();
	jsddm_close();
	ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');}

function jsddm_close()
{	if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

function jsddm_timer()
{	closetimer = window.setTimeout(jsddm_close, timeout);}

function jsddm_canceltimer()
{	if(closetimer)
	{	window.clearTimeout(closetimer);
		closetimer = null;}}

$(document).ready(function()
{	$('.jsddm > li').bind('mouseover', jsddm_open);
	$('.jsddm > li').bind('mouseout',  jsddm_timer);
    $('.jsddm > li').bind('touchstart', jsddm_open);
	$('.jsddm > li').bind('touchend',  jsddm_timer);
});

document.onclick = jsddm_close;
/*获取高度*/
$(function() {
	var oheight_one= $(".daohang_ul").height();
	
	
    $(".daohang").height(oheight_one+44+'px');
   
   
});	

/*首页*/
$(function() {
    $(".flexslider").flexslider({
		slideshowSpeed: 4000, //展示时间间隔ms
		animationSpeed: 400, //滚动时间ms
		touch: true //是否支持触屏滑动
	});
});	