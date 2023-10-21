<?php
// Start a session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check the username and password (you should use a more secure authentication method)
    $username = "admin";
    $password = "admin";

    if ($_POST["username"] == $username && $_POST["password"] == $password) {
        $_SESSION["user"] = $username;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <form method="post">
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
    <?php if (isset($error)) { echo $error; } ?>
</body>
</html>
