<?php
session_start();
require_once('../model/authorModel.php');

// Check if the user is logged in as admin
if (!isset($_SESSION['username'])) {
    header('Location: ../view/login.php');
    exit();
}

// Check if ID is provided via POST
if (isset($_POST['id'])) {
    $id = $_POST['id']; // Get the author ID from the POST data

    // Collect the data from the POST request
    $name = trim($_POST['name']);
    $contact_no = trim($_POST['contact_no']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate data (though this can also be handled by JavaScript)
    if ($name == "" || $contact_no == "" || $username == "" || $password == "") {
        echo "All fields are required.";
        exit();
    }

    // Update the author in the database
    if (updateAuthor($id, $name, $contact_no, $username, $password)) {
        // Redirect back to the admin dashboard if successful
        header('Location: ../view/adminDashboard.php');
        exit();
    } else {
        echo "Error updating author.";
    }
} else {
    echo "No author ID provided.";
    exit();
}
?>
