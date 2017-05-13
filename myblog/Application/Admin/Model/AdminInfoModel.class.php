<?php
namespace Admin\Model;
use Think\Model;
class AdminInfoModel extends Model {
   	protected $_auto = array(
			array('pwd','md5',3,'function')
		);
}
