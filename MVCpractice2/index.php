<?php
//统一url： localhost/index.php?controller=6666&method=6666
// 注意兼容性
define("ROOTPATH", __DIR__);
require_once "Functions/TopException.php";
set_exception_handler("TopException");
require_once "Functions/ErrorHandler.php";
set_error_handler("ErrorHandler");
require_once "Functions/Function.php";
require_once "Libs/Cores/AutoloadClass.class.php";
//实现自动加载
spl_autoload_register("\\Libs\\Cores\\AutoloadClass::autoLoad");
\Libs\Cores\Init::run();
