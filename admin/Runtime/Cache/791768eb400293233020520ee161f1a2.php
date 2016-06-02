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
<form action="<?php echo u('ArticleCate/edit');?>" method="post" name="myform" id="myform" enctype="multipart/form-data">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr>
      <th></th>
      <td><input type="hidden" name="id" class="input-text" value="<?php echo ($article_cate_info["id"]); ?>"></td>
    </tr>
    <tr>
      <th><?php echo L('pid');?> :</th>
      <td><select name="pid" style="width:150px;">
      	    <option value="0" <?php if($article_cate_info["pid"] == 0): ?>selected="selected"<?php endif; ?>>--顶级分类--</option>
        	<?php if(is_array($cate_list['parent'])): $i = 0; $__LIST__ = $cate_list['parent'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($article_cate_info["pid"] == $val['id']): ?>selected="selected"<?php endif; ?>><?php echo ($val["name"]); ?></option>
            	<?php if(!empty($cate_list['sub'][$val['id']])): if(is_array($cate_list['sub'][$val['id']])): $i = 0; $__LIST__ = $cate_list['sub'][$val['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sval): $mod = ($i % 2 );++$i;?><option value="<?php echo ($sval["id"]); ?>" <?php if($article_cate_info["pid"] == $sval['id']): ?>selected="selected"<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($sval["name"]); ?></option>
                    <?php if(!empty($cate_list['sub'][$sval['id']])): if(is_array($cate_list['sub'][$sval['id']])): $i = 0; $__LIST__ = $cate_list['sub'][$sval['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ssval): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ssval["id"]); ?>" <?php if($article_cate_info["pid"] == $ssval['id']): ?>selected="selected"<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($ssval["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
      </select>
      </td>
    </tr>
    <tr>
      <th width="100"><?php echo L('name');?> :</th>
      <td><input type="text" name="name" id="name" class="input-text" value="<?php echo ($article_cate_info["name"]); ?>"></td>
    </tr>

    <tr>
          <th>分类图片:</th>
          <td>
                  <?php if($article_cate_info['img'] != ''): ?><img src="__ROOT__/data/banner/<?php echo ($article_cate_info["img"]); ?>" width="150px"/><?php endif; ?>
                  <input type="file" name="img" id="img"/>                        
                </td>
      </tr>

	<tr>
      <th><?php echo L('alias');?>:</th>
      <td><input type="text" name="alias" id="alias" class="input-text" value="<?php echo ($article_cate_info["alias"]); ?>"></td>
    </tr>
    <tr>
      <th width="100"><?php echo L('sort_order');?> :</th>
      <td><input type="text" name="sort_order" id="sort_order" class="input-text" value="<?php echo ($article_cate_info["sort_order"]); ?>" size="4" onkeyup="value=value.replace(/[^\d]/g,'')"onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"></td>
    </tr>
    <tr>
      <th><?php echo L('status');?> :</th>
      <td><input type="radio" name="status" value="1" <?php if($article_cate_info["status"] == 1): ?>checked<?php endif; ?> >&nbsp;已审核&nbsp;&nbsp;&nbsp;
      	  <input type="radio" name="status" value="0" <?php if($article_cate_info["status"] == 0): ?>checked<?php endif; ?> >&nbsp;未审核</td>
    </tr>
    <tr>
      <th width="100"><?php echo L('Title');?> :</th>
      <td><input type="text" name="seo_title" id="seo_title" class="input-text" value="<?php echo ($article_cate_info["seo_title"]); ?>" size="50"></td>
    </tr>
    <tr>
      <th width="100"><?php echo L('Keywords');?> :</th>
      <td><input type="text" name="seo_keys" id="seo_keys" class="input-text" value="<?php echo ($article_cate_info["seo_keys"]); ?>" size="50"></td>
    </tr>
    <tr>
      <th width="100"><?php echo L('Description');?> :</th>
      <td><textarea name="seo_desc" cols="47" rows="4"><?php echo ($article_cate_info["seo_desc"]); ?></textarea></td>
    </tr>
    

</table>
<input type="submit" name="dosubmit" id="dosubmit" class="dialog" value="">
</form>
<script type="text/javascript">
	$(function(){
		$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'250',height:'50'}, function(){this.close();$(obj).focus();})}});
		
		$("#name").formValidator({onshow:"不能为空",onfocus:"不能为空"}).inputValidator({min:1,onerror:"请填写分类名称"});
	})
</script>
</div>
</body>
</html>