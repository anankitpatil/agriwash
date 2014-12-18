<?php
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('agriwash', $connection);
	
$data = mysql_query("SELECT * FROM news ORDER BY modified DESC") or die(mysql_error());
?>