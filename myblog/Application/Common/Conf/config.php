<?php
return array(
	//'配置项'=>'配置值'
		//'配置项'=>'配置值'
	'URL_MODEL'=>'2',
	'DB_TYPE'                => 'MYSQL', // 数据库类型
    'DB_HOST'                => 'localhost', // 服务器地址
    'DB_NAME'                => 'myblog', // 数据库名
    'DB_USER'                => 'root', // 用户名
    'DB_PWD'                 => '1c360ee002', // 密码
    'DB_PORT'                => 3306, // 端口
    'DB_PREFIX'              => '', // 数据库表前缀
    'DB_CHARSET'=> 'UTF8', // 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
	//配置session
	'SESSION_OPTIONS' => array(
			'expire'  =>  3600
		)
);