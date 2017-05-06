<?php
 namespace Libs\Model\Designtest;
//不采用单例模式，有外部参数引入
class UsersTable{
	public $id;
	public $name;
	public $password;
	public $count;
	protected $db;
    function __construct($id = 1){
    	echo $id."........<br/>";
		if(!$this->db)
			$this->db = \Libs\Cores\Factory::getDatabase("designtest","master");
		$res = $this->db->query("select * from users where id={$id} limit 1");
		$row = $res->fetch_assoc();
		$this->id = $row["id"];
		$this->name = $row["name"];
		$this->password = $row["password"];
		$this->count = $row["count"];
	}
	static function getInstance(){
		if(!self::$instance){
			self::$instance = new Database\MySQLi ();
			echo "创建usersTable实例";
			return self::$instance;
		}else{
			return self::$instance;
		}
	}
	function __destruct(){
		$this->db->query("update `users` set `name`='{$this->name}',`password`='{$this->password}',`count`='{$this->count}' where `id`='{$this->id}' limit 1");
	}

}