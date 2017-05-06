<?php
namespace Libs\Cores;
class AutoloadClass{
	static function autoLoad($class){
		
		//兼容linux和windows
		$classPath = ROOTPATH."\\".$class.".class.php";
		if(DIRECTORY_SEPARATOR != "\\"){ 
			$classPath = str_replace("\\","/",$classPath);
		}
		if(!file_exists($classPath))
			throw new \Exception("自动加载".$class."类失败");
		require $classPath;
	}
}