<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
     <link rel="stylesheet" href="registercss.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register_process.php" method="post">
            <label for="username">🚻Username:</label>
            <input type="text" name="username" required><br><br>
            <label for="password">🔒Password:</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Register">
            <p class="registration-link">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>
