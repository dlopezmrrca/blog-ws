<?php
require 'config.php';
require 'database.php';
$g_title = BLOG_NAME . ' - Register';
$g_page = 'register';
require 'header.php';
require 'menu.php';

$myusername = isset($_POST['myusername']) ? htmlspecialchars($_POST['myusername']) : '';
$myemail = isset($_POST['myemail']) ? htmlspecialchars($_POST['myemail']) : '';
$errors = isset($_GET['errors']) ? json_decode(urldecode($_GET['errors']), true) : [];

?>

<div id="all_blogs">
    <table width="300" border="0" cellpadding="0" cellspacing="1">
        <tr>
            <form name="form1" method="post" action="process_register.php">
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1">
                        <tr>
                            <td colspan="3"><strong>Member Register </strong></td>
                        </tr>
                        <tr>
                            <td width="78">Username</td>
                            <td width="6">:</td>
                            <td width="294"><input name="myusername" type="text" id="myusername" value="<?php echo $myusername; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php if(isset($errors['username'])) echo $errors['username']; ?></td>
                        </tr>
                        <tr>
                            <td width="78">Email</td>
                            <td width="6">:</td>
                            <td width="294"><input name="myemail" type="email" id="myemail" value="<?php echo $myemail; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?php if(isset($errors['email'])) echo $errors['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input name="mypassword" type="password" id="mypassword"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="Submit" value="Register"></td>
                        </tr>
                    </table>
                </td>
            </form>
        </tr>
    </table>
</div>

<?php require 'footer.php'; ?>
