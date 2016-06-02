<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<link href="__ROOT__/statics/admin/css/style.css" rel="stylesheet" type="text/css"/>
<link href="__ROOT__/statics/css/dialog.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/jquery-1.4.2.min.js"></script>
<script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/formvalidator.js"></script>
<script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/formvalidatorregex.js"></script>

<script language="javascript" type="text/javascript" src="__ROOT__/statics/admin/js/admin_common.js"></script>
<script language="javascript" type="text/javascript" src="__ROOT__/statics/js/dialog.js"></script>
<script language="javascript" type="text/javascript" src="__ROOT__/statics/js/iColorPicker.js"></script>

<script language="javascript">
var URL = '__URL__';
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

</script>
<title><?php echo (L("website_manage")); ?></title>
</head>
<body>
<div id="ajax_loading">提交请求中，请稍候...</div>
<?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav">
    <div class="content-menu ib-a blue line-x">
    	<?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?>
    </div>
</div><?php endif; endif; ?>
<div class="pad_10">
<form action="<?php echo u('Admin/pwd');?>" method="post" name="myform" id="myform">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr> 
		<th width="100"><?php echo L('user_name');?> :</th>
		<td><input type="text" name="user_name" id="user_name" class="input-text" value="<?php echo ($admin_info["user_name"]); ?>" <?php if($admin_info['user_name'] == 'admin'): ?>readonly="readonly"<?php endif; ?>></td>
    </tr>

    <tr> 
        <th><?php echo L('inipassword');?> :</th>
        <td><input type="password" name="inipassword" id="inipassword" class="input-text"></td>
    </tr>

    <tr> 
		<th><?php echo L('password');?> :</th>
		<td><input type="password" name="password" id="password" class="input-text"></td>
    </tr>
    <tr> 
		<th><?php echo L('repassword');?> :</th>
		<td><input type="password" name="repassword" id="repassword" class="input-text"></td>
    </tr>
    <!-- <tr>
		<th><?php echo L('role_id');?> :</th>
		<td><select name="role_id">
        	<?php if(is_array($role_list)): $i = 0; $__LIST__ = $role_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($admin_info['role_id'] == $val['id']): ?>selected="selected"<?php endif; ?>><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
		</td>
    </tr>
	<tr>
		<th><?php echo L('status');?> :</th>
		<td>
      		<input type="radio" name="status" class="radio_style" value="1" <?php if($admin_info["status"] == 1): ?>checked<?php endif; ?>> &nbsp;有效&nbsp;&nbsp;&nbsp;
        	<input type="radio" name="status" class="radio_style" value="0" <?php if($admin_info["status"] == 0): ?>checked<?php endif; ?>> &nbsp;禁用
		</td>
    </tr> -->
</table>
<input type="hidden" name="id" value="<?php echo ($admin_info["id"]); ?>" />
<input type="submit" name="dosubmit" id="dosubmit" class="dialog" value=" ">
</form>
<script type="text/javascript">
var admin_id = "<?php echo ($admin_info["id"]); ?>";
var admin_name="<?php echo ($admin_info["user_name"]); ?>";
$(function(){
	$.formValidator.initConfig({formid:"myform",
		autotip:true,
		onerror:function(msg,obj){
			window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, 
			  function(){
				  this.close();
				  $(obj).focus();
				})
		}
	});
		
	$("#user_name").formValidator({onshow:"填写帐号昵称",onfocus:"填写帐号昵称"})
		.inputValidator({min:1,onerror:"请填写帐号昵称"});
	
	$("#inipassword").formValidator({onshow:"填写原始密码",onfocus:"填写原始密码"})
        .inputValidator({min:1,onerror:"填写原始密码"});

	$("#password").formValidator({onshow:"填写密码",onfocus:"填写6位以上密码"})
		.inputValidator({min:6,onerror:"请填写6位以上密码"});
		
	$("#repassword").formValidator({onshow:"确认密码",onfocus:"确认密码",oncorrect:"填写正确"})
		.compareValidator({desid:"password",operateor:"=",onerror:"两次输入密码不一致"});
})
</script>
</div>
</body>