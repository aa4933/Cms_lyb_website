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
<div class="pad-10" >
    <form name="searchform" action="" method="get" >
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
            <tr>
            <td>
            <div class="explain-col">
            	<?php echo L('time');?>：         
				<wego:calendar name="time_start"><?php echo ($time_start); ?></wego:calendar>
                -      
				<wego:calendar name="time_end" more="true"><?php echo ($time_end); ?></wego:calendar>
            	&nbsp;&nbsp;资讯分类：
                <select name="cate_id">
            	<option value="0">--请选择分类--</option>
                <?php if(is_array($cate_list['parent'])): $i = 0; $__LIST__ = $cate_list['parent'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($cate_id == $val['id']): ?>selected="selected"<?php endif; ?>><?php echo ($val["name"]); ?></option>
                  <?php if(!empty($cate_list['sub'][$val['id']])): if(is_array($cate_list['sub'][$val['id']])): $i = 0; $__LIST__ = $cate_list['sub'][$val['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sval): $mod = ($i % 2 );++$i;?><option value="<?php echo ($sval["id"]); ?>" <?php if($cate_id == $sval['id']): ?>selected="selected"<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($sval["name"]); ?></option>
                      <?php if(!empty($cate_list['sub'][$sval['id']])): if(is_array($cate_list['sub'][$sval['id']])): $i = 0; $__LIST__ = $cate_list['sub'][$sval['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ssval): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ssval["id"]); ?>" <?php if($cate_id == $ssval['id']): ?>selected="selected"<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($ssval["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
              </select>
                &nbsp;关键字 :
                <input name="keyword" type="text" class="input-text" size="25" value="<?php echo ($keyword); ?>" />
                <input type="hidden" name="m" value="Article" />
                <input type="submit" name="search" class="button" value="搜索" />
        	</div>
            </td>
            </tr>
        </tbody>
    </table>
    </form>

    <form id="myform" name="myform" action="<?php echo u('Article/delete');?>" method="post" onsubmit="return check();">
    <div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width=50>ID</th>
                <th width=25><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>               
                <th width=280><?php echo L('title');?></th>
                <th><?php echo L('cate_id');?></th>
                <th width=150><?php echo L('time');?></th>
                <th width=60><?php echo L('sort');?></th>
                <th width="40"><?php echo L('hot');?></th>
                <th width="40"><?php echo L('recommend');?></th>
                <th width="40">首页</th>
                <th width="40"><?php echo L('status');?></th>
				<th width="80">编辑</th>
            </tr>
        </thead>
    	<tbody>
        <?php if(is_array($article_list)): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>       
		 	<td align="center"><a href="<?php echo u('Article/edit', array('id'=>$val['id']));?>"><?php echo ($val["id"]); ?></a></td> 	
            <td align="center">
           	 <input type="checkbox" value="<?php echo ($val["id"]); ?>" name="id[]">
			</td>           
            <td align="left"><a class="blue" href="<?php echo u('Article/edit', array('id'=>$val['id']));?>"><?php echo ($val["title"]); ?></a><?php if($val['url'] != ''): ?><br><a href="<?php echo ($val["url"]); ?>" target=_blank><?php echo ($val["url"]); ?></a><?php endif; ?>&nbsp;&nbsp;</td>
            <td align="center"><b><?php echo ($val["cate_name"]["name"]); ?></b></td>
            <td align="center"><?php echo ($val["add_time"]); ?></td>
            <td align="center"><input  type="text" class="input-text-c input-text" value="<?php echo ($val["ordid"]); ?>" id="sort_<?php echo ($val["id"]); ?>" onblur="sort(<?php echo ($val["id"]); ?>,'ordid',this.value)" size="4" name="listorders[<?php echo ($val["id"]); ?>]"></td>
            <td align="center" onclick="status(<?php echo ($val["id"]); ?>,'is_hot')" id="is_hot_<?php echo ($val["id"]); ?>"><img src="__ROOT__/statics/images/status_<?php echo ($val["is_hot"]); ?>.gif" /></td>
            <td align="center" onclick="status(<?php echo ($val["id"]); ?>,'is_best')" id="is_best_<?php echo ($val["id"]); ?>"><img src="__ROOT__/statics/images/status_<?php echo ($val["is_best"]); ?>.gif" /></td>

            <td align="center" onclick="status(<?php echo ($val["id"]); ?>,'is_index')" id="is_index_<?php echo ($val["id"]); ?>"><img src="__ROOT__/statics/images/status_<?php echo ($val["is_index"]); ?>.gif" /></td>

      		<td align="center" onclick="status(<?php echo ($val["id"]); ?>,'status')" id="status_<?php echo ($val["id"]); ?>"><img src="__ROOT__/statics/images/status_<?php echo ($val["status"]); ?>.gif" /></td>
			<td align="center"><a class="blue" href="<?php echo u('Article/edit', array('id'=>$val['id']));?>">编辑</a></td><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>

    <div class="btn">
    	<label for="check_box" style="float:left;"><?php echo (L("select_all")); ?>/<?php echo (L("cancel")); ?></label>
    	<input type="submit" class="button" name="dosubmit" value="<?php echo (L("delete")); ?>" onclick="return confirm('<?php echo (L("sure_delete")); ?>')" style="float:left;margin:0 10px 0 10px;"/>
    	
    	<div id="pages"><?php echo ($page); ?></div>
    </div>

    </div>
    </form>
</div>
<script language="javascript">
function edit(id, name) {
	var lang_edit = "编辑资讯";
	window.top.art.dialog({id:'edit'}).close();
	window.top.art.dialog({title:lang_edit+'--'+name,id:'edit',iframe:'?m=Article&a=edit&id='+id,width:'550',height:'400'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
}

var lang_cate_name = "资讯标题";
function check(){
	if($("#myform").attr('action') != '<?php echo u("Article/sort_order");?>') {
		var ids='';
		$("input[name='id[]']:checked").each(function(i, n){
			ids += $(n).val() + ',';
		});

		if(ids=='') {
			window.top.art.dialog({content:lang_please_select+lang_cate_name,lock:true,width:'200',height:'50',time:1.5},function(){});
			return false;
		}
	}
	return true;
}

function status(id,type){
    $.get("<?php echo u('Article/status');?>", { id: id, type: type }, function(jsondata){
		var return_data  = eval("("+jsondata+")");
		$("#"+type+"_"+id+" img").attr('src', '__ROOT__/statics/images/status_'+return_data+'.gif')
	}); 
}
//排序方法
function sort(id,type,num){
    
    $.get("<?php echo u('Article/sort');?>", { id: id, type: type,num:num }, function(jsondata){
        
		$("#"+type+"_"+id+" ").attr('value', jsondata);
	},'json'); 
}
</script>
</body>
</html>