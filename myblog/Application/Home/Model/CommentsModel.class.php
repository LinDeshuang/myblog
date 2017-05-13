<?php
namespace Home\Model;
use Think\Model;
class CommentsModel extends Model {
	     protected $_validate = array(
									array('nickname','1,30','姓名过长！',0,'length',3), 
									array('mail','email','邮箱格式错误！',0,'',3), 
									array('content','1,200','留言过长！',0,'length'), 
									);
}
?>