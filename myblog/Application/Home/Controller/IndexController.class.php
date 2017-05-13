<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
    	$cate = M('cate');
    	$cate_name = $cate -> field('id,name,article_sum') ->select();
    	$article = M('article');
    	$article_info = $article ->where('id>0') -> order('create_time desc') -> limit(9) ->select();
        $hot = $article -> where('id>0') ->order('click_sum desc') -> limit(7) -> select();
        $comment = M('comments') -> where('id>0') -> order('com_time desc') -> limit(5) ->select();
        $time = date('Y-m-d');
        $this -> assign('time',$time);
        $this -> assign('hot',$hot);
        $this -> assign('comment',$comment);
    	$this -> assign('article_info',$article_info);
    	$this -> assign('cate_name',$cate_name);
        $this->display();
    }

    public function comment(){
            if (IS_POST) {
            $comment = D('comments');
            $data['nickname'] = I('post.nickname');
            $data['mail'] = I('post.mail');
            $data['content'] = trim(str_replace("\n","<br>",I('post.content')));
            $data['com_time'] = date('Y-m-d H:m:s');
            $data['statue'] = '1';
            $verify = I('post.verify');  
            if(check_verify($verify)){  
                                       if(!$comment->create($data)){
                                        $return[0] = 0;
                                        $return[1] = $comment->getError();
                                       } else{
                                        $return[0] = 1;
                                        $comment -> add();
                                       }                                       
                                   }else{
                                          $return[0] = 2;       
                                      }
           $this->ajaxReturn($return);
          }
    }
    public function verifyShow(){
    $config = array(
                    'fontSize' => 30, // 验证码字体大小
                    'length' => 4, // 验证码位数
                    'useNoise' => true, // 关闭验证码杂点
                   );
    $Verify = new \Think\Verify($config);
    $Verify->entry();
    } 
}