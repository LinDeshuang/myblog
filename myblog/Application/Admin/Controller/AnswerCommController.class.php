<?php
namespace Admin\Controller;
use Think\Controller;

class AnswerCommController extends Controller
{
	public function index($cid){
		if(session('user_id')){
            $id = session('user_id');
            $admin_info = M('admin_info');
            $admin_name = $admin_info -> where("id = $id") -> find();
             $this -> assign('name',$admin_name['name']);
		$comment = M('comments');
		$comment_info = $comment -> where("id = $cid") -> select();
		$this -> assign('comment_info',$comment_info);
		$this -> display();
	 }else{
            $this->error('尚未登录！',U('Index/index'),1);
          } 
	}
	public function answer(){
		$comment = M('comments');
		if(IS_POST){
			$id = I('post.id');
			$data['answer'] = I('answer');
			if(!$comment -> where("id = '$id'") -> save($data) ){
			$this -> error($comment -> getError());
		   }else{
			$this->success('上传成功，页面跳转中...',U('Admin/CommManage/index'),3);
		     }
		}
		
	}
}