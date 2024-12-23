<?php
require_once('../model/user.php');

$username = trim($_POST['username']);

if (isset($_POST['submit'])) {
    if (delete($username)) {
        header("location: ../view/card.html");
    }
}

header("location: ../view/card.html");

?>