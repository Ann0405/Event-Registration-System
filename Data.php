<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Form</title>
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="datacss.css">
</head>
<body>
    <a class='return' href='event.php'>Back</a>
    <h2 style="text-align: center;">Data Form</h2>

    <?php
    // Check if the event parameter is set in the URL
    if (isset($_GET['event'])) {
        $selectedEvent = $_GET['event'];

        // Output a form with a pre-filled text field
        echo "<form action='process_data.php' method='post'>";
        echo "<label for='event'>Selected Event:</label>";
        echo "<input type='text' id='event' name='event' value='$selectedEvent' readonly>";
        echo "<br>";
        echo "</form>";
    } else {
        echo "<p>No event selected.</p>";
    }
    ?>
    <div class="container">
    <form action="process-data.php" method="post">
        <!-- Include an input field for the 'event' -->
        <input type="hidden" name="event" value="<?php echo $selectedEvent; ?>">
        
        <label for="name">✍️Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">📧Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone_number">📞Phone:</label>
        <input type="number" id="phone" name="phone" required>

        <label for="address">🏠Address:</label>
        <input type="address" id="address" name="address" required>

        <input type='submit' value='Submit'>
    </form>
</div>
</body>
</html>
