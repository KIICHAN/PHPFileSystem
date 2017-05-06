<?php
$controllers = array(
	"controllersAllow" => array(
						"admin" => array(
									"login",
									"logout"),
						"test" => array(
									"test",
									"show"
									)
						),
	//get 是URL?controller=..&method=..
	//url 是index.php/controller/method?......
	//使用第一个true的模式，全部为false则默认为第一个
	"queryMode" => array(
				   "get" => false,
				   "url" => true
				   ),
);
return $controllers;
?>