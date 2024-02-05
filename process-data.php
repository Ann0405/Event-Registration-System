<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
     body {
    font-family: Arial, sans-serif;
    text-align: center;
    padding: 20px;
    background-color: #f4f4f4;
    margin: 0;
}

.container {
    max-width: 800px;
    margin: auto;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 8px;
}

.success-message {
    font-size: 24px;
    color: #4CAF50;
    margin-bottom: 20px;
}

.go-back-link,
.logout-button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}

.go-back-link:hover,
.logout-button:hover {
    background-color: #45a049;
}

.go-back-link {
    margin-right: 10px;
}

/* Responsive styling */
@media (max-width: 600px) {
    .container {
        padding: 10px;
    }

    .go-back-link,
    .logout-button {
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }
}

    </style>
</head>
<body>
    <div class="success-message">
        <br>
        <br>
        <br>
        Information added successfully.
    </div>
    <a href="event.php" class="go-back-link">Another Submission</a>
    <a href="logout.php" class="logout-button">Logout</a>
</body>
</html>


<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eventregistration";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $event = $_POST['event'];

    // SQL query to insert data into the signedup table
    $result = mysqli_query($conn, "INSERT INTO signedup (name, email, phone, address, event) VALUES ('$name', '$email', '$phone', '$address', '$event')");

    // Check if the query was successful
    if ($result) {
        echo "";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
