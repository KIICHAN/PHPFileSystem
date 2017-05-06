<?php
namespace Libs\Cores;

//数据库入口，仅这一个
class Database implements \Libs\Cores\IFactory{
	private function __construct(){	
	}
	private function __clone(){
	}
	static function getInstance($dbname = "designtest",$dbId = "master"){
		//读取配置文件，连接数据库
		$db_conf = \Libs\Cores\Factory::getConfig("Config")["Database"][$dbId]; 
		$instance = new \Libs\Database\MySQLi($db_conf["db_ip"],$db_conf["db_user"],$db_conf["db_password"],$dbname);
		// echo "创建".$dbId."_".$dbname."数据库实例<br/>";
		return $instance;
	}
}


?>