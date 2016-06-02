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
// 本类由系统自动生成，仅供测试用途
class PublicAction extends Action {
    // 空操作
    public function _empty(){
        $this->error('非法操作！！！');
    }
    
    // 初始化
    public function _initialize(){
        //需要登陆
        $user_info =$_SESSION['user_info'];
        $this->assign('user_info', $user_info);
    	// 栏目
        $article_cate_mod = M('article_cate');
        $article_mod = D('article');
        $result = $article_cate_mod->where(' status=1 ')->order('sort_order ASC')->select();
        $article_cate_list = array();
        foreach ($result as $val) {
            if ($val['pid']==0) {
                $article_cate_list['parent'][$val['id']] = $val;
            } else {
                $article_cate_list['sub'][$val['pid']][] = $val;
            }
        }
        $this->assign('article_cate_list',$article_cate_list);
        
	   
        $list_flink = D('flink')->where(" status=1 ")->select();
        // var_dump($list_flink);
        $this->assign('list_flink', $list_flink);
        
    }
    
}