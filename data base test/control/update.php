<?php
require_once('../model/user.php');

$username = trim($_POST['username']);
$password= trim($_POST['password']);
if (isset($_POST['submit'])) {
    if (update($username,$password)) {
        header("location: ../view/card.html");
    }
}

header("location: ../view/card.html");
?>