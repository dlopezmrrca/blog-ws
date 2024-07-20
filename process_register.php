<?php
ob_start();
require 'config.php';
require 'database.php';

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

$myusername = filter_input(INPUT_POST, 'myusername', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$myemail = filter_input(INPUT_POST, 'myemail', FILTER_VALIDATE_EMAIL);
$mypassword = $_POST['mypassword'];

$errors = [];

if (!$myusername) {
    $errors['username'] = 'Username is required.';
}

if (!$myemail) {
    $errors['email'] = 'A valid email is required.';
}

// Check if username or email already exists
if ($myusername) {
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM $tbl_name WHERE myusername = ?");
    $stmt->bind_param('s', $myusername);
    $stmt->execute();
    $stmt->bind_result($username_count);
    $stmt->fetch();
    $stmt->close();

    if ($username_count > 0) {
        $errors['username'] = 'Username is already taken.';
    }
}

if ($myemail) {
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM $tbl_name WHERE myemail = ?");
    $stmt->bind_param('s', $myemail);
    $stmt->execute();
    $stmt->bind_result($email_count);
    $stmt->fetch();
    $stmt->close();

    if ($email_count > 0) {
        $errors['email'] = 'Email is already registered.';
    }
}

if (!empty($errors)) {
    $query_params = http_build_query(['errors' => json_encode($errors), 'myusername' => $myusername, 'myemail' => $myemail]);
    header("Location: register.php?" . $query_params);
    exit();
}

// salting adds uniqueness to each entry.
$salt = uniqid();
$salted_password = $salt . $mypassword;
$encrypted_password = hash("sha512", $salted_password);

$stmt = $mysqli->prepare("INSERT INTO $tbl_name (myusername, myemail, mypassword, salt) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssss', $myusername, $myemail, $encrypted_password, $salt);

if (!$stmt->execute()) {
    echo "INSERT failed: (" . $stmt->errno . ") " . $stmt->error;
} else {
    header("Location: login.php");
}
$stmt->close();
ob_end_flush();
?>