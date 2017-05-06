<?php
namespace Libs\Exception;
class NoticeException extends \Exception implements IException{
	protected  $exceptionType = "notice_exception";
	protected  $exceptionCode;   //暂时保留
	public function getInfo(){
		return "\n注意错误:".$this->getMessage()."\n文件名".$this->getFile()."\n行数:".$this->getLine()."\n";
	}
	
	public function getExceptionType(){
		return $this->exceptionType;
	}
	public function getExceptionCode(){
		return $this->exceptionCode;
	}
}