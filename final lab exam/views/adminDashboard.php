<?php
session_start();
require_once('../model/authorModel.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$authors = getAllAuthors();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script>
        function ajaxSearch() {
            const keyword = document.getElementById('searchInput').value;
            const xhttp = new XMLHttpRequest();
            
            xhttp.open('GET', '../controller/authorSearch.php?keyword=' + keyword, true);
            xhttp.send();
            
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById('searchResults').innerHTML = this.responseText;
                }
            }
        }
    </script>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <input type="text" id="searchInput" placeholder="Search authors..." oninput="ajaxSearch()" />

    <h2>Authors List</h2>
    <table border="1" id="authorsTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact No</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="searchResults">
            <?php
            foreach ($authors as $author) {
                echo "<tr>
                        <td>" . htmlspecialchars($author['author_name']) . "</td>
                        <td>" . htmlspecialchars($author['contact_no']) . "</td>
                        <td>" . htmlspecialchars($author['username']) . "</td>
                        <td>
                            <a href='../view/editAuthor.php?id=" . $author['id'] . "'>Edit</a> | 
                            <a href='../controller/deleteAuthor.php?id=" . $author['id'] . "' onclick='return confirm(\"Are you sure you want to delete this author?\")'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

    <br>
    <a href="../view/login.php"><button>Logout</button></a>

</body>
</html>
