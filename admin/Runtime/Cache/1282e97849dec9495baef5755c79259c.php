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
<div class="pad-10" >
    <form name="searchform" action="" method="get" >
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
            <tr>
            <td>
            <div class="explain-col">
				关键字 :
                <input name="keyword" type="text" class="input-text" size="25" value="<?php echo ($keyword); ?>" />
                <input type="hidden" name="m" value="User" />
                <input type="submit" name="search" class="button" value="搜索" />
        	</div>
            </td>
            </tr>
        </tbody>
    </table>
    </form>
    <form id="myform" name="myform" action="<?php echo u('User/delete');?>" method="post" onsubmit="return check();">
    <div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="50">ID</th>
                <th width=15><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
                <th width=80><?php echo L('name');?></th>
                <th width=80>电话</th>
                <th width=80>预约时间</th>
				<!-- <th width=80><?php echo L('email');?></th>							
				<th width=40><?php echo L('integral');?></th>					
				<th width=60><?php echo L('sex');?></th>
				<th width=60>登录次数</th> 
                <th width=80><?php echo L('reg_time');?></th>
                <th width=80><?php echo L('last_time');?></th>				
                <th width=30><?php echo L('status');?></th>
				<th width=30><?php echo L('operational');?></th> -->
            </tr>
        </thead>
    	<tbody>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        	<td align="center"><?php echo ($val["id"]); ?></td>
            <td align="center"><input type="checkbox" value="<?php echo ($val["id"]); ?>" name="id[]"></td>
            <td align="center"><em class="blue"><?php echo ($val["name"]); ?></em></a></td>           
            <td align="center"><em class="blue"><?php echo ($val["mobile"]); ?></em></a></td>           
            <td align="center"><em class="blue"><?php echo (date('Y-m-d H:i:s',$val["add_time"])); ?></em></a></td>		   
		 	<!-- <td  align="center"><?php echo ($val["email"]); ?></td>
		    <td  align="center"><?php echo ($val["integral"]); ?></td>
		    <td align="center">
	           <?php if($val["sex"] == '0'): ?>男
	           <?php elseif($val["sex"] == '1'): ?>
	           女
	           <?php else: ?>
	           保密<?php endif; ?>
           </td>			
		   <td  align="center"><?php echo ($val["login_count"]); ?></td>
           <td align="center"><?php echo date("Y-n-j   H:i:s",$val["add_time"]);?><br><font color=green>(<?php echo ($val["ip"]); ?>)</font></td>
		   <td align="center"><?php echo date("Y-n-j   H:i:s",$val["last_time"]);?><br><font color=green>(<?php echo ($val["last_ip"]); ?>)</font></td>
           <td align="center" onclick="status(<?php echo ($val["id"]); ?>,'status')" id="status_<?php echo ($val["id"]); ?>"><img src="__ROOT__/statics/images/status_<?php echo ($val["status"]); ?>.gif" /></td>
		   <td align="center"><a href="javascript:edit(<?php echo ($val["id"]); ?>,'<?php echo ($val["name"]); ?>')">编辑</a></td> --><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>
    <div class="btn">
    	<label for="check_box" style="float:left;">全选/取消</label>
    	<input type="submit" class="button" name="dosubmit" value="<?php echo (L("delete")); ?>" onclick="return confirm('<?php echo (L("sure_delete")); ?>')" style="float:left;margin:0 10px 0 10px;"/>
    	<div id="pages"><?php echo ($page); ?></div>
    </div>
    </div>
    </form>
</div>

<script language="javascript">
function edit(id, name) {
	var lang_edit = "<?php echo (L("edit")); ?>";
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:lang_edit+'--'+name,id:'edit',iframe:'?m=User&a=edit&id='+id,width:'520',height:'400'}, 
		function(){
			var d = window.top.art.dialog({id:'edit'}).data.iframe;
			d.document.getElementById('dosubmit').click();
			return false;
		}, 
		function(){
			window.top.art.dialog({id:'edit'}).close();
		}
	);
}
function status(id,type){
    $.get("<?php echo u('User/status');?>", { id: id, type: type }, function(jsondata){
		var return_data  = eval("("+jsondata+")");
		$("#"+type+"_"+id+" img").attr('src', '__ROOT__/statics/images/status_'+return_data+'.gif')
	}); 
}
</script>
</body>
</html>