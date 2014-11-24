<?php 
if ($_POST["email"]<>'') { 
    $ToEmail = 'anankitpatil@gmail.com'; 
    $EmailSubject = 'Agriwash contact form'; 
    $mailheader = "From: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $MESSAGE_BODY = "Name: ".$_POST["name"]."<br />"; 
    $MESSAGE_BODY .= "Email: ".$_POST["email"]."<br />"; 
    $MESSAGE_BODY .= "Message: ".nl2br($_POST["message"]).""; 
    mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
?>

Your message was sent
<?php 
} else { 
?>
<form class="contactform" id="contactform" novalidate>
  <label>Name</label>
  <input type="text" id="name" placeholder="Enter Name" class="name" name="name">
  <label>Email</label>
  <input type="email" id="email" placeholder="Enter Email" class="email" name="email">
  <label>Message</label>
  <textarea placeholder="Enter your message" class="message" name="message" id="message" style="height:96px;"></textarea>
  <input type="submit" class="button" value="Submit">
</form>
<script> validateThis(); </script>
<?php 
}; 
?>
