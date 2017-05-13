<?php
namespace Admin\Controller;

use Think\Controller;

class AdmController extends Controller
{
    public function index()
    {
    	if(session('user_id')){
            $admin_info = M('admin_info');
            $id = session('user_id');
            $admin = $admin_info -> where("id = $id") -> find();
            $this -> assign('name',$admin['name']);
    		$this->display();
    	}else{
            $this->error('尚未登录！',U('Index/index'),1);
    	}       
    }
    public function logout(){
    	session(null);
    	$this->success('退出成功！',U('Index/index'),1);
    }

    public function updateUserInfo(){
            $admin_info = M('admin_info');
            $id = session('user_id');
            $admin = $admin_info -> where("id = $id") -> find();
            if(IS_POST){
                        $data['name'] = I('post.name'); 
                        $oldPwd =substr(md5( I('post.oldPwd')),0,30);
                        $data['pwd'] =substr(md5(I('post.newPwd')),0,30);
                        if( $oldPwd != $admin['pwd']){
                           $return[0] = 0;    
                        }else{
                            $result=$admin_info -> where("id = $id") -> save($data);
                            if(!$result){
                                $return[0] = 1;
                            }else{
                                $return[0] = 2;
                                }
                            }
                       $this->ajaxReturn($return);
                        }
            }
}