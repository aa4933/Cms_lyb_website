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
	<div class="data_top">
		<a class="cat" href="<?php echo u('SellerCate/addb2ccate');?>">同步分类</a>
		<a class="cat" href="javascript:add()">添加分类</a>
	</div>
	<form name="searchform" action="" method="get" >
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
            <tr>
            <td>
            <div class="explain-col">   
				&nbsp;关键字 :
                <input name="keyword" type="text" class="input-text" size="25" value="<?php echo ($keyword); ?>" />
                <input type="hidden" name="m" value="SellerCate" />
                <input type="submit" name="search" class="button" value="搜索" />
        	</div>
            </td>
            </tr>
        </tbody>
    </table>
    </form>	
    <form id="myform" name="myform" action="<?php echo u('SellerCate/delete');?>" method="post" onsubmit="return check();">
    <div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width=50>ID</th>
                <th width=30><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>                
                <th><?php echo L(name);?></th>              
				<th width=80>排序</th> 	
				<th width=160>返现商家页面显示</th>		
                <th width=80>状态</th>				
                <th width=80>操作</th>
            </tr>
        </thead>
    	<tbody>
        <?php if(is_array($seller_cate_list)): $k = 0; $__LIST__ = $seller_cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        	<td align="center"><?php echo ($val["id"]); ?></td>
            <td align="center"><input type="checkbox" value="<?php echo ($val["id"]); ?>" name="id[]"></td>                       
            <td align="center"><?php echo ($val["name"]); ?></td>     		
			<td align="center"><input type="text" class="input-text-c input-text" onblur="sort(<?php echo ($val["id"]); ?>,'sort',this.value)" id="sort_<?php echo ($val["id"]); ?>" value="<?php echo ($val["sort"]); ?>" size="4" name="listorders[<?php echo ($val["id"]); ?>]"></td>
			 <td align="center" onclick="status(<?php echo ($val["id"]); ?>,'seller_status')" id="seller_status_<?php echo ($val["id"]); ?>"><img src="__ROOT__/statics/images/status_<?php echo ($val["seller_status"]); ?>.gif" /></td>
            <td align="center" onclick="status(<?php echo ($val["id"]); ?>,'status')" id="status_<?php echo ($val["id"]); ?>"><img src="__ROOT__/statics/images/status_<?php echo ($val["status"]); ?>.gif" /></td>
            <td align="center"><a href="javascript:edit(<?php echo ($val["id"]); ?>,'<?php echo ($val["name"]); ?>')">编辑</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>
    <div class="btn">
		<label for="check_box" style="float:left;"><?php echo (L("select_all")); ?>/<?php echo (L("cancel")); ?></label>
		<input type="submit" class="button" name="dosubmit" value="<?php echo (L("delete")); ?>" onclick="return confirm('<?php echo (L("sure_delete")); ?>')" style="float:left;margin-left:10px;"/>
		<div id="pages"><?php echo ($page); ?></div>
    </div>
    </div>
    </form>
</div>
<script language="javascript">
function check(){
	var ids='';
	$("input[name='id[]']:checked").each(function(i, n){
		ids += $(n).val() + ',';
	});
	if(ids=='') {
		window.top.art.dialog({content:lang_please_select+'菜单分类名称	',lock:true,width:'200',height:'50',time:1.5},function(){});
		return false;
	}
	return true;
}
function add() {
	var lang_add = "<?php echo (L("add_cate")); ?>";
	window.top.art.dialog({id:'add'}).close();
	window.top.art.dialog({
		title:lang_add,
		id:'add',
		iframe:'?m=SellerCate&a=add',width:'480',height:'170'
		}, 
		function()
		{
			var d = window.top.art.dialog({id:'add'}).data.iframe;
			var form=d.document.getElementById('dosubmit').click();
			form.click();return false;
			
		}, 
		function()
		{
			window.top.art.dialog({id:'add'}).close()
		});

}
function edit(id, name) {
	var lang_edit = "<?php echo (L("edit")); ?>";
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({
		title:lang_edit+'--'+name,
		id:'edit',
		iframe:'?m=SellerCate&a=edit&id='+id,width:'480',height:'170'
		}, 
		function()
		{
			var d = window.top.art.dialog({id:'edit'}).data.iframe;
			d.document.getElementById('dosubmit').click();
			return false;
		}, 
		function()
		{
			window.top.art.dialog({id:'edit'}).close()
		});
}
function status(id,type){
    $.get("<?php echo u('SellerCate/status');?>", { id: id, type: type }, function(jsondata){
		var return_data  = eval("("+jsondata+")");
		$("#"+type+"_"+id+" img").attr('src', '__ROOT__/statics/images/status_'+return_data+'.gif');
	}); 
}
//排序方法
function sort(id,type,num){
    $.get("<?php echo u('SellerCate/sort');?>", { id: id, type: type,num:num }, function(jsondata){
		var return_data  = eval("("+jsondata+")");
		$("#"+type+"_"+id+" ").attr('value', return_data);
	}); 
}
</script>
</body>
</html>