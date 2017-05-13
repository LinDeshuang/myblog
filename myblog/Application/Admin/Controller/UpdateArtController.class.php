<?php
namespace Admin\Controller;
use Think\Controller;

class UpdateArtController extends Controller
{
	public function index($aid=''){
		if(session('user_id')){
            $id = session('user_id');
            $admin_info = M('admin_info');
            $admin_name = $admin_info -> where("id = $id") -> find();
             $this -> assign('name',$admin_name['name']);
		$article = M('article');
		$article_info = $article -> where("id = $aid") -> find();
		$this -> assign('article_info',$article_info);
		$this -> display();
	 }else{
            $this->error('尚未登录！',U('Index/index'),1);
          } 
	}
	public function Update(){
		$article = M('article');
		if(IS_POST){
			$id = I('post.id');
			$data['title'] = I('post.title');
			$data['intro'] = I('post.intro');
			$data['content'] = I('post.content');
			$data['author'] = I('post.author');
			$data['type'] = I('post.type');
			if(!$article -> where("id = $id") -> save($data) ){
			$this -> error($article -> getError());
		}else{
			$this->success('修改成功，页面跳转中...',U('Admin/ArtManage/index'),2);
		}
		}
		
	}
}