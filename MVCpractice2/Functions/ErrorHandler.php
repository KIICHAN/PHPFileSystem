<?php  
// we will do our own error handling  
error_reporting(0);  
function ErrorHandler($errno, $errmsg, $filename, $linenum, $vars)  
{  
    // timestamp for the error entry      
    $dt = date("Y-m-d H:i:s (T)");      
    // define an assoc array of error string      
    // in reality the only entries we should      
    // consider are E_WARNING, E_NOTICE, E_USER_ERROR,      
    // E_USER_WARNING and E_USER_NOTICE      
    $errortype = array (                  
        E_ERROR              => 'Error',                  
        E_WARNING            => 'Warning',                  
        E_PARSE              => 'Parsing Error',                  
        E_NOTICE             => 'Notice',                  
        E_CORE_ERROR         => 'Core Error',                  
        E_CORE_WARNING       => 'Core Warning',                  
        E_COMPILE_ERROR      => 'Compile Error',                  
        E_COMPILE_WARNING    => 'Compile Warning',                  
        E_USER_ERROR         => 'User Error',                  
        E_USER_WARNING       => 'User Warning',                  
        E_USER_NOTICE        => 'User Notice',                  
        E_STRICT             => 'Runtime Notice',                  
        E_RECOVERABLE_ERROR  => 'Catchable Fatal Error'                  
    );      
    // set of errors for which a var trace will be saved      
    $user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);          
    // $err = "<errorentry>\n";      
    // $err .= "\t<datetime>" . $dt . "</datetime>\n";      
    // $err .= "\t<errornum>" . $errno . "</errornum>\n";      
    // $err .= "\t<errortype>" . $errortype[$errno] . "</errortype>\n";      
    // $err .= "\t<errormsg>" . $errmsg . "</errormsg>\n";      
    // $err .= "\t<scriptname>" . $filename . "</scriptname>\n";      
    // $err .= "\t<scriptlinenum>" . $linenum . "</scriptlinenum>\n";    
     $err = "<errorentry>\n";      
    $err .= "<br/>时间：" . $dt . "</datetime>\n";      
    $err .= "<br/>错误:" . $errno . "</errornum>\n";      
    $err .= "<br/>错误类型：" . $errortype[$errno] . "</errortype>\n";      
    $err .= "<br/>错误消息：" . $errmsg . "</errormsg>\n";      
    $err .= "错误文件:" . $filename . "</scriptname>\n";      
    $err .= "错误行数：" . $linenum . "</scriptlinenum>\n";   
    if (in_array($errno, $user_errors)) {          
        $err .= "\t<vartrace>" . wddx_serialize_value($vars, "Variables") . "1111111</vartrace>\n";      
    }      
    $err .= "</errorentry>\n\n";  
    echo $err;  
} 