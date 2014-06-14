<?php

//MySQL settings
define("DATABASE_HOST",       "localhost");
define("DATABASE_USER",       "root");
define("DATABASE_PASSWORD",   "Kudewe58");
define("DATABASE_NAME",       "shoppingList");

//connect to MySQLServer
$dbc = mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD);
mysql_set_charset("utf8", $dbc);
mysql_select_db(DATABASE_NAME, $dbc);


//functions - should be moved to separate file
function myuniqid(){
	return substr(md5(uniqid(rand(0,time()),1)),0,13);
}


?>