<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="logincss.css">
</head>
<style>
    body {
    color: #000;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    font-family: Arial, sans-serif;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}
</style>
<body>
<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'eventregistration');

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT id, username, password FROM users WHERE username = ?";
$stmt = $db->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $dbUsername, $dbPassword);
$stmt->fetch();

if ($stmt->num_rows > 0 && password_verify($password, $dbPassword)) {
    $_SESSION['user_id'] = $id;
    $_SESSION['username'] = $username;
    header("Location: event.php");
    exit;
} else {
    if ($stmt->num_rows === 0) {
        echo "<div class='container success-message'>";
        echo "Login failed. User does not exist. <br><a href='login.php' class='registration-link'>Login here</a>";
        echo "</div>";
    } else {
        echo "<div class='container success-message'>";
        echo "Login failed. Incorrect password. <br><a href='login.php' class='registration-link'>Login here</a>";
        echo "</div>";
    }
}

$stmt->close();
$db->close();
?>
</body>
</html>

