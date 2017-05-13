<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
     if(session('user_id')){
       $this->redirect('Admin/Adm/index',array(), 2, '已登录，页面跳转中...');
     }
   	 if (IS_POST) {
    		$user_admin = M('AdminInfo');
    		$data = I('post.');
            $verify = I('post.verify');  
            if(check_verify($verify)){  
                                        
    		                            $result = $user_admin->where("name='%s' and pwd='%s'",$data['name'],substr(md5($data['pwd']),0,30))->find();
    		                            if ($result) {
    		                            	$da['statue']='1';
    		                            	session('user_id',$result['id']);
    		                            	$user_admin->where('id = 1')->save($da);
    		                            	$return[0] = 1;
    		                            }else{
                                          $return[0] = 0;       
                                      }
                                   }else{
    			                          $return[0] = 2;		
    		                          }
    	   $this->ajaxReturn($return);
    	  }
        $this->display();
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