<?php
require_once "FindFileByFilter.class.php";
require_once "FileFilters\ContentFilter.class.php";
require_once "FileFilters\ExtensionFilter.class.php";
require_once "FileFilters\NameFilter.class.php";
$contentFilter = new ContentFilter("Database");
// $extensionFilter = new ExtensionFilter("php");
 $nameFilter = new NameFilter("xml");
$test = new FindFileByFilter("MVCpractice2",$contentFilter,$nameFilter);
foreach ($test as $key => $value) {
	echo $value."<br/>";
}
var_dump(iterator_to_array($test));