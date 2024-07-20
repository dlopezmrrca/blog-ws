<?php

ob_start();
$host = "localhost"; // Host name
$username = "bloguser"; // Mysql username
$password = "password"; // Mysql password
$db_name = "blog"; // Database name
$tbl_name = "members"; // Table name
$mysqli = new mysqli($host, $username, $password, $db_name);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];
// To protect MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);

$cleanusername = $mysqli->real_escape_string($myusername);

$sql = "SELECT id, mypassword, salt FROM $tbl_name WHERE myusername='$cleanusername' LIMIT 1";
$result = $mysqli->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stored_password = $row['mypassword'];
    $stored_salt = $row['salt'];

    // Combine entered password with stored salt and hash it
    $salted_password = $stored_salt . $mypassword;
    $hashed_password = hash("sha512", $salted_password);

    // If hashed password matches stored password, valid login
    if ($hashed_password == $stored_password) {
        session_start();
        $_SESSION['myusername'] = $cleanusername;
        $_SESSION['userid'] = $row['id'];
        header("location:login_success.php");
    } else {
        header("location:login_error.php");
    }
} else {
    header("location:login_error.php");
}

ob_end_flush();
