<?php
namespace Admin\Model;
use Think\Model;
class DiaryModel extends Model {
		     protected $_validate = array(
									array('title','1,50','标题过长！',0,'length',3), 
									array('content','1,500','内容过长！',0,'length'), 
									);

}
