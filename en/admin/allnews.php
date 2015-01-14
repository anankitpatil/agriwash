<?php
if(!defined('DB_USER')) { include("config/db.php"); }
$connection = mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME, $connection);
	
$data = mysql_query("SELECT * FROM news ORDER BY modified DESC") or die(mysql_error());
?>