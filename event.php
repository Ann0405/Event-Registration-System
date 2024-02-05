<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
     <link rel="stylesheet" href="event.css">
    
</head>
<body>
    <h2>Event List</h2>

    <?php
    // Sample data for demonstration
     $events = array(
        array('Art Exhibition', 'Deconstructing Reality', '2023-12-20 15:00:00', 'Mandalagan, Bacolod City'),
        array('Business Networking Mixer', 'Innovation Incubator', '2023-12-21 08:00:00', 'Alijis, Bacolod City'),
        array('Charity Gala', 'Masquerade for Hope', '2023-12-22 20:00:00', 'Bata, Bacolod City'),
        array('Conference', 'Beyond the Horizons', '2023-12-23 12:00:00', 'Taculing, Bacolod City'),
        array('Culinary', 'Taste of Tradition', '2023-12-24 14:00:00', 'Punta Taytay, Bacolod City'),
        array('Film Premiere', 'Red Carpet Glamour', '2023-12-25 18:00:00', 'Villamonte, Bacolod City'),
        array('Literary', 'From Page to Stage', '2023-12-26 09:00:00', 'Tangub, Bacolod City'),
        array('Music Festival', 'The Future of Music', '2023-12-27 20:00:00', 'Montevista, Bacolod City'),
        array( 'Sports', 'Fanatic Frenzy', '2023-12-28 15:00:00', 'Mandalagan, Bacolod City'),
        array('Wedding', 'Vintage Romance', '2023-12-29 14:00:00', 'Punta Taytay, Bacolod City'),
        // Add more events as needed
    );


    echo "<table>";
    echo "<tr><th>Event Name</th><th>Theme</th><th>Date & Time</th><th>Event Location</th><th>Action</th></tr>";

    foreach ($events as $event) {
        echo "<tr>";
        echo "<td>{$event[0]}</td>";
        echo "<td>{$event[1]}</td>";
        echo "<td>{$event[2]}</td>";
        echo "<td>{$event[3]}</td>";
        echo "<td><a class='signup-btn' href='Data.php?event={$event[0]}'>Sign Up</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</body>
</html>
