<?php
session_start();
require_once('../model/authorModel.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['author_name']);
    $contact_no = trim($_POST['contact_no']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($contact_no) || empty($username) || empty($password)) {
        echo "All fields must be filled out.";
    } 
    else 
    {
        if (addAuthor($name, $contact_no, $username, $password)) {
            header('Location: ../view/login.php');
            exit();
        } else {
            echo "Error occurred while registering. Please try again.";
        }
    }
}
?>
