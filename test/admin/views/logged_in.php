<div class="logo"><img src="../../img/logo_.png" /></div>
<div class="nav">Username: <b><?php echo $_SESSION['user_name']; ?></b></div>
<a class="home" href="http://agriwash.com/en/"><i class="fa fa-home"></i></a> <a class="logout" href="http://agriwash.com/en/admin/index.php?logout=true">Logout</a>
<div class="add">
  <form class="add-form" enctype="multipart/form-data">
    <h3>Title</h3>
    <input type="text" class="title" name="title" id="title" value="Enter the title here..." />
    <h3>Content</h3>
    <textarea name="content" class="content" id="content">Enter the content here...</textarea>
    <h3>Upload an image</h3>
    <input type="file" class="image" name="image" /><br />
    <a class="imagery" href="#" target="_blank"></a>
    <input type="button" value="Cancel" class="cancel" />
    <input type="submit" value="Save" class="save" />
  </form>
  <div class="subtract">
    <img src="../img/loading.gif" />
  </div>
</div>
<style>.container .wrapper{text-align:left}</style>
<?php include("allnews.php");
while($news = mysql_fetch_array($data)) { ?>
<div class="item smooth" id="<?php echo $news['id']; ?>">
  <figure><img src="../../uploads/<?php echo $news['image']; ?>" /></figure>
  <div class="alltext">
    <h2><?php echo $news['title']; ?></h2>
    <h4><?php echo substr($news['modified'], 0, 10); ?></h4>
  </div>
  <div class="content">
    <p><?php echo substr($news['content'], 0, 165) . '...'; ?></p>
  </div>
  <a href="http://agriwash.com/en/show/<?php echo str_replace(' ', '-', $news['title']); ?>" class="linky" target="_blank"><i class="fa fa-external-link-square"></i></a><a class="delete" href="#" id="<?php echo $news['id']; ?>"><i class="fa fa-close"></i></a>
  <div class="line"></div>
</div>
<?php } ?>
