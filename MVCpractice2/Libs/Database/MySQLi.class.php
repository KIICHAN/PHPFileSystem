<?php
namespace Libs\Database;
class MySQLi implements IDatabase
{
    protected $connect;
    function __construct($host,$user,$password,$dbname){
        // echo "创建mysqli实例(指定库)<br/>";
        $this->connect($host, $user, $password, $dbname);
        return $this->connect;
    }

    function connect($host, $user, $passwd, $dbname)
    {
        // error_reporting(0);

   
            try{
                $conn = mysqli_connect($host, $user, $passwd, $dbname);
            }catch(throwable $e){
                var_dump($e);
            }
        $this->connect = $conn;
    }
    function query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }

     
    function close()
    {
        mysqli_close($this->conn);
    }
}
