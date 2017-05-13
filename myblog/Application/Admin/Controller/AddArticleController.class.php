<?php
namespace Admin\Controller;

use Think\Controller;

class AddArticleController extends Controller
{
    public function index()
    {
     if(session('user_id')){
            $id = session('user_id');
            $admin_info = M('admin_info');
            $admin_name = $admin_info -> where("id = $id") -> find();
            $cate = M('cate');
            $cate_name = $cate -> field('name') -> select();
            $this -> assign('cate_name',$cate_name);
            $this -> assign('name',$admin_name['name']);
    		$this->display();
    	}else{
            $this->error('尚未登录！',U('Index/Index'),1);
    	}       
    }
    public function Add(){
        if(IS_POST){
            $config = array(
                        'maxSize' => 3145728,
                        'rootPath' => './Public/Uploads/',
                        'savePath' => './ArticelImg/',
                        'exts' => array('jpg','png','jpeg'),
                        'saveName' => '',
                        'replace' => true,
                        );
                    $upload = new \Think\Upload($config);// 实例化上传类
                    $photo = $upload->uploadOne($_FILES['photo']);
                    if(!$photo){
                        $this->error($upload->getError());
                    }else{
                        $article = M('article');
                        $cate = M('cate');

                        $data['title'] = I('post.title');
                        $data['intro'] = I('post.intro');
                        $data['img_path'] = $photo['savepath'];
                        $data['img_name'] = $photo['savename'];
                        $data['category'] = I('post.category');
                        $data['author'] = I('post.author');
                        $data['content'] = I('post.content');
                        $data['type'] = I('post.type');
                        $data['create_time'] = date('Y-m-d');
                        $cate_info = $cate->where("name = '%s'",$data['category'])->find();
                        $sum = $cate_info['article_sum'];
                        if(!$article->data($data)->add()){
                            $this->error($article->getError());
                        }else{
                            $sum=$sum+1;
                            $data2['article_sum']=$sum;
                            if(!$cate->where("name = '%s'",$data['category'])->save($data2)){
                            $this->error($cate->getError());
                            }else{
                                $this->success('上传成功，页面跳转中...',U('Admin/AddArticle/index'),3);
                            }         
                       }
                    }                   
        }
    } 
}