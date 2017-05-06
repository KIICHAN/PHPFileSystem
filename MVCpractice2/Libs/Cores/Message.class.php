<?php
namespace Libs\Cores;

//message为 "status"=>"","message"=>"";
class Message implements IFactory{
	private $message;
	private function __construct($message){
		$this->message = $message;
	}
	static function getInstance($message = null){
		
		return new self($message);
	}
	function setMessage($message){
		$this->message = $message;
	}
	function getMessage(){
		return $this->message;
	}
	function send(){
		
		 // echo json_encode($this->message);
		 echo "发送数据: ";
		var_dump($this->message);
		echo "<br/>";
		
	}
}