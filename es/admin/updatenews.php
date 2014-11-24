<?php 
define("UPLOAD_DIR", "/home/renewdesign/public_html/agriwash/uploads/");
if(isset($_REQUEST))
{
	$connection = mysql_connect('localhost', 'agriwash', 'E6D2b5Tp');
	mysql_select_db('agriwash',$connection);
	error_reporting(E_ALL && ~E_NOTICE);
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$content = mysql_real_escape_string($_POST['content']);
	$image = preg_replace("/[^A-Z0-9._-]/i", "_", $_FILES['image']['name']);
	
	if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0)
	{
		unlink(UPLOAD_DIR . $fileName['name']);
		if (file_exists(UPLOAD_DIR . $fileName['name']))
		{
			$name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
			$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			$increment = '';
			while(file_exists(UPLOAD_DIR . $name . $increment . '.' . $extension)) {
				$increment++;
			}
			$basename = $name . $increment . '.' . $extension;
			move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR . $basename);
		}
		$sql = "UPDATE news_es SET title = '$title', content = '$content', image = '$basename' WHERE id = '$id'";
	} else {
		$sql = "UPDATE news_es SET title = '$title', content = '$content' WHERE id = '$id'";
	}
	
	
	$result = mysql_query($sql);
	if($result){
		echo "News item updated successfully.";
	}	
}
?>