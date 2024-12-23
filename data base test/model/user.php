<?php
function getconn()
{
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'test');
    return $conn;
}

function login($username, $password)
{
    $conn = getconn();
    $sql = "SELECT * FROM user WHERE name='{$username}' AND password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) return true;
    else return false;
}

function adduser($username, $password)
{
    $conn = getconn();
    $sql = "INSERT INTO user (name, password) VALUES ('{$username}', '{$password}')";
    if (mysqli_query($conn, $sql))
        return true;
    else
        return false;
}

function delete($username)
{
    $conn=getconn();
    $sql="DELETE from user WHERE name='{$username}'";
    if(mysqli_query($conn,$sql))
        return true;
    else 
        return false;
}

function update($username,$password)
{
    $conn=getconn();
    $sql="UPDATE user set password = '{$password}'  WHERE name='{$username}'";
    if(mysqli_query($conn,$sql))
        return true;
    else 
        return false;
}



function getaluser()
{
    $conn = getconn();
    $sql = "SELECT * FROM user"; // Query to fetch all users
    $result = mysqli_query($conn, $sql);
    $users = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row; // Add each user to the users array
        }
    }

    return $users; // Return the list of users
}
?>
