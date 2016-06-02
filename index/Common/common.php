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

// 更为方便的字符串截断+省略号
function subtext($text, $length)
{
	if(mb_strlen($text, 'utf8') > $length)
		return mb_substr($text, 0, $length, 'utf8').'...';
	return $text;
}

// 随机获取数组中的值
function array_random_assoc($arr, $num = 1) {
    $keys = array_keys($arr);
    shuffle($keys);
    
    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[$keys[$i]] = $arr[$keys[$i]];
    }
    return $r;
}



// 文章列表
function arcList($cid, $limit){
	$where .= " cate_id = $cid AND status=1 ";
	$arclist = D('article')->where($where)->order(" add_time DESC ")->limit($limit)->select();
    return $arclist;
}

// 文章详情
function arcDetail($aid){
    $arclist = D('article')->where(" id = $aid AND status=1 ")->find();
    return $arclist;
}

// 特殊文章
function arcSpeList($where){
    $where .= " status=1 ";
	$arclist = D('article')->where($where)->order(" add_time DESC ")->limit('5')->select();
    return $arclist;
}

// 栏目导航
function cate($cid){
	$cateName = D('article_cate')->field("name")->where("id = $cid")->find();
    return $cateName;
}







