<?php
session_start();
require_once('../model/authorModel.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $status = deleteAuthor($id);
    if ($status) {
        echo "User Deleted Successfully!";
        header('location: ../view/adminDashboard.php'); 
        exit();
    } else {
        echo "Failed to Delete User.";
    }
} else {
    echo "Invalid Request!";
    header('location: ../view/adminDashboard.php');
}
?>
