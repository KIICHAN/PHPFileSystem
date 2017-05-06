<?php
namespace Libs\Cores;
class Init{
	static public $controller;
	static public $method;

	static private function init_DB(){
		Factory::getDatabase($dbname = "designtest",$dbId = "master");
	}
	//CM:controller and method
	static private function init_CM(){
		switch (self::getQueryMode()) {
			case 'get':
				var_dump($_GET);
				if(!isset($_GET["controller"]) || !isset($_GET["method"]))
					throw new \Libs\Exception\InitException("请按照输入格式输入,如\index.php?controller=test\\method=show");
				self::$controller = isset($_GET["controller"])?addslashes($_GET["controller"]):"index";
				self::$method = isset($_GET["method"])?addslashes($_GET["method"]):"index";
				break;
			case 'url':
				$url = $_SERVER["REQUEST_URI"];
				$urlArr = explode("/","$url");
				if(!isset($urlArr["3"]) || !isset($urlArr["4"]))
			   		 throw new \Libs\Exception\InitException("请按照输入格式输入,如\index.php\\test\\show");
				self::$controller = $urlArr["3"]?addslashes($urlArr["3"]):"index";
				self::$method = $urlArr["4"]?addslashes($urlArr["4"]):"index";
			    break;
			default:
				// $message = Factory::getMessage(array("status"=>2,"message"=>"控制器配置出现错误"));
				throw new \Libs\Exception\InitException("控制器配置文件出现错误");
				break;
		}
		
	}
	//初始化异常捕获是否开启（开启后将错误输出到日志，返回给前端错误信息）
	static private function init_Exception(){
		if(!Factory::getConfig()["global"]["openException"]){
			// require_once "Functions/TopException.php";
			set_exception_handler(null);
		}
	}

	static private function getQueryMode(){
		$queryModes =  Factory::getConfig()["controllers"]["queryMode"];
		foreach ($queryModes as $key => $value) {
			if($value == "true"){
				$mode = $key;
				break;
			}
		}
		if(!isset($mode))
			throw new \Libs\Exception\InitException("控制器配置文件出现错误，请开启一个控制器");
		return $mode;
		
	}
	//检查控制器和方法是否存在（可以通过配置文件进行开关）
	static private function checkCM($controller,$method){
		if(!$controllersAllow = Factory::getConfig()["global"]["controllerFilter"])
			return;
		$controllersAllow = Factory::getConfig()["controllers"]["controllersAllow"];

		if(isset($controllersAllow[$controller])){
			foreach ($controllersAllow[$controller] as $value) {
				if($value == $method){
					$message = Factory::getMessage(array("status"=>1,"message"=>"方法".$method."存在"));
				}
			}
			if(!isset($message))
				$message = Factory::getMessage(array("status"=>2,"message"=>"方法".$method."不存在"));
		}else{
			$message = Factory::getMessage(array("status"=>2,"message"=>"控制器".$controller."不存在"));
		}
		$message->send();
	}

    static public function run(){
    	self::init_Exception();
    	self::init_DB();
    	self::init_CM();
    	//从配置文件中读取允许访问的控制器和方法；
    	self::checkCM(self::$controller,self::$method);
    	C(self::$controller,self::$method);
    }

}