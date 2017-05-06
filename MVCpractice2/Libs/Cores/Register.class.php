<?php
namespace Libs\Cores;
//注册树，不一定是注册类，可以是任何东西，要用的时候get调用就可以了
class Register{
	protected static $objects;
	static function set($alias,$object){
		if(!isset(self::$objects[$alias])){				//isset不会报notice的错误（如果没有定义的话）
			self::$objects[$alias] = $object;
		}
	}
	static function _unset($alias){
		unset(self::$objects[$alias]);
	}
	static function get($alias){
		if(isset(self::$objects[$alias])){
			return self::$objects[$alias];
		}else{
			return false;
		}
	}
}