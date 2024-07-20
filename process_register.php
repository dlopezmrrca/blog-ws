<html>
	<head>
		<title>Main Register Page</title>
	</head>
	<body>

		<?php

		ob_start();
		$host="localhost"; // Host name
		$username="bloguser"; // Mysql username
		$password="password"; // Mysql password
		$db_name="blog"; // Database name
		$tbl_name="members"; // Table name

		$mysqli = new mysqli($host, $username, $password, $db_name);

		/* check connection */
		if ($mysqli->connect_errno) {
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}
		$myusername = filter_input(INPUT_POST, 'myusername', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$myemail= filter_input(INPUT_POST, 'myemail', FILTER_VALIDATE_EMAIL);
		$mypassword=$_POST['mypassword'];

		// To protect MySQL injection (more detail about MySQL injection)
		$cleanusername = $myusername;
		$cleanemail = $myemail;
		$cleanpassword = $mypassword;

		// salting adds uniqueness to each entry.
		$salt=uniqid() ;
		$salted_password=$salt.$cleanpassword;
		$encrypted_password = hash("sha512", $salted_password); 

		$sql="insert into $tbl_name (myusername,myemail,mypassword,salt) values ('$cleanusername','$cleanemail','$encrypted_password','$salt')";
		if (!$mysqli->query($sql)) {
			echo "INSERT failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else
		{
			// echo "Registered";
			header ("Location: login.php");
		}
		printf("SQL statement is $sql");
		ob_end_flush();
		?>




	</body>
</html>
