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
<script language="javascript">
$(document).ready(function(){					   
	function is_all_checked(input){ 
		var flag=false;
		input.each(function(){ 		
			flag=$(this).attr('checked');
			if(!flag)return false;
		});
		return flag;
	}
	var table_form=$('.table_form');
	$('tr',table_form).each(function(){ 
		var td_1_input=$("td:nth-child(1) input[type='checkbox']",this);
		var td_2_input=$("td:nth-child(2) input[type='checkbox']",this);
		
		td_1_input.attr('checked',is_all_checked(td_2_input));			  
		
		td_1_input.click(function(){ 
			td_2_input.attr('checked',td_1_input.attr('checked'));
		});
		
		td_2_input.click(function(){ 
			td_1_input.attr('checked',is_all_checked(td_2_input));			  
		});
	});
});

</script>

<div style="padding: 10px;">
    <form action="<?php echo u('Role/authSubmit');?>" method="post" name="myform" id="myform">
        <table width="100%" cellpadding="2" cellspacing="1" class="table_form">
            <?php if(is_array($access_list)): foreach($access_list as $key=>$module_item): ?><tr>
                    <td align="right" style="background: #D8E2FA; padding-right: 10px; width: 150px;">
                    	<label>
                        	<input type="checkbox" class="module_cbo" value="<?php echo ($module_item["id"]); ?>" name="access_node[]"/>&nbsp;&nbsp;
                                <?php echo ($module_item["module_name"]); ?>
                       	</label>
                	</td>
                    <td>
                    	<?php if(is_array($module_item["actions"])): foreach($module_item["actions"] as $key=>$action_item): ?>&nbsp;&nbsp;
                            <label>
                            	<input type="checkbox" class="action_cbo" value="<?php echo ($action_item["id"]); ?>" name="access_node[]"
                                	<?php if($action_item['checked']): ?>checked="checked"<?php endif; ?>
                                />
                                &nbsp;&nbsp;<?php echo ($action_item["action_name"]); ?>
                   			</label><?php endforeach; endif; ?>
                        &nbsp;
              		</td>
                </tr><?php endforeach; endif; ?>
        </table>
        <div class="bk15"></div>
        <input type="hidden" name="id" value="<?php echo ($id); ?>" />
        <div class="btn">
            <input type="submit" value="<?php echo (L("submit")); ?>" name="dosubmit" class="button" id="dosubmit"/>
        </div>
    </form>
</div>
</body></html>