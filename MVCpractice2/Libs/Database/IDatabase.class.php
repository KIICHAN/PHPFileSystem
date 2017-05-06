<?php
namespace Libs\Database;

Interface IDatabase
{
    function connect($host, $user, $passwd, $dbname);
    function query($sql);
    function close();
}
?>
