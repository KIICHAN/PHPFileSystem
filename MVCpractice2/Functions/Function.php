<?php
// require_once("libs/View/TestView.class.php");
// require_once("libs/Controller/TestControl.class.php");
// require_once("libs/Model/TestModel.class.php");
function C($name,$method){
	$name = ucfirst($name);  //类名首字母大写
	$path = "Libs/Controller/".$name."Controller.class.php";
	try{
		require_once(autoChangeLoad($path));
	}catch(Exception $e){
	 	throw new \Libs\Exception\UndefinedException("调用了不存在的".$name." 控制器");	
	}
	$controller =$name."Controller";
	$controller = new $controller();
	if(!method_exists($controller,$method))
		throw new \Libs\Exception\UndefinedException("调用了".$name."控制器中不存在的".$method."方法");
	$controller->$method();
}
function M($name){
	$name = ucfirst($name);
	$path = "libs/Model/".$name."Model.class.php";
	try{
		require_once(autoChangeLoad($path));
	}catch(Exception $e){
	 	throw new \Libs\Exception\UndefinedException("调用了不存在的".$name." Module");	
	}
	$modelName = $name."Model";
	$obj = new $modelName();
	return $obj;
}
function V($name){
	$name = ucfirst($name);
	$path = "libs/View/".$name."View.class.php";
	require_once($path);
	$viewName = $name."View";
	$obj = new $viewName();
	return $obj;
}
function autoChangeLoad($path){
	if(DIRECTORY_SEPARATOR == "\\"){
		$path = str_replace("/", "\\", $path);
	}else{
		$path = str_replace("\\","/",$path);
	}
	if(!file_exists($path)){
		throw new \Libs\Exception\FileException("{$path}不存在");
	}
	return $path;
}