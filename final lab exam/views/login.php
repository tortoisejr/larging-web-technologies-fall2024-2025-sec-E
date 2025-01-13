<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($_GET['error']) && !empty($_GET['error'])): ?>
        <p><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>

    <form action="../controller/loginCheck.php" method="POST" onsubmit="return validateForm()">
        <table>
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
                    <button type="submit">Login</button>
                </td>
            </tr>
        </table>
    </form>
    <a href="../view/register.php"><button>Register</button></a>
    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            
            if (username == "" || password == "") {
                alert("Username and Password are required.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
