<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventregistration";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the 'event' parameter is set in the URL
if (isset($_GET['event'])) {
    $selectedEvent = $_GET['event'];

    // Fetch sign-up data for the selected event
    $sql = "SELECT * FROM signedup WHERE event = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedEvent);
    $stmt->execute();
    $result = $stmt->get_result();
    $signups = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}

// Edit sign-up entry
if (isset($_POST['edit'])) {
    $editID = $_POST['edit'];
    // Fetch data for the selected sign-up entry
    $sql = "SELECT * FROM signedup WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $editID);
    $stmt->execute();
    $result = $stmt->get_result();
    $editData = $result->fetch_assoc();
    $stmt->close();
}

// Update sign-up entry
if (isset($_POST['update'])) {
    $updateID = $_POST['update'];
    $updatedName = $_POST['name'];
    $updatedEmail = $_POST['email'];
    $updatedPhone = $_POST['phone'];
    $updatedAddress = $_POST['address'];

    $sql = "UPDATE signedup SET name=?, email=?, phone=?, address=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $updatedName, $updatedEmail, $updatedPhone, $updatedAddress, $updateID);
    $stmt->execute();
    $stmt->close();
    header("Location: ".$_SERVER['PHP_SELF']."?event=".$_GET['event']); // Redirect to refresh the page
    exit();
}

// Delete sign-up entry
if (isset($_POST['delete'])) {
    $deleteID = $_POST['delete'];

    $sql = "DELETE FROM signedup WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $deleteID);
    $stmt->execute();
    $stmt->close();
    header("Location: ".$_SERVER['PHP_SELF']."?event=".$_GET['event']); // Redirect to refresh the page
    exit();
}

// Assuming the 'event' parameter is set in the URL
if (isset($_GET['event'])) {
    $selectedEvent = $_GET['event'];

    // Fetch sign-up data for the selected event
    $sql = "SELECT * FROM signedup WHERE event = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedEvent);
    $stmt->execute();
    $result = $stmt->get_result();
    $signups = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-ups</title>

    <!-- Add the jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#search").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#signupsTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>

    <link rel="stylesheet" href="signedupcss.css">
</head>

<body>
    <header>
        <a href="admindashboard.php">Back</a>
        <h1>Sign-ups</h1>
        <a href="logout.php" class="logout-button">Logout</a>
    </header>

    <section>
        <div class="container">
            <!-- Add the search bar -->
            <input type="text" id="search" placeholder="Search...">
            <?php
            if (isset($signups)) {
                echo '<table id="signupsTable">';
                echo '<tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Action</th></tr>';

                foreach ($signups as $signup) {
                    echo '<tr>';
                    echo "<td>{$signup['name']}</td>";
                    echo "<td>{$signup['email']}</td>";
                    echo "<td>{$signup['phone']}</td>";
                    echo "<td>{$signup['address']}</td>";
                    echo '<td>';
                    echo "<form method='post' action='".$_SERVER['PHP_SELF']."?event=".$_GET['event']."' style='display: inline-block; margin-right: 10px;'>";
                    echo "<input type='hidden' name='edit' value='{$signup['id']}'>";
                    echo "<button type='submit' style='background-color: #4CAF50; color: white; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer; transition: background-color 0.3s;'>Edit</button>";
                    echo "</form>";

                    echo "<form method='post' action='".$_SERVER['PHP_SELF']."?event=".$_GET['event']."' style='display: inline-block;'>";
                    echo "<input type='hidden' name='delete' value='{$signup['id']}'>";
                    echo "<button type='submit' style='background-color: #f44336; color: white; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer; transition: background-color 0.3s;' onclick='return confirmDelete()'>Delete</button>";
                    echo "</form>";
                    echo "<script>";
                    echo "function confirmDelete() {";
                    echo "    return confirm('Are you sure you want to delete this item?');";
                    echo "}";
                    echo "</script>";

                    echo "</form>";
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo '<p>No sign-ups available for the selected event.</p>';
            }
            ?>
        </div>
    </section>

    <?php
    // Display the edit form if editID is set
    if (isset($editData)) {
        echo '<section>';
        echo '<div class="container">';
        echo '<div class="edit-container">';
        echo '<h2>Edit Sign-up</h2>';
        echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'?event='.$_GET['event'].'">';
        echo '<input type="hidden" name="update" value="'.$editData['id'].'">';
        echo 'Name: <input type="text" name="name" value="'.$editData['name'].'"><br>';
        echo 'Email: <input type="text" name="email" value="'.$editData['email'].'"><br>';
        echo 'Phone: <input type="text" name="phone" value="'.$editData['phone'].'"><br>';
        echo 'Address: <input type="text" name="address" value="'.$editData['address'].'"><br>';
        echo '<button type="submit">Update</button>';
        echo '</form>';
        echo '</div>';
        echo '</section>';
    }
    ?>
</body>

</html>
