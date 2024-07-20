<?php
  require 'config.php';
  require 'database.php';
  $g_title = BLOG_NAME . ' - Index';
  $g_page = 'index';
  require 'header.php';
  require 'menu.php';
  
  $posts = find_all_blogs(BLOG_INDEX_NUM_POSTS);
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
								<td width="294"><input name="myusername" type="text" id="myusername"></td>
							</tr>
							<tr>
								<td width="78">Email</td>
								<td width="6">:</td>
								<td width="294"><input name="myemail" type="email" id="myemail"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td>:</td>
								<td><input name="mypassword" type="password" id="mypassword"></td>
							</tr>
							<!-- <tr>
								<td>Verify Password</td>
								<td>:</td>
								<td><input name="mypassword-verify" type="password" id="mypassword-verify"></td>
							</tr> -->
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

<?php require 'footer.php';?>