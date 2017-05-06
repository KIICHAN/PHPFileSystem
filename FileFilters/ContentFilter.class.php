<?php
require_once "IFileFilter.class.php";
class ContentFilter implements IFileFilter{
	private $str;
	public function __construct($str){
		$this->str = $str;
	}
	public function filter(SplFileInfo $splFileInfo){
		//var_dump($splFileInfo->getPathname());
		if($splFileInfo->getFileName() == "." || $splFileInfo->getFileName() == "..")
			return false;
		$pattern = "/".$this->str."/";
		if(preg_match($pattern, file_get_contents($splFileInfo->getPathname())))
		 	return true;
		else return false;
	}
}