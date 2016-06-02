// ����ͼ�� �Ѽ����� www.lanrentuku.com
$(function(){
	var tophtml = "<div id=\"izl_rmenu\" class=\"izl-rmenu\"><a href=\"tencent://Message/?Uin=4009606117&websiteName=www.lanrentuku.com=&Menu=yes\" class=\"btn btn-qq\"></a><a href=\"tencent://Message/?Uin=4009606117&websiteName=www.lanrentuku.com=&Menu=yes\" class=\"btn btn-qq\"></a><a href=\"tencent://Message/?Uin=4009606117&websiteName=www.lanrentuku.com=&Menu=yes\" class=\"btn btn-qq\"></a><div class=\"btn btn-top\"></div></div>";
	$("#top").html(tophtml);
	$("#izl_rmenu").each(function(){
		$(this).find(".btn-wx").mouseenter(function(){
			$(this).find(".pic").fadeIn("fast");
		});
		$(this).find(".btn-wx").mouseleave(function(){
			$(this).find(".pic").fadeOut("fast");
		});
		$(this).find(".btn-phone").mouseenter(function(){
			$(this).find(".phone").fadeIn("fast");
		});
		$(this).find(".btn-phone").mouseleave(function(){
			$(this).find(".phone").fadeOut("fast");
		});
		$(this).find(".btn-top").click(function(){
			$("html, body").animate({
				"scroll-top":0
			},"fast");
		});
	});
	var lastRmenuStatus=false;
	$(window).scroll(function(){//bug
		var _top=$(window).scrollTop();
		if(_top>200){
			$("#izl_rmenu").data("expanded",true);
		}else{
			$("#izl_rmenu").data("expanded",false);
		}
		if($("#izl_rmenu").data("expanded")!=lastRmenuStatus){
			lastRmenuStatus=$("#izl_rmenu").data("expanded");
			if(lastRmenuStatus){
				$("#izl_rmenu .btn-top").slideDown();
			}else{
				$("#izl_rmenu .btn-top").slideUp();
			}
		}
	});
});