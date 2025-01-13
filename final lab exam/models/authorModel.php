<?php

require_once('../model/database.php');

function adminLogin($username, $password)
{
    $conn = getConnection();
    // Prepare SQL query to select the admin by username
    $sql = "SELECT * FROM admins WHERE username='{$username}' AND password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return true;
    }
    return false;
}

function getAuthorById($id)
{
    $conn = getConnection();
    $sql = "SELECT * FROM authors WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}


function getAuthor($username)
{
    $conn = getConnection();
    $sql = "SELECT * FROM authors WHERE username='{$username}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}

function getAllAuthors()
{
    $conn = getConnection();
    $sql = "SELECT * FROM authors";
    $result = mysqli_query($conn, $sql);

    $authors = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $authors[] = $row;
    }
    return $authors;
}

function addAuthor($author_name, $contact_no, $username, $password)
{
    $conn = getConnection();
    $sql = "INSERT INTO authors (author_name, contact_no, username, password) 
            VALUES ('{$author_name}', '{$contact_no}', '{$username}', '{$password}')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        error_log("MySQL Error: " . mysqli_error($conn));
        return false;
    }
}

function deleteAuthor($id)
{
    $conn = getConnection();
    $sql = "DELETE FROM authors WHERE id='{$id}'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function updateAuthor($id, $author_name, $contact_no, $username, $password)
{
    $conn = getConnection();
    $sql = "UPDATE authors SET author_name='{$author_name}', contact_no='{$contact_no}', username='{$username}', password='{$password}' WHERE id='{$id}'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        error_log("MySQL Error: " . mysqli_error($conn));
        return false;
    }
}


function searchAuthors($keyword)
{
    $conn = getConnection();
    $sql = "SELECT * FROM authors WHERE author_name LIKE '%$keyword%' OR username LIKE '%$keyword%'";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>

