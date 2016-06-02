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
class BaseAction extends Action {
	public function _initialize() {
		
	}

	// 空操作
    public function _empty(){
        $this->error('非法操作！！！');
    }
	
}

?>