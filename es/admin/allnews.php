<?php
$connection = mysql_connect('localhost', 'agriwash', 'E6D2b5Tp');
mysql_select_db('agriwash', $connection);
	
$data = mysql_query("SELECT * FROM news_es ORDER BY modified DESC") or die(mysql_error());
?>