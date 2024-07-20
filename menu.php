<?php
session_start();

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

require_once __DIR__ . '/PhpRbac/autoload.php';

if (!isset($g_page)) {
  $g_page = '';
}
use PhpRbac\Rbac;

$rbac = new Rbac();
$role_id = $rbac->Roles->returnId('admin');

?>
<ul id="menu">
  <li><a href="index.php" <?= ($g_page == 'index') ? "class='active'" : '' ?>>Home</a></li>
  <li><a href="create.php" <?= ($g_page == 'create') ? "class='active'" : '' ?>>New Post</a></li>
  <?php if (!isset($_SESSION['myusername'])): ?>
    <li><a href="login.php" <?= ($g_page == 'login') ? "class='active'" : '' ?>>Login</a></li>
  <?php endif; ?>
  <?php if (isset($_SESSION['myusername'])): ?>
    <li><a href="logout.php" <?= ($g_page == 'logout') ? "class='active'" : '' ?>>Logout</a></li>
  <?php endif; ?>
  <?php if (!isset($_SESSION['myusername'])): ?>
    <li><a href="register.php" <?= ($g_page == 'register') ? "class='active'" : '' ?>>Register</a></li>
  <?php endif; ?>
  <li><a href="privacy.php" <?= ($g_page == 'privacy') ? "class='active'" : '' ?>>Privacy</a></li>
  <?php if (isset($_SESSION['myusername']) && $rbac->Users->hasRole($role_id, $_SESSION['userid'])): ?>
    <li><a href="admin.php" <?= ($g_page == 'admin') ? "class='active'" : '' ?>>Admin</a></li>
  <?php endif; ?>
</ul>
