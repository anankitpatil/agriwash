<?php
$connection = mysql_connect('localhost', 'agriwash', 'E6D2b5Tp');
mysql_select_db('agriwash', $connection);

$id = $_GET['id'];
	
$data = mysql_query("SELECT id, title, content, image FROM news WHERE id = '$id'") or die(mysql_error());
$row = mysql_fetch_row($data);

$data = array('id' => $row[0], 'title' => $row[1], 'content' => $row[2], 'image' => $row[3]);
print json_encode($data);
?>