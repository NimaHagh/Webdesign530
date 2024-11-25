<?php
// Database connection details
$my_host = "localhost";
$my_user = "nhaghdou";
$my_pass = "2CvBQzOn";
$my_db = "nhaghdou";

// Connect to MySQL database
$my_conn = new mysqli($my_host, $my_user, $my_pass, $my_db);

// Check connection
if ($my_conn->connect_error) {
    die("Connection failed: " . $my_conn->connect_error);
}

// Query to get all data from the table
$my_query = "SELECT picture_number, subject, location, date_taken, picture_url
             FROM photos
             ORDER BY date_taken DESC";

$my_result = $my_conn->query($my_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab09 - Problem 2</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 18px;
        }
        table {
            margin-top: 22px;
            width: 100%;
            border: 5px solid purple;
            border-collapse: collapse;
        }
        th, td {
            border: 5px solid purple;
            padding: 5px;
        }
        tr:nth-child(even) {
            background-color: lavender;
        }
    </style>
</head>
<body>
    <h2>Lab 09 - Problem 2</h2>
    <?php
    if ($my_result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Numbering</th><th>Title of the Pic</th><th>Location</th><th>Date Taken</th><th>Image/URL</th></tr>";
        while ($row = $my_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['picture_number'] . "</td>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['date_taken'] . "</td>";
            echo "<td><img src='" . $row['picture_url'] . "' alt='Photo' style='max-width: 100px; height: auto;'></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No photos found in the database.</p>";
    }

    // Close database connection
    $my_conn->close();
    ?>
</body>
</html>

