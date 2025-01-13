<?php
session_start();
require_once('../model/authorModel.php');  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (empty($username) || empty($password)) {
        echo "Username and Password are required.";
    } else {
        if (adminLogin($username, $password)) {
            $_SESSION['username'] = $username;
            header('Location: ../view/adminDashboard.php');
            exit();
        } else {
            echo "Invalid Username or Password.";
        }
    }
}
?>
