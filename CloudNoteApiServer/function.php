<?php

include_once './Class/Mysql.class.php';
include_once './Class/Response.class.php';

$db_provider = MysqlDB::getInstance();



/**
 * Login Interface
 * @author OUYANG
 */



if(isset($_POST['username']) && isset($_POST['password'])){
	// 	echo 'Success' . '<br/>';
	// 	echo 'username:' . $_POST['userName'] . ', password:' . $_POST['password'];

	$db_result = $db_provider->select('user', array(
			'id', 'username', 'password'
	), array(
			'username' => $_POST['username'],
			'password' => md5($_POST['password'])
	));

	if(!empty($db_result)){
		Response::show(1, '登陆成功', $db_result[0]);
	} else{
		Response::show(-1, '登陆失败，用户名或密码错误');
	}

	var_dump($db_result);


}



else{
	echo 'null[not by POST]';
}







