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
    <form action="<?php echo u('Company/edit');?>" method="post" name="myform" id="myform" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?php echo ($flink_info["id"]); ?>" />
        <table width="100%" cellpadding="2" cellspacing="1" class="table_form">
            <!-- <tr>
                <th><?php echo L('cate_id');?> :</th>
                <td><select name="cate_id" style="width:140px;">
                        <?php if(is_array($flink_cate_list)): $i = 0; $__LIST__ = $flink_cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" 
                            <?php if($flink_info['cate_id'] == $val['id']): ?>selected="selected"<?php endif; ?>
                            ><?php echo ($val["name"]); ?>
                            </option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select></td>
            </tr> -->
            <tr>
                <th width="60">分公司名称: </th>
                <td><input type="text" name="name" id="name" size="25" value="<?php echo ($flink_info["name"]); ?>" ></td>
            </tr>
            <tr>
                <th><?php echo L('url');?>:</th>
                <td><input type="text" name="url" id="url" size="25" value="<?php echo ($flink_info["url"]); ?>"  ></td>
            </tr>
           
		    <!-- <tr>
                <th><?php echo L('img');?>:</th>
                <td>
                	<?php if($flink_info['img'] != ''): ?><img src="__ROOT__/data/flink/<?php echo ($flink_info["img"]); ?>" width="150px"/><?php endif; ?>
                	<input type="file" name="img" id="img"/>                        
               	</td>
            </tr> -->
		   
            <tr>
                <th><?php echo L('ordid');?> :</th>
                <td><input type="text" name="ordid" id="ordid" class="input-text" value="<?php echo ($flink_info["ordid"]); ?>" size=8 onkeyup="value=value.replace(/[^\d]/g,'')"onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"></td>
            </tr>
            <tr>
                <th><?php echo L('status');?> :</th>
                <td><input type="radio" name="status" value="1" 
                    <?php if($flink_info["status"] == 1): ?>checked<?php endif; ?>
                    >&nbsp;已审核&nbsp;&nbsp;&nbsp; <input type="radio" name="status" value="0" 
                    <?php if($flink_info["status"] == 0): ?>checked<?php endif; ?>
                    >&nbsp;未审核</td>
            </tr>
        </table>
        <input type="submit" name="dosubmit" id="dosubmit" class="dialog" value="">
    </form>
    <script type="text/javascript">
	$(function(){
		$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'250',height:'50'}, function(){this.close();$(obj).focus();})}});
		
		$("#name").formValidator({onshow:"不能为空",onfocus:"不能为空"}).inputValidator({min:1,onerror:"请填写链接名称"});
		
		$("#url").formValidator({onshow:"不能为空",onfocus:"http开头"}).inputValidator({min:1,onerror:"请填写链接地址"});
	})
</script>
</div>
</body></html>