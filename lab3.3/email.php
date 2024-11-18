<?php 
if (isset($_GET['submit'])) {
    $username = $_GET['username'];
    if ($username == null) 
    {
        echo "Invalid Email: Empty Field";
    } 
    else 
    {
        echo "Valid Email";
    }
}
?>