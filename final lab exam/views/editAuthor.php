<?php
session_start();
require_once('../model/authorModel.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $author = getAuthorById($id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
    <script>
        function validateForm() {
            var name = document.forms["editAuthorForm"]["name"].value;
            var contact_no = document.forms["editAuthorForm"]["contact_no"].value;
            var username = document.forms["editAuthorForm"]["username"].value;
            var password = document.forms["editAuthorForm"]["password"].value;

            if (name == "" || contact_no == "" || username == "" || password == "") {
                alert("All fields must be filled out.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Edit Author</h1>

    <form name="editAuthorForm" action="../controller/updateAuthorCheck.php" method="POST" onsubmit="return validateForm()">
        <!-- Hidden field for author ID -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($author['id']); ?>">
        
        <table>
            <tr>
                <td>Author Name:</td>
                <td><input type="text" name="name" value="<?php echo htmlspecialchars($author['author_name']); ?>"></td>
            </tr>
            <tr>
                <td>Contact No:</td>
                <td><input type="text" name="contact_no" value="<?php echo htmlspecialchars($author['contact_no']); ?>"></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?php echo htmlspecialchars($author['username']); ?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" value="<?php echo htmlspecialchars($author['password']); ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Update Author</button>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
