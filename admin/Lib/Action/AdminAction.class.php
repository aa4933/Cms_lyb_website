<?php
// +----------------------------------------------------------------------
// | JieQiangCms 移动应用软件后台管理系统
// +----------------------------------------------------------------------
// | provide by ：JieQiang.com
// 
// +----------------------------------------------------------------------
// | Author: 1569501393@qq.com
// +----------------------------------------------------------------------

class AdminAction extends BaseAction
{

	// 修改密码
    public function pwd()
    {
		if(isset($_POST['dosubmit'])){
			$admin_mod = D('admin');
			$count=$admin_mod->where("id!=".$_POST['id']." and user_name='".$_POST['user_name']."'")->count();
			if($count>0){
				$this->error('用户名已经存在！');
			}

			// 匹配原始密码
			$count=$admin_mod->where("id=".$_POST['id']." and password='".md5($_POST['inipassword'])."'")->count();
            if($count<1){
                $this->error('原始密码错误！');
                exit;
            }

			//print_r($count);exit;
			if ($_POST['password']) {
			    if($_POST['password'] != $_POST['repassword']){
				    $this->error('两次输入的密码不相同');
			    }
			    $_POST['password'] = md5($_POST['password']);
			} else {
			    unset($_POST['password']);
			}
			unset($_POST['repassword']);
			if (false === $admin_mod->create()) {
				$this->error($admin_mod->getError());
			}

			$result = $admin_mod->save();
			if(false !== $result){
				$this->success(L('operation_success'), '', '', 'edit');
			}else{
				$this->error(L('operation_failure'));
			}
		}else{
			if( isset($_GET['id']) ){
				$id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error('参数错误');
			}
			$role_mod = D('role');
		    $role_list = $role_mod->where('status=1')->select();
		    $this->assign('role_list',$role_list);

		    $admin_mod = D('admin');
			$admin_info = $admin_mod->where('id='.$id)->find();
			$this->assign('admin_info', $admin_info);
			$this->assign('show_header', false);
			$this->display();
		}
    }
    
	

	
	function edit()
	{
		if(isset($_POST['dosubmit'])){
			$admin_mod = D('admin');
			$count=$admin_mod->where("id!=".$_POST['id']." and user_name='".$_POST['user_name']."'")->count();
			if($count>0){
				$this->error('用户名已经存在！');
			}
			//print_r($count);exit;
			if ($_POST['password']) {
			    if($_POST['password'] != $_POST['repassword']){
				    $this->error('两次输入的密码不相同');
			    }
			    $_POST['password'] = md5($_POST['password']);
			} else {
			    unset($_POST['password']);
			}
			unset($_POST['repassword']);
			if (false === $admin_mod->create()) {
				$this->error($admin_mod->getError());
			}

			$result = $admin_mod->save();
			if(false !== $result){
				admin_log('修改','管理员','ID：'.$_POST['id'] );
				$this->success(L('operation_success'), '', '', 'edit');
			}else{
				$this->error(L('operation_failure'));
			}
		}else{
			if( isset($_GET['id']) ){
				$id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error('参数错误');
			}
			$role_mod = D('role');
		    $role_list = $role_mod->where('status=1')->select();
		    $this->assign('role_list',$role_list);

		    $admin_mod = D('admin');
			$admin_info = $admin_mod->where('id='.$id)->find();
			$this->assign('admin_info', $admin_info);
			$this->assign('show_header', false);
			$this->display();
		}
	}

	
}
?>