<?php
namespace Admin\Controller;
use Think\Controller;

class UpdateDiaryController extends Controller
{
	public function index($did=''){
		if(session('user_id')){
            $id = session('user_id');
            $admin_info = M('admin_info');
            $admin_name = $admin_info -> where("id = $id") -> find();
            $this -> assign('name',$admin_name['name']);
		    $diary = M('diary');
		    $diary_info = $diary -> where("id = $did") -> find();
		    $this -> assign('diary_info',$diary_info);
		    $this -> display();
	    }else{
            $this->error('尚未登录！',U('Index/index'),1);
          } 
	}
	public function Update(){
		$diary = M('diary');
		if(IS_POST){
			$id = I('post.id');
			$data['title'] = I('post.title');
			$data['content'] = I('post.content');
			if(!$diary -> where("id = $id") -> save($data) ){
			$this -> error($diary -> getError());
		}else{
			$this->success('修改成功，页面跳转中...',U('Admin/AddDiary/index'),2);
		}
		}
		
	}
}