<?php
require_once('../model/user.php');

if(isset($_POST['submit']))
{
    $allUsers = getaluser();
foreach ($allUsers as $user) {
    echo "Username: " . $user['name'] . ", Password: " . $user['password'] . "<br>";
}
}

?>