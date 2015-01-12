<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Agriwash</title>
<link rel="stylesheet" type="text/css" href="../../../css/styles.css"/>
<!--<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"/>-->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!--<script src="../js/jquery-2.1.1.min.js"></script>-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../../../js/jquery.cookiebar.min.js"></script>
<script type='text/javascript' src="//wurfl.io/wurfl.js"></script>
<script src="../../../js/scripts.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56171024-1', 'auto');
  ga('send', 'pageview');
</script>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
  <nav class="on">
    <div class="wrapper">
      <figure class="smooth"><a href="../../../" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system"><img class="smooth" src="../../../img/agriwash-logo.svg" alt="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system" /></a></figure>
      <div class="regions-container smooth"> <a href="javascript:" class="regions smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system English & Spanish">Language</a>
        <ul class="regions-dropdown smooth">
          <li><a href="../" class="active smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system English version">English</a></li>
          <li><a href="http://agriwash.com/es/" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system Spanish version">Español</a></li>
        </ul>
      </div>
      <ul class="smooth">
        <li class="smooth">
          <a href="../../#product" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system product information">Products</a>
          <ul class="dropdown smooth">
            <li class="smooth"><a href="../../defender/" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system product information">Defender</a></li>
            <li class="smooth"><a href="../../enforcer/" class="smooth" title="Rhino Agriwash Enforcer - Automatic drive-through Vehicle disinfection and Wheel washing system product information">Enforcer</a></li>
          </ul>
        </li>
        <li class="smooth"><a href="../../#requirements" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system technical specifications">Customer Requirements</a></li>
        <li class="anomaly smooth"><a href="../../#requirements" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system technical specifications">Customer<br />Requirements</a></li>
        <li class="smooth"><a href="../../#contact" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system contact email, address and phone number">Contact</a></li>
        <!--<li><a href="#news" class="smooth">News</a></li>-->
      </ul>
    </div>
  </nav>
  <div class="container singlenews">
    <div class="wrap">
<?php
include("admin/config/db.php");
$connection = mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME, $connection);
	
$esc = mysql_real_escape_string($_GET['title']);
$string = str_replace('-', ' ', $esc);
$data = mysql_query('SELECT * FROM news WHERE title = "'.$string.'" LIMIT 1') or die(mysql_error());
while($news = mysql_fetch_array($data)) { ?>
  <div class="item" id="<?php echo $news['id']; ?>">
    <h2><?php echo $news['title']; ?></h2>
    <h4><?php echo str_replace('-', '/', substr($news['modified'], 0, 10)); ?></h4>
    <figure><img src="../../../uploads/<?php echo $news['image']; ?>" /></figure>
    <div class="content"><p><?php echo $news['content']; ?></p></div>
  </div>
<?php } ?>
    </div>
    <div style="text-align:center">
      <a href="../../news/" class="button smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system download product specifications PDF">All News</a>
	  <a href="../../" class="button smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system download product specifications PDF">Products</a>
    </div>
  </div>
  <footer>
    <div class="wrapper">
      <div class="half">
        <p><a href="./"><figure style="width:150px"><img src="../../../img/agriwash-logo.svg" alt="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system" /></figure></a></p>
        <p>&nbsp;</p>
        <p>T: +44 (0)1270 214 886</p>
        <p>E: <a href="mailto:sales@agriwash.com" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system email contact">sales@agriwash.com</a></p>
      </div><div class="half">
        <p><b>Help & Support</b></p>
        <p><a href="../../defender" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system product information">Defender</a></p>
        <p><a href="../../enforcer/" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system product information">Enforcer</a></p>
        <p><a href="../../#contact" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system contact emil, address and phone number">Contact Information</a></p>
        <p><a href="../../#message" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system contact emil, address and phone number">Leave us a message</a></p>
        <p><a href="../../news/" class="smooth" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system contact emil, address and phone number">News</a></p>
        <p><a href="http://wheelwash.com/en/termsofuse" target="_blank" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system terms and conditions">Terms of Use</a></p>
        <p><a href="http://wheelwash.com/en/privacy" target="_blank" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system privacy policy">Privacy Policy</a></p>
        <p><a href="http://wheelwash.com/en/faq" target="_blank" title="Rhino Agriwash Defender - Automatic drive-through Vehicle disinfection and Wheel washing system frequently asked questions">FAQs</a></p>
      </div>
    </div>
  </footer>
</body>
</html>
