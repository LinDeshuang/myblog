<?php
namespace Admin\Controller;

use Think\Controller;

class ArtManageController extends Controller
{
    public function index()
    {
if(session('user_id')){
            $id = session('user_id');
            $admin_info = M('admin_info');
            $article = M('article');
            $where='id>=1';
            $count=$article->where($where)->count();
            $p=getpage($count,4);
            //文章分页信息
            $list=$article->where($where)->order('id desc')->limit($p->firstRow,$p->listRows)->select();
            $admin_name = $admin_info -> where("id = $id") -> find();
            $this->assign('info',$list);
            $this->assign('page',$p->show());
            $this -> assign('name',$admin_name['name']);
            $this->display();
        }else{
            $this->error('尚未登录！',U('Index/index'),1);
        }    
    }
    public function deleteArt(){
        if(IS_POST){
                    $id =I('post.id');
                    $article = M('article');
                    $cate = M('cate');
                    $category= $article -> where("id = $id") -> field('category')->find();
                    $cate_info = $cate->where("name = '%s'",$category['category'])->find();
                    $sum = $cate_info['article_sum'];
                    $result = $article -> where("id = $id") -> delete(); 
                    if($result){
                        $sum=$sum-1;
                        $data['article_sum']=$sum;
                        $cate->where("name = '%s'",$category['category'])->save($data);
                        $return[0] = 1;
                    }else{
                        $return[0] = 0;
                    }
                    $this->ajaxReturn($return);  
                }
              }
}