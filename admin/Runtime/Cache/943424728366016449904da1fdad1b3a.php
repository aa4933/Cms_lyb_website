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
<form action="<?php echo u('Node/edit');?>" method="post" name="myform" id="myform">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr> 
      <th width="100"><?php echo L('module');?> :</th>
      <td><input type="text" name="module" id="module" class="input-text" value="<?php echo ($node_info["module"]); ?>"></td>
    </tr>
    <tr> 
      <th><?php echo L('module_name');?> :</th>
      <td><input type="text" name="module_name" id="module_name" class="input-text" value="<?php echo ($node_info["module_name"]); ?>"></td>
    </tr>
    <tr> 
      <th><?php echo L('action');?> :</th>
      <td><input type="text" name="action" id="action" class="input-text" value="<?php echo ($node_info["action"]); ?>"></td>
    </tr>
    <tr> 
      <th><?php echo L('action_name');?> :</th>
      <td><input type="text" name="action_name" id="action_name" class="input-text" value="<?php echo ($node_info["action_name"]); ?>"></td>
    </tr>
    <tr> 
      <th><?php echo L('auth_type');?> :</th>
      <td>
      	<select name="auth_type">
        	<option value="0" <?php if($node_info['auth_type'] == '0'): ?>selected="selected"<?php endif; ?>>模块</option>
            <option value="1" <?php if($node_info['auth_type'] == '1'): ?>selected="selected"<?php endif; ?>>菜单</option>
            <option value="2" <?php if($node_info['auth_type'] == '2'): ?>selected="selected"<?php endif; ?>>操作</option>
        </select>
      </td>
    </tr>
    <tr>
      <th><?php echo L('group_id');?> :</th>
      <td>
      	<select name="group_id">
        	<?php if(is_array($group_list)): $i = 0; $__LIST__ = $group_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($node_info['group_id'] == $val['id']): ?>selected="selected"<?php endif; ?>><?php echo ($val["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
      </td>
    </tr>
    <tr> 
      <th><?php echo L('data');?> :</th>
      <td><input type="text" name="data" id="data" class="input-text" value="<?php echo ($node_info["data"]); ?>"></td>
    </tr>
    <tr> 
      <th><?php echo L('sort');?> :</th>
      <td><input type="text" name="sort" id="sort" class="input-text" value="<?php echo ($node_info["sort"]); ?>" onkeyup="value=value.replace(/[^\d]/g,'')"onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"></td>
    </tr>
    <tr> 
      <th><?php echo L('remark');?> :</th>
      <td><textarea name="remark" cols="40" rows="4"><?php echo ($node_info["remark"]); ?></textarea></td>
    </tr>
    <tr>
      <th><?php echo L('status');?> :</th>
      <td>
      	<input type="radio" name="status" class="radio_style" value="1" <?php if($node_info["status"] == 1): ?>checked<?php endif; ?>> &nbsp;有效&nbsp;&nbsp;&nbsp;
        <input type="radio" name="status" class="radio_style" value="0" <?php if($node_info["status"] == 0): ?>checked<?php endif; ?>> &nbsp;禁用
      </td>
    </tr>
</table>
<input type="hidden" name="id" value="<?php echo ($node_info["id"]); ?>" />
<input type="submit" name="dosubmit" id="dosubmit" class="dialog" value=" ">
</form>
</div>
</body>
</html>