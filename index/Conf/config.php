<?php
/*
// | JieQiangCms 街墙内容管理系统
// +----------------------------------------------------------------------
// | provide by ：www.jieqiang.com
// 
// +----------------------------------------------------------------------
// | Author: 1569501393@qq.com
// +----------------------------------------------------------------------
*/
if (!defined('THINK_PATH'))	exit();

$config = require("config.inc.php");
$array = array( 	    
	'URL_MODEL' => 1,		
    'DEFAULT_LANG' => 'zh-cn', 
	'DEFAULT_THEME'  => 'defaultnew',
	'TMPL_DETECT_THEME' => true,
	'THEME_LIST'=>'defaultnew,default,default111',
);
return array_merge($config,$array);
?>fig,$array);
?>