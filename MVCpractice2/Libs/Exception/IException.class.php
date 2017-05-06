<?php
namespace Libs\Exception;
Interface IException {
	//prtected $exceptionType = "   ";
	//protected  $exceptionCode;
	function getInfo();
	function getExceptionType();
	function getExceptionCode();
}