<?php
include("../../smarty_inc.php");
require_once('../../Model/mysql_class.php');
define("CONN", "localhost");
define("USER", "root");
define("PASS", "");
define("DB_NAME", "new_photowall");
define("GB_SET", "gb2312");
define("UTF8_SET", "utf8");
$db =  new mysql('localhost','root','','new_photowall',"utf8");
?>