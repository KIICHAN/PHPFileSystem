<?php

class TestController{
	function show(){
		$testModel = M("Test");
		$data = $testModel->get();
		$testView = V("Test");
		$testView->display($data);
	}

}