<?php
namespace Libs\Cores;
class Config implements \ArrayAccess,\Libs\Cores\IFactory{
	private $path;
	private $config = array();
	private function __construct($path){
		$this->path = $path;
	}
	static function getInstance($path = "Config"){
		return new self($path);
	}
	function offsetExists($offset){

	}
	function offsetGet($key){
	if(empty($this->config[$key])){
		$file_path = $this->path."\\".$key.".php";
		$config = require $file_path;
		$this->config[$key] = $config;

	}
	return $this->config[$key];
	}
	function offsetSet($key,$config){

	}
	function offsetUnset($offset){

	}
}