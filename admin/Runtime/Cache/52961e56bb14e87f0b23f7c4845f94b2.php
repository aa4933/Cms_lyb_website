<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<script type="text/javascript">
	$(function(){
		$("#type").change(function(){
			$(".bill_media").hide();
			$("#ad_"+$(this).val()).show();
		});
		$("#type").change();
		
		//获取版块允许的广告类型
		$("#board_id").change(function(){									  
			var allowtype = $("#board_id option:selected").attr('allowtype');
			var allowtype_arr = allowtype.split("|");
			$("#type option").hide();
			for(i=0; i<allowtype_arr.length; i++) {
			    $("#type option").each(function(){
					if($(this).val() == allowtype_arr[i]){
						$(this).show();
					}
				});
			}
			$("#type").change();
		});
		$("#board_id").change();
	})
</script>
<div class="pad_10">
<form action="<?php echo u('Ad/add');?>" method="post" name="myform" id="myform" enctype="multipart/form-data">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
	<tr> 
      <th width="80"><?php echo L('name');?>:</th>
      <td><input type="text" name="name" id="name" class="input-text" size="40"></td>
    </tr>
    <tr> 
      <th><?php echo L('url');?> :</th>
      <td><input type="text" name="url" id="url" class="input-text" size="40"></td>
    </tr>
    <tr>
      <th><?php echo L('board_id');?> :</th>
      <td>
      	<select name="board_id" id="board_id">
        	<?php if(is_array($adboards)): $i = 0; $__LIST__ = $adboards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" allowtype="<?php echo ($val["allow_type"]); ?>"><?php echo ($val["name"]); ?>（<?php echo ($val["width"]); ?>*<?php echo ($val["height"]); ?>）</option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select> 
      </td>
    </tr>
    <tr>
      <th><?php echo L('type');?> :</th>
      <td>
      	<select name="type" id="type">
        	<?php if(is_array($ad_type_arr)): $i = 0; $__LIST__ = $ad_type_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($val); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select> 
      </td>
    </tr>
    <tr id="ad_text" class="bill_media"> 
      <th><?php echo L('text');?> :</th>
      <td><textarea rows="4" cols="50" name="text" id="text"></textarea></td>
    </tr>
    <tr id="ad_code" class="bill_media"> 
      <th><?php echo L('code');?> :</th>
      <td><textarea rows="7" cols="65" name="code" id="code"></textarea></td>
    </tr>
    <tr id="ad_image" class="bill_media"> 
      <th><?php echo L('ad_image');?> :</th>
      <td>
      	<input name="image" id="image" type="file" />
      </td>
    </tr>
    <tr id="ad_flash" class="bill_media"> 
      <th><?php echo L('ad_flash');?> :</th>
      <td><input name="flash" id="flash" type="file" /></td>
    </tr>
    <!-- <tr> 
      <th><?php echo L('start_time');?> :</th>
      <td>
      	<link rel="stylesheet" type="text/css" href="__ROOT__/statics/js/calendar/calendar-blue.css"/>
			<script type="text/javascript" src="__ROOT__/statics/js/calendar/calendar.js"></script>
		<input class="date input-text" type="text" name="start_time" id="start_time" size="18" value="" />	
					<script language="javascript" type="text/javascript">
	                    Calendar.setup({
	                        inputField     :    "start_time",
	                        ifFormat       :    "%Y-%m-%d",
	                        showsTime      :    "true",
	                        timeFormat     :    "24"
	                    });
	     </script>  	
      </td>
    </tr>
    <tr> 
      <th><?php echo L('end_time');?> :</th>
      <td>
      	
		<input class="date input-text" type="text" name="end_time" id="end_time" size="18" value="" />	
					<script language="javascript" type="text/javascript">
	                    Calendar.setup({
	                        inputField     :    "end_time",
	                        ifFormat       :    "%Y-%m-%d",
	                        showsTime      :    "true",
	                        timeFormat     :    "24"
	                    });
	     </script>      	
      </td>
    </tr> -->
    <tr>
        <th><?php echo L('status');?> :</th>
        <td>
            <input type="radio" checked="checked" value="1" name="status"> 开启 &nbsp;&nbsp;
            <input type="radio" value="0" name="status"> 关闭
        </td>
    </tr>
</table>
<input type="submit" name="dosubmit" id="dosubmit" class="dialog" value=" ">
</form>
<script type="text/javascript">
	$(function(){
		$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'250',height:'50'}, function(){this.close();$(obj).focus();})}});
		
		$("#name").formValidator({onshow:"不能为空",onfocus:"不能为空"}).inputValidator({min:1,onerror:"请填写广告名称"});
	})
</script>
</div>
</body>
</html>