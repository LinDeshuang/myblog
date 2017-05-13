<?php
namespace Admin\Controller;

use Think\Controller;

class CatManageController extends Controller
{
    public function index()
    {
    	if(session('user_id')){
            $id = session('user_id');
            $admin_info = M('admin_info');
            $admin_name = $admin_info -> where("id = $id") -> find();
            $this -> assign('name',$admin_name['name']);
            $cate = M('cate');
            $info = $cate ->where('id>0')->select();
            $this->assign('info',$info);
            $this->display();
        }else{
            $this->error('尚未登录！',U('Index/index'),1);
        }    

    }

    public function deleteCat(){
        if(IS_POST){
            $id =I('post.id');
            $cate = M('cate');
            $result = $cate -> where("id = $id") -> delete();
            if($result){
                $return[0] = 1;
            }else{
                $return[0] = 0;
            }
            $this->ajaxReturn($return);  

        }          
    }

 
}