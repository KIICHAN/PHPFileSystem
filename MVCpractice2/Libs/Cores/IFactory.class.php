<?php 
namespace Libs\Cores;
//要入工厂的均要此接口
Interface IFactory{
	//static private $instance;         错误用法，interface不准定义变量
	//private function __construct();	错误用法，interface不准定义构造函数
	static function getInstance();   //若想带参数，必须有默认值，php参数是以array传递

}