<?php
$h = "localhost";
$u = "nhaghdou";
$p = "2CvBQzOn";
$d = "nhaghdou";

$conn = new mysqli($h, $u, $p, $d);

if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
}

$random_q = "SELECT subject, location, date_taken, picture_url FROM photos ORDER BY RAND() LIMIT 1";
$random_res = $conn->query($random_q);

$count_q = "SELECT COUNT(*) AS total FROM photos";
$count_res = $conn->query($count_q);
$total_photos = 0;
if ($count_res->num_rows > 0) {
    $count_row = $count_res->fetch_assoc();
    $total_photos = $count_row['total'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Christmas Photo</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-color: #f4f4f4;
            color: #006400; 
            text-align: center;
        }
        h2 {
            color: #b22222; 
            margin-top: 20px;
        }
        .photo-container {
            border: 2px solid #b22222; 
            padding: 10px;
            margin: 20px auto;
            display: inline-block;
            background-color: #fff;
        }
        .photo-container img {
            max-width: 200px;
            height: auto;
        }
        .caption {
            color: #b22222; 
            font-weight: bold;
            margin-top: 10px;
        }
        .total-photos {
            color: #006400;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h2>THis is the last problem of Lab08</h2>

    <?php
    if ($random_res->num_rows > 0) {
        $row = $random_res->fetch_assoc();
        echo "<div class='photo-container'>";
        echo "<img src='" . htmlspecialchars($row['picture_url']) . "' alt='" . htmlspecialchars($row['subject']) . "'>";
        echo "<div class='caption'>" . htmlspecialchars($row['subject']) . " - " . htmlspecialchars($row['location']) . "</div>";
        echo "<div>Date Taken: " . htmlspecialchars($row['date_taken']) . "</div>";
        echo "</div>";
    } else {
        echo "<p>No photos available in the database.</p>";
    }
    
    echo "<div class='total-photos'>Total Photos in the Gallery: " . $total_photos . "</div>";

    $conn->close();
    ?>
</body>
</html>

