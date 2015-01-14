<?php
include("config/db.php");
$connection = mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME, $connection);

$id = $_GET['id'];
	
$data = mysql_query("SELECT id, title, content, image FROM news_es WHERE id = '$id'") or die(mysql_error());
$row = mysql_fetch_row($data);

$data = array('id' => $row[0], 'title' => $row[1], 'content' => $row[2], 'image' => $row[3]);
print json_encode($data);
?>