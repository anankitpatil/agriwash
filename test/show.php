<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Agriwash</title>
<link rel="stylesheet" type="text/css" href="../../../css/styles.css"/>
<link rel="stylesheet" type="text/css" href="../../../css/font-awesome.min.css"/>
<script src="../../../js/jquery-2.1.1.min.js"></script>
<script src="//maps.googleapis.com/maps/api/js"></script>
<script src="../../../js/jquery.validate.min.js"></script>
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
  <nav>
    <div class="wrapper">
      <figure class="smooth"><a href="http://agriwash.com/en/"><img src="../../../img/agriwash-logo.svg" /></a></figure>
      <ul>
        <li><a href="http://agriwash.com/en/#product" class="smooth">Product</a></li>
        <li><a href="http://agriwash.com/en/#contact" class="smooth">Contact</a></li>
        <li><a href="http://agriwash.com/en/#news" class="smooth">News</a></li>
      </ul>
    </div>
  </nav>
  <div class="container" style="margin-top:48px">
    <div class="wrap">
<?php
$connection = mysql_connect('localhost', 'agriwash', 'E6D2b5Tp');
mysql_select_db('agriwash', $connection);
	
$esc = mysql_real_escape_string($_GET['title']);
$string = str_replace('-', ' ', $esc);
$data = mysql_query('SELECT * FROM news WHERE title = "'.$string.'" LIMIT 1') or die(mysql_error());
while($news = mysql_fetch_array($data)) { ?>
  <div class="item" id="<?php echo $news['id']; ?>">
    <h2><?php echo $news['title']; ?></h2>
    <h4><?php echo substr($news['modified'], 0, 10); ?></h4>
    <figure><img src="../../../uploads/<?php echo $news['image']; ?>" /></figure>
    <div class="content"><p><?php echo $news['content']; ?></p></div>
    <a href="http://agriwash.com/en/news/" class="smooth">Back to news</a>
  </div>
<?php } ?>
    </div>
  </div>
  <footer>
    <div class="wrapper">
      <div class="half">
        <p>T: 000 000 0000</p>
        <p>E: email@wheelwash.com</p>
        <p><figure><img src="../../../img/wheelwash-logo.svg" /></figure></p>
      </div><div class="half">
        <p><b>Help & Support</b></p>
        <p>Delivery Information</p>
        <p>Returns Policy</p>
        <p>FAQs</p>
        <p>Security & Privacy</p>
        <p>Cookie Policy</p>
        <p>Contact Us</p>
      </div>
    </div>
  </footer>
</body>
</html>
