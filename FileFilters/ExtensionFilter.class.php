<?php
require_once "IFileFilter.class.php";
class ExtensionFilter implements IFileFilter{
	private $str;
	public function __construct($str){
		$this->str = $str;
	}
	public function filter(SplFileInfo $splFileInfo){
		if(!($splFileInfo->getExtension() == $this->str)){
			return false;
		}
		return true;
	}
}