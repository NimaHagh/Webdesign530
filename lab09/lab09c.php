<?php
$host = "localhost";
$user = "nhaghdou";
$pass = "2CvBQzOn";
$db = "nhaghdou";

$conn = new mysqli($host, $user, $pass, $db);

$sql = "SELECT subject, location, date_taken, picture_url FROM photos WHERE location LIKE '%Ontario%'";
$res = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ontario Photos</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 18px;
        }
        .table {
            margin-top: 20px;
            width: 100%;
            border: 2px solid purple;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 2px solid purple;
            padding: 5px;
        }
        .table img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Ontario Photos</h2>
    <?php
    if ($res->num_rows > 0) {
        echo "<table class='table'>";
        echo "<tr><th>Subject</th><th>Location</th><th>Date</th><th>Photo</th></tr>";
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['date_taken'] . "</td>";
            echo "<td><img src='" . $row['picture_url'] . "' alt='Photo'></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No photos found for Ontario.</p>";
    }
    $conn->close();
    ?>
</body>
</html>

