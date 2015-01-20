<?php ob_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Agriwash News Manager</title>
<link rel="stylesheet" type="text/css" href="../../css/admin.css"/>
<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css"/>
<script src="../../js/jquery-2.1.1.min.js"></script>
<script src="../../js/jquery.form.min.js"></script>
<script src="../../js/admin.js"></script>
</head>
<body>
<div class="container">
  <div class="wrapper">
	<?php
    if (version_compare(PHP_VERSION, '5.3.7', '<')) {
        exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
    } else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
        require_once("libraries/password_compatibility_library.php");
    }
    require_once("config/db.php");
    require_once("classes/Login.php");
    $login = new Login();
    if ($login->isUserLoggedIn() == true) {
        include("views/logged_in.php");
    } else {
        include("views/not_logged_in.php");
    }
    ?>
  </div>
</div>
</body>
