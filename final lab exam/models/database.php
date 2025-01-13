<?php

function getConnection()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'blog_system');
    if (!$conn) {
        die("Connection Failed!");
    }
    return $conn;
}
