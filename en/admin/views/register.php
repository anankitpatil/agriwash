<?php ob_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Agriwash News Manager</title>
<link rel="stylesheet" type="text/css" href="../../css/admin.css"/>
<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css"/>
<script src="../../js/jquery-2.1.1.min.js"></script>
<script src="../../js/admin.js"></script>
</head>
<body>
<div class="container">
  <div class="wrapper">
    <div class="logo"><img src="../../img/logo_.png" /></div>
    <?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>
    <form method="post" action="register.php" name="registerform" class="registerform">
      <label for="login_input_username">Username (only letters and numbers)</label><br />
      <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required /><br />
      <label for="login_input_email">User's email</label><br />
      <input id="login_input_email" class="login_input" type="email" name="user_email" required /><br />
      <label for="login_input_password_new">Password (min. 6 characters)</label><br />
      <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" /><br />
      <label for="login_input_password_repeat">Repeat password</label><br />
      <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /><br />
      <input type="submit"  name="register" value="Register" class="button" />
      <a href="index.php" class="back">Back to Login Page</a>
    </form>
  </div>
</div>
</body>
