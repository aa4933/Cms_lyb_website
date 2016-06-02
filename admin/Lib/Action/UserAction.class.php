<?php
// +----------------------------------------------------------------------
// | JieQiangCms 移动应用软件后台管理系统
// +----------------------------------------------------------------------
// | provide by ：JieQiang.com
// 
// +----------------------------------------------------------------------
// | Author: 1569501393@qq.com
// +----------------------------------------------------------------------
class UserAction extends BaseAction{
	public function index(){
        $mod=D("user"); 
        $pagesize=20;        
        import("ORG.Util.Page");
		$where=" 1=1 ";
		if(isset($_REQUEST['keyword'])){
			$keys = $_REQUEST['keyword'];
			$this->assign('keyword',$keys);
			$where.=" and name like '%$keys%'";
		}
		$count=$mod->where($where)->count();		
		$p = new Page($count,$pagesize);		
		$list=$mod->where($where)->order("id desc")->limit($p->firstRow.','.$p->listRows)->select();
		$page=$p->show();  
		$this->assign('list',$list);
		$this->assign('page',$page);
		$this->display();
	}
	function edit(){
		if (isset($_POST['dosubmit'])) {
			$mod = D('user');		
			$user_data = $mod->create();			
			$pass=trim($_REQUEST['password']);
			
			if(!empty($pass)){
				$user_data['passwd']=md5(trim($_REQUEST['password']));
			}
			$result_info=$mod->where("id=". $user_data['id'])->save($user_data);
			if(false !== $result_info){
				$this->success(L('operation_success'), '', '', 'edit');
			}else{				
				$this->success(L('operation_failure'));
			}
		} else {
			$mod = D('user');		
			if (isset($_GET['id'])) {
				$id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error('请选择要编辑的链接');
			}
			$user = $mod->where('id='. $id)->find();		
			$this->assign('info', $user);
			$this->assign('show_header', false);
			$this->display();
		}
	}

	public function delete()
    {
		$user_mod = D('user');
		$user_platform=D('user_platform');
		
		if(!isset($_POST['id']) || empty($_POST['id'])) {
            $this->error('请选择要删除的数据！');
		}	
		if( isset($_POST['id'])&&is_array($_POST['id']) ){			
			foreach( $_POST['id'] as $val ){
				$user_mod->delete($val);
				$user_platform->where("user_id='{$val}'")->delete();					
			}			
		}else{
			$id = intval($_POST['id']);			
		    $user_mod->where('id='.$id)->delete();	
		    $user_platform->where("user_id='{$id}'")->delete();	
		}
		$this->success(L('operation_success'));
    }
}