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
<script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/jquery.role.js"></script>
<div class="pad-lr-10">
    <form id="myform" name="myform" action="<?php echo u('Role/delete');?>" method="post" onsubmit="return check();">
    <div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
            	<th width="50">ID</th>
                <th width="20"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>                
                <th width="200"><?php echo L('name');?></th>
                <th><?php echo L('remark');?></th>
      			<th width="60"><?php echo L('status');?></th>
                <th width="120"><?php echo L('operational');?></th>
            </tr>
        </thead>
    	<tbody>
        <?php if(is_array($role_list)): $i = 0; $__LIST__ = $role_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        	<td align="center"><?php echo ($val["id"]); ?></td>
            <td align="center"><input type="checkbox" value="<?php echo ($val["id"]); ?>" name="id[]"></td>            
            <td align="center"><?php echo ($val["name"]); ?></td>
            <td align="center"><?php echo ($val["remark"]); ?></td>
            <td align="center" onclick="status(<?php echo ($val["id"]); ?>,'status')" id="status_<?php echo ($val["id"]); ?>"><img src="__ROOT__/statics/images/status_<?php echo ($val["status"]); ?>.gif"</td>
            <td align="center"><a href="<?php echo u('Role/auth', array('id'=>$val['id']));?>">管理权限</a> | <a href="javascript:edit(<?php echo ($val["id"]); ?>,'<?php echo ($val["name"]); ?>')"><?php echo (L("edit")); ?></a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>

    <div class="btn">
    <label for="check_box" style="float:left;">全选/取消</label>
    <input type="submit" class="button" name="dosubmit" value="删除" onclick="return confirm('确定删除')" style="float:left;margin-left:10px;"/>
    <div id="pages"><?php echo ($page); ?></div>
    </div>


    </div>
    </form>
</div>
<script language="javascript">
function edit(id, name) {
	var lang_edit = "编辑";
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:lang_edit+'--'+name,id:'edit',iframe:'?m=Role&a=edit&id='+id,width:'400',height:'230'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}

function check(){
	var ids='';
	$("input[name='id[]']:checked").each(function(i, n){
		ids += $(n).val() + ',';
	});

	if(ids=='') {
		window.top.art.dialog({content:'请选择你需要操作的角色',lock:true,width:'200',height:'50',time:1.5},function(){});
		return false;
	}
	return true;
}

function status(id,type){
    $.get("<?php echo u('Role/status');?>", { id: id, type: type }, function(jsondata){
		var return_data  = eval("("+jsondata+")");
		$("#"+type+"_"+id+" img").attr('src', '__ROOT__/statics/images/status_'+return_data+'.gif');
	}); 
}
</script>
</body>
</html>