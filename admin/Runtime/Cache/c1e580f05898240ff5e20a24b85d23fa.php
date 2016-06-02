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
<div class="pad-lr-10">
	<div class="main_top" style="clear:both;">
		<p class="green"><font color=red>（警告：非专业人员请不要操作这里，会出乱子的噢）</font></p>		
	</div>
	
	<form name="searchform" action="" method="get" >
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
            <tr>
            <td>
            <div class="explain-col">
				<?php echo L('group_id');?> : <select name="group_id" style="width:140px;">
					<option value="" <?php if($group_id == ''): ?>selected="selected"<?php endif; ?>>--所有导航--</option>
					<?php if(is_array($group_list)): $i = 0; $__LIST__ = $group_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($group_id == $val['id']): ?>selected="selected"<?php endif; ?>>　<?php echo ($val["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				  　模块/模块名称 : 
				<input type="text" name="keyword" value="<?php echo ($keyword); ?>" />
				<input type="hidden" name="m" value="Node" />
                <input type="submit" name="search" class="button" value="搜索" />
        	</div>
            </td>
            </tr>
        </tbody>
    </table>
    </form>
	
    <form id="myform" name="myform" action="<?php echo u('Node/delete');?>" method="post" onsubmit="return check();">
    <div class="table-list">

    <table width="100%" cellspacing="0">
        <thead>
            <tr>
            	<th width="50">ID</th>
                <th width="40"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>                
                <th><?php echo L('module');?></th>
      			<th><?php echo L('module_name');?></th>
                <th><?php echo L('action');?></th>
                <th><?php echo L('action_name');?></th>
                <th width="40"><?php echo L('sort');?></th>
                <th width="40"><?php echo L('status');?></th>
                <th width="40"><?php echo L('operational');?></th>
            </tr>
        </thead>
    	<tbody>
        <?php if(is_array($node_list)): $i = 0; $__LIST__ = $node_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        	<td align="center"><?php echo ($val["id"]); ?></td>
            <td align="center"><input type="checkbox" value="<?php echo ($val["id"]); ?>" name="id[]"></td>            
            <td align="center"><font color=blue><?php echo ($val["module"]); ?></font></td>
            <td align="center"><b><?php echo ($val["module_name"]); ?></b></td>
      		<td align="center"><?php echo ($val["action"]); ?></td>
            <td align="center"><?php echo ($val["action_name"]); ?></td>
            <td align="center"><input type="text" class="input-text-c input-text" id="sort_<?php echo ($val["id"]); ?>" onblur="sort(<?php echo ($val["id"]); ?>,'sort',this.value)" value="<?php echo ($val["sort"]); ?>" size="4" name="listorders[<?php echo ($val["id"]); ?>]"></td>
            <td align="center" onclick="status(<?php echo ($val["id"]); ?>,'status')" id="status_<?php echo ($val["id"]); ?>"><img src="__ROOT__/statics/images/status_<?php echo ($val["status"]); ?>.gif" /></td>
            <td align="center"><a href="javascript:edit(<?php echo ($val["id"]); ?>,'<?php echo ($val["action_name"]); ?>')">编辑</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>

    <div class="btn">
		<label for="check_box"><?php echo (L("select_all")); ?>/<?php echo (L("cancel")); ?></label>
		<input type="submit" class="button" name="dosubmit" value="<?php echo (L("delete")); ?>" onclick="return confirm('<?php echo (L("sure_delete")); ?>')"/>
		<div id="pages"><?php echo ($page); ?></div>
    </div>

    </div>
    </form>
</div>
<script language="javascript">
function edit(id, name) {
	var lang_edit = "<?php echo (L("edit")); ?>";
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:lang_edit+'--'+name,id:'edit',iframe:'?m=Node&a=edit&id='+id,width:'500',height:'480'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});

}
function check(){
	var ids='';
	$("input[name='id[]']:checked").each(function(i, n){
		ids += $(n).val() + ',';
	});

	if(ids=='') {
		window.top.art.dialog({content:'请选择需要操作的菜单',lock:true,width:'200',height:'50',time:1.5},function(){});
		return false;
	}
	return true;
}
function status(id,type){
    $.get("<?php echo u('Node/status');?>", { id: id, type: type }, function(jsondata){
		var return_data  = eval("("+jsondata+")");
		$("#"+type+"_"+id+" img").attr('src', '__ROOT__/statics/images/status_'+return_data+'.gif');
	}); 
}

//排序方法
function sort(id,type,num){
    
    $.get("<?php echo u('Node/sort');?>", { id: id, type: type,num:num }, function(jsondata){
        
		$("#"+type+"_"+id+" ").attr('value', jsondata);
	},'json'); 
}

</script>
</body>
</html>