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
  <div style="padding:10px; overflow:hidden;">
		<div class="main_top" style="clear:both;">
			<h4>温馨提示：</h4>						
			<p class="green">1.使用说明,调用指定位置的广告时把id换为下面列表中的id即可</p>	
			<p><span><</span><span>script </span><span>language="javascript" src="<?php echo u('Advert/index', array('id'=>6));?>"></<span>script</span>></span></span>									
		</div>
  </div>
  <form id="myform" name="myform" action="<?php echo u('Adboard/delete');?>" method="post" onsubmit="return check();">
    <div class="table-list">
      <table width="100%" cellspacing="0">
        <thead>
			<tr>
          		<th width=50>ID</th>
				<th width=30><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>				
				<th width=150>广告位名称</th>
				<th width=150>广告位尺寸</th>
				<th width=200>说明</th>
				<th width="60">状态</th>
				<th width="60">操作</th>
			</tr>
        </thead>
		<tbody>
			<?php if(is_array($adboard_list)): $key = 0; $__LIST__ = $adboard_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key;?><tr>
				<td align="center"><?php echo ($val["id"]); ?></td>
				<td align="center"><input type="checkbox" value="<?php echo ($val["id"]); ?>" name="id[]"></td>				
				<td align="center"><?php echo ($val["name"]); ?></td>
				<td align="center"><?php echo ($val["width"]); ?>*<?php echo ($val["height"]); ?></td>
				<td><?php echo ($val["description"]); ?></td>
				<td align="center">
					<?php if($val["status"] == 1): ?><font class="green">开启</font>
					<?php else: ?><font color="red">关闭</font><?php endif; ?></td>
				<td align="center"><a class="blue" href="javascript:edit(<?php echo ($val["id"]); ?>,'<?php echo ($val["name"]); ?>')">编辑</a></td>
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
	<script type="text/javascript">
	function edit(adboard_id, name) {
		var lang_edit = "<?php echo (L("edit")); ?>";
		window.top.art.dialog({id:'edit'}).close();
		window.top.art.dialog({title:lang_edit+'--'+name,id:'edit',iframe:'?m=Adboard&a=edit&id='+adboard_id,width:'600',height:'300'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
	}
	var lang_cate_name = "<?php echo (L("cate_name")); ?>";
	function check(){
		var ids='';
		$("input[name='id[]']:checked").each(function(i, n){
			ids += $(n).val() + ',';
		});

		if(ids=='') {
			window.top.art.dialog({content:lang_please_select+lang_cate_name,lock:true,width:'200',height:'50',time:1.5},function(){});
			return false;
		}
		return true;
	}
	</script>
</body>
</html>