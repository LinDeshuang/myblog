<?php
namespace Admin\Controller;

use Think\Controller;

class CommManageController extends Controller
{
    public function index()
    {
    	if(session('user_id')){
            $id = session('user_id');
            $admin_info = M('admin_info');
            $admin_name = $admin_info -> where("id = $id") -> find();
            $this -> assign('name',$admin_name['name']);

            $comment = M('comments');
            $where='id>=1';
            $count=$comment->where($where)->count();
            $p=getpage($count,4);
            $list=$comment->where($where)->order('id desc')->limit($p->firstRow,$p->listRows)->select();
            //评论分页信息
             $this->assign('info',$list);
            $this->assign('page',$p->show());
            $this->display();
        }else{
            $this->error('尚未登录！',U('Index/index'),1);
        }    

    }

    public function deleteComm(){
        if(IS_POST){
            		$id =I('post.id');
            		$comment = M('comments');
            		$result = $comment -> where("id = $id") -> delete();
            		if($result){
            		    $return[0] = 1;
            		}else{
            		       $return[0] = 0;
            		     }
           		    $this->ajaxReturn($return);  

                   }          
                }
    public function UpdateStatue(){
        if(IS_POST){
            		$id = I('post.id');
            		$data['statue'] = I('post.statue');
            		if($data['statue'] == 1){
            			$data['statue'] = 0;
            		}else{
            			$data['statue'] = 1;
            		}
            		$comment = M('comments');
            		$result = $comment -> where("id = $id") -> save($data);
            		if($result){
            		    $return[0] = 1;
            		}else{
            		       $return[0] = 0;
            		     }
           		    $this->ajaxReturn($return);  

                   }          
                }

 
}