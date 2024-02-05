<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="registerprocess.css">
</head>
<br><br>
<br><br>

<body>
<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'eventregistration');

// Get user input
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insert user data into the database
$query = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param('ss', $username, $password);

if ($stmt->execute()) {
    echo "<div class='container success-message'>";
    echo "<h2>✅<br> You are Already Registered!</h2> <a href='login.php' class='registration-link'>Login here</a>";
    echo "</div>";
} else {
    echo "<div class='container failure-message'>";
    echo "<br></br><br></br>Registration failed.";
    echo "</div>";
}

$stmt->close();
$db->close();
?>
</body>
</html>