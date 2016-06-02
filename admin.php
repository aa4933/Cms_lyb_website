<?php
defined('ROOT_PATH') or define('ROOT_PATH', dirname(__FILE__));
if (!is_file(ROOT_PATH . '/data/install.lock')) {
    header('Location: ./install.php');
    exit;
}

/* 当前程序版本 */
define('NOW_VERSION', '5.2');
/* 当前程序Release */
define('NOW_RELEASE', '20151212');
/* 应用名称*/
define('APP_NAME', 'admin');
/* 应用目录*/
define('APP_PATH', './admin/');
/* 数据目录*/
define('DATA_PATH', './data/');
/* HTML静态文件目录*/
define('HTML_PATH', DATA_PATH . 'html/');

require(ROOT_PATH.'/core/core.php');
?>