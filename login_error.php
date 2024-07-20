<?php
  require 'config.php';
  require 'database.php';
  $g_title = BLOG_NAME . ' - Index';
  $g_page = 'login';
  require 'header.php';
  require 'menu.php';
  
  $posts = find_all_blogs(BLOG_INDEX_NUM_POSTS);
  
?>
<div id="all_blogs">

<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 

if(isset($_SESSION['myusername'])){
	header("location:index.php");
}

?>

<div class="mymargin">
<?php
echo "Wrong Username or Password";
?>
</div>




</div>
<?php
  require 'footer.php';
?>