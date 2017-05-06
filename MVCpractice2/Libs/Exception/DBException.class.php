<?php
namespace Libs\Exception;
class DBException extends \Exception implements IException{
	protected  $exceptionType = "database_exception";
	protected  $exceptionCode;   //暂时保留
	public function getInfo(){
		return "\n数据库错误:".$this->getMessage()."\n文件名".$this->getFile()."\n行数:".$this->getLine()."\n";
	}
	public function getExceptionType(){
		return $this->exceptionType;
	}
	public function getExceptionCode(){
		return $this->exceptionCode;
	}
}