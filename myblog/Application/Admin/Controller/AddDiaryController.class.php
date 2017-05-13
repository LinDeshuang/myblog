<?php
namespace Admin\Controller;

use Think\Controller;

class AddDiaryController extends Controller
{
    public function index()
    {
     if(session('user_id')){
            $id = session('user_id');
            $admin_info = M('admin_info');
            $diary = M('diary');
            $admin_name = $admin_info -> where("id = $id") -> find();
            //随笔分页
            $where='id>=1';
            $count=$diary->where($where)->count();
            $p=getpage($count,4);
            //文章分页信息
            $list=$diary->where($where)->order('id desc')->limit($p->firstRow,$p->listRows)->select();
            $this -> assign('name',$admin_name['name']);
            $this -> assign('diary',$list);
            $this->assign('page',$p->show());
    		$this->display();
    	}else{
            $this->error('尚未登录！',U('Index/index'),1);
    	}       
    }
    public function Add(){
        if(IS_POST){
             $diary = D('diary');
             $data['title'] = I('post.title');
             $data['content'] = I('post.content');
             $data['create_time'] = date('Y-m-d H:m');
             if($diary->create($data)){
                $return[0] = 1;
                $diary->add();
             }else{
                $return[1] = $diary->getError();
                $return[0] = 0;
             }
             $this->ajaxReturn($return);
           }
       }
      public function Delete(){
        if(IS_POST){
                    $id =I('post.id');
                    $diary = M('diary');
                    $result = $diary -> where("id = $id") -> delete();
                    if($result){
                        $return[0] = 1;
                    }else{
                           $return[0] = 0;
                         }
                    $this->ajaxReturn($return);  

                   }          
                }
}