<?php
session_start();
require_once('../model/user.php');

$username = trim($_POST['username']);
$password = trim($_POST['password']);

if (isset($_POST['submit'])) {
    if (adduser($username, $password)) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 1;
        header("location: ../view/card.html");
        exit();
    }
}

header("location: ../view/card.html");
exit();
?>
