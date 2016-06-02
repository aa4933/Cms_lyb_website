<?php
// +----------------------------------------------------------------------
// | JieQiangCms 移动应用软件后台管理系统
// +----------------------------------------------------------------------
// | provide by ：JieQiang.com
// 
// +----------------------------------------------------------------------
// | Author: 1569501393@qq.com
// +----------------------------------------------------------------------

class IndexAction extends BaseAction
{
    public function index()
    {
        $this->display('index');
    }
	/*当前位置*/
    public function current_pos()
    {
        $group_id = intval($_REQUEST['tag']);
        $menuid = intval($_REQUEST['menuid']);

        $r = M('node')->field('group_id,module_name,action_name')->where('id='.$menuid)->find();
        if($r)
        {
            $group_id = $r['group_id'];
        }
        $group = M('group')->field('title')->where('id='.$group_id)->find();
        if($group)
        {
            echo $group['title'];
        }
        if($r)
        {
            echo '->'.$r['module_name'].'->'.$r['action_name'];
        }
        exit;
    }    
	
}
?>