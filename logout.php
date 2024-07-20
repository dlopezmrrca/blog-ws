<?php
  require 'config.php';
  require 'database.php';
  $g_title = BLOG_NAME . ' - Index';
  $g_page = 'index';
  require 'header.php';
  
  $posts = find_all_blogs(BLOG_INDEX_NUM_POSTS);
  
?>
<div id="all_blogs">

<?php 
// Put this code in first line of web page. 
session_start();
session_unset();
session_destroy();

header("location:login.php");
?>



</div>
<?php
  require 'footer.php';
?>