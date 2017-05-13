<?php
namespace Home\Controller;

use Think\Controller;

class CommentController extends Controller
{
    public function index()
    {
    	$cate = M('cate');
        $article = M('article');
        $comment = M('comments');
        $time = date('Y-m-d');
/*所有分类信息*/
    	$cate_name = $cate -> field('id,name,article_sum') ->select();
/*最热文章信息*/          
    	$hot = $article -> where('id>0') ->order('click_sum desc') -> limit(7) -> select();
        /*最新留言*/
        $com = $comment -> where('id>0') -> order('com_time desc') -> limit(4) -> select(); 
/*留言分页*/
        $where="id>= 1";
        $count=$comment->where($where)->count();
        $p = getpage($count,10);
        $list = $comment->where($where)->order('id desc')->limit($p->firstRow,$p->listRows)->select();
        $this ->assign('info',$list);
        $this ->assign('comment',$com);
        $this ->assign('page',$p->show());
        $this -> assign('time',$time);
        $this -> assign('hot',$hot);
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