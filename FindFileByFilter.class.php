<?php
/**
* 自定义文件过滤迭代器：通过传入路径和文件扩展名，返回含该文件扩展名的文件名
*
* @author 参考《php高级程序设计模式，框架与测试》
* @param  string $path 当前目录下的路径,不能文件名
* @param  string $extension 要查找的文件扩展名，如"xml";
* @return string 找到的文件名;按照顺序查找。
*/
class FindFileByFilter extends FilterIterator{
	protected $filters;
	protected $path;
	function __construct($path){
		//读取参数，参数为数组则进一步读取它的值，过滤掉没有实现过滤器接口的参数（暂时不抛出异常）
		$this->filters = array();
		$args = func_get_args();
		array_shift($args);
		foreach ($args as $value) {
			if(is_array($value)){
				foreach ($value as $v) {
					if(!($v instanceof IFileFilter))
					    continue;
					$this->filters[] = $v;
				}
			}else{ 
				if(!($value instanceof IFileFilter))
					continue;
				$this->filters[] = $value;
			}
		}
		$this->path = $path;
		$dirIterator = new RecursiveDirectoryIterator($this->path); //获取文件结构
		$fileIterator = new RecursiveIteratorIterator($dirIterator);//重新包装下结构
		parent::__construct($fileIterator);
	}
	function accept(){
		if(!empty($this->filters))
			foreach($this->filters as $filter){
				if(!$filter->filter($this->current()))
					return false;
			}
		return true;
	}
	function setFilters($filter){
		$this->filters[] = $filter;
	}
}