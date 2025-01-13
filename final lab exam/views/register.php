<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <form action="../controller/registerCheck.php" method="POST" onsubmit="return validateForm()">
        <table>
            <tr>
                <td>Author Name:</td>
                <td><input type="text" name="author_name" id="name" ></td>
            </tr>
            <tr>
                <td>Contact No:</td>
                <td><input type="text" name="contact_no" id="contact_no" ></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" id="username" ></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" id="password" ></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Register</button>
                </td>
            </tr>
        </table>
    </form>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var contactNo = document.getElementById("contact_no").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (name == "" || contactNo == "" || username == "" || password == "") {
                alert("All fields must be filled out.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
