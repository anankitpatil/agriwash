<?php 
define("UPLOAD_DIR", "/home/renewdesign/public_html/agriwash/uploads/");
if(isset($_POST['id']))
{
	$connection = mysql_connect('localhost','agriwash','E6D2b5Tp');
	mysql_select_db('agriwash',$connection);
	error_reporting(E_ALL && ~E_NOTICE);
	
	$id = $_POST['id'];
	$query = "DELETE FROM news WHERE id=$id";
	$getquery = "SELECT * FROM news WHERE id=$id LIMIT 1";
	$temp = mysql_query($getquery);
	while($news = mysql_fetch_array($temp)) { 
		$imagedelete = $news['image'];
	}
	if($imagedelete){
		unlink(UPLOAD_DIR . $imagedelete);
	}
	$result=mysql_query($query);
	if($result){
		echo $temp['image'];
	}	
}
?>