<?php
namespace Admin\Controller;

use Think\Controller;

class AddcatController extends Controller
{
    public function index()
    {
        if(session('user_id')){
            $id = session('user_id');
            $admin_info = M('admin_info');
            $admin_name = $admin_info -> where("id = $id") -> find();
            $this -> assign('name',$admin_name['name']);
            $this->display();
        }else{
            $this->error('尚未登录！',U('Index/index'),1);
        }       
    }
    //添加分类
    public function upload(){
        if(IS_POST){
                    $config = array(
                        'maxSize' => 3145728,
                        'rootPath' => './Public/Uploads/',
                        'savePath' => './CatImg/',
                        'exts' => array('jpg','png','jpeg'),
                        'saveName' => '',
                        'replace' => true,
                        );
                    $upload = new \Think\Upload($config);// 实例化上传类
                    $info = $upload->uploadOne($_FILES['photo']);
                    if(!$info){
                        $this->error($upload->getError());
                    }else{
                        $Cat = M('cate');
                        $data['img_path'] = $info['savepath'];
                        $data['img_name'] = $info['savename'];
                        $data['name'] = I('post.name');
                        $data['article_sum'] = 0;
                        $name = $data['name'];
                        $result = $Cat -> where("name ='%s'",$name) -> find();
                        if($result){
                            $this->error('分类已存在',U('Admin/Addcat/index'),1);
                        }else{
                         if(!$Cat->add($data)){
                            $this->error($Cat->getError());
                        }else{
                            $this->success('上传成功，页面跳转中...',U('Admin/Addcat/index'),3);
                        }
                         
                        }
                         }
                  }
              }
}