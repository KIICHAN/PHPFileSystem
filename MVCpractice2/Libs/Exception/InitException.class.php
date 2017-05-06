<?php
namespace Libs\Exception;
class InitException extends \Exception implements IException{
	protected  $exceptionType = "init_exception";
	protected  $exceptionCode;   //暂时保留
	public function getInfo(){
		return "\n初始化错误:".$this->getMessage()."\n文件名".$this->getFile()."\n行数:".$this->getLine()."\n";
	}
	public function getExceptionType(){
		return $this->exceptionType;
	}
	public function getExceptionCode(){
		return $this->exceptionCode;
	}
}