<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=7" /><link href="__ROOT__/statics/admin/css/style.css" rel="stylesheet" type="text/css"/><link href="__ROOT__/statics/css/dialog.css" rel="stylesheet" type="text/css" /><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/jquery-1.4.2.min.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/formvalidator.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/formvalidatorregex.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/admin/js/admin_common.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/dialog.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/iColorPicker.js"></script><script language="javascript">var URL = '__URL__';
var ROOT_PATH = '__ROOT__';
var APP	 =	 '__APP__';
var lang_please_select = "<?php echo (L("please_select")); ?>";
var def=<?php echo ($def); ?>;
$(function($){
	$("#ajax_loading").ajaxStart(function(){
		$(this).show();
	}).ajaxSuccess(function(){
		$(this).hide();
	});
});

</script><title><?php echo (L("website_manage")); ?></title></head><body><div id="ajax_loading">提交请求中，请稍候...</div><?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content-menu ib-a blue line-x"><?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?></div></div><?php endif; endif; ?><div class="pad_10"><form action="<?php echo u('Nav/add');?>" method="post" name="myform" id="myform" ><table width="100%" cellpadding="2" cellspacing="1" class="table_form"><tr><th width="100"><?php echo L('name');?> :</th><td><input type="text" name="name" id="name" class="input-text"></td></tr><tr><th width="100"><?php echo L('alias');?> :</th><td><input type="text" name="alias" id="alias" class="input-text"></td></tr><tr><th><?php echo L('type');?> :</th><td><input type="radio" name="type" value="1" checked="checked"/>&nbsp;顶部&nbsp;&nbsp;
         <input type="radio" name="type" value="2" />&nbsp;底部&nbsp;&nbsp;
      </td></tr><tr><th><?php echo L('is_show');?> :</th><td><input type="radio" name="is_show" value="1" checked="checked"/>&nbsp;显示&nbsp;&nbsp;
         <input type="radio" name="is_show" value="0" />&nbsp;不显示&nbsp;&nbsp;
      </td></tr><tr><th><?php echo L('in_site');?> :</th><td><input type="radio" name="in_site" value="1" checked="checked" onclick="changeData(1);" />&nbsp;是&nbsp;&nbsp;
         <input type="radio" name="in_site" value="0" onclick="changeData(0);" />&nbsp;否&nbsp;&nbsp;
      </td></tr><tr id="tr_url" style="display:none;"><th><?php echo L('url');?>:</th><td><?php if($nav['type'] == '0'): echo ($nav["url"]); else: ?><input type="text" name="url" id="url" class="input-text" value="http://" size="35"><?php endif; ?></td></tr><tr><th width="100"><?php echo L('sort_order');?> :</th><td><input type="text" name="sort_order" id="sort_order" class="input-text" onkeyup="value=value.replace(/[^\d]/g,'')"onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"></td></tr><tr><th width="100">Title :</th><td><input type="text" name="seo_title" id="seo_title" class="input-text" size="50"></td></tr><tr><th width="100">Keywords :</th><td><input type="text" name="seo_keys" id="seo_keys" class="input-text" size="50"></td></tr><tr><th width="100">Description :</th><td><textarea name="seo_desc" cols="50" rows="3"></textarea></td></tr></table><input type="submit" name="dosubmit" id="dosubmit" class="dialog" value=" "></form><script type="text/javascript">	$(function(){
		$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'250',height:'50'}, function(){this.close();$(obj).focus();})}});
		
		$("#name").formValidator({onshow:"不能为空",onfocus:"不能为空"}).inputValidator({min:1,onerror:"请填写导航名称"});
		$("#alias").formValidator({onshow:"不能为空",onfocus:"不能为空"}).inputValidator({min:1,onerror:"请填写导航别名"});
		//$("#url").formValidator({onshow:"不能为空",onfocus:"不能为空"}).inputValidator({min:1,onerror:"请填写导航RUL"});
	});

	function changeData(type) {		
		var url=$('#tr_url')
		switch (type) {			
			case 1 :				
				url.hide();				
				break;
			case 0 :
				url.show();
			break;
			default:
				url.hide();
		}
	}	

</script></div></body></html>