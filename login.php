<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

      <link rel="stylesheet" href="logincss.css">

</head>

<body>
    <div class="container">
        <h2>Login</h2>
<form action="login_process.php" method="post">
            <label for="username">🚻Username:</label>
            <input type="text" name="username" required><br><br>
            <label for="password">🔒Password:</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Login">
            <input type="submit" value="admin" formaction="admindashboard.php">
            <p class="registration-link">Doesn't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>
</body>

</html>
