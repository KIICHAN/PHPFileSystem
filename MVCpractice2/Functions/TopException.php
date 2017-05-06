<?php
function TopException($e){
	if($e instanceof \LIbs\Exception\IException){
		date_default_timezone_set('Asia/Shanghai');
		echo "<br/>时间:".date("Y-m-d H:i:s").$e->getInfo();
		echo "<br/>";
		echo $e->__toString();
		// $message = \Libs\Cores\Factory::getMessage($e->getExceptiontype());
		// $message->send();
	}else{
		echo "<br/>时间:".date("Y-m-d H:i:s")."未知异常错误：".$e->getMessage()."\n文件名:".$e->getFile()."\n行数:".$e->getLine()."\n";
		//$message = \Libs\Cores\Factory::getMessage("未知错误");
		//$message->send();
		echo "<br/>";
		echo $e->__toString();
	}
	exit;
}