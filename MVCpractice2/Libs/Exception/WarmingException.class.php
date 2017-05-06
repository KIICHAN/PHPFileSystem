<?php
namespace Libs\Exception;
class WarmingException extends \Exception implements IException{
	protected  $exceptionType = "warming_exception";
	protected  $exceptionCode;   //暂时保留
	public function getInfo(){
		return "\n警告错误:".$this->getMessage()."\n文件名".$this->getFile()."\n行数:".$this->getLine()."\n";
	}
	
	public function getExceptionType(){
		return $this->exceptionType;
	}
	public function getExceptionCode(){
		return $this->exceptionCode;
	}
}