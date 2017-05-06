<?php
namespace Libs\Cores;
//当前路径下可以是同一个命名空间可以直接类名就好
//均为静态函数,无须实例化，直接通过作用域访问
class Factory{

	//获取数据库中指定库，默认为designtest库（主库)
	static function getDatabase($dbname = "designtest",$dbId = "master"){
		$key = $dbId."_".$dbname;
		if(Register::get($key)){
			echo "已经注册了".$key."</br>";
			return Register::get($key);
		}
		$db = Database::getInstance($dbname,$dbId);
		Register::set($key,$db);
		return $db;
	}

	static function getUsersTable($id=1){
		$key = "users_".$id;             //以表名加_id注册，表名很多有s
		if(!Register::get("{$key}")){
		$usersTable = new \Libs\Model\Designtest\UsersTable($id);
		Register::set("{$key}",$usersTable);
		return $usersTable;
		}else{
			return Register::get("$key");
		}
	}

	static function getConfig($path = "Config"){
		$key = "ConfigPath_".$path;
		if(!Register::get($key)){
			$config = Config::getInstance($path);
			Register::set($key,$config);
		}
		return Register::get($key);
	}

	//发送消息回前端
	static function getMessage($message = null){
		$message = Message::getInstance($message);
		return $message;
	}
}
?>