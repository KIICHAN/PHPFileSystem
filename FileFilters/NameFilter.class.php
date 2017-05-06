<?php
require_once "IFileFilter.class.php";
class NameFilter implements IFileFilter{
	private $str;
	public function __construct($str){
		$this->str = $str;
	}
	public function filter(SplFileInfo $splFileInfo){
		$pattern = "/".$this->str."/";
		if(!preg_match($pattern, $splFileInfo->getFileName())){
			return false;
		}
		return true;
	}
}