<?php

$h = "localhost";
$u = "nhaghdou";
$p = "2CvBQzOn";
$d = "nhaghdou";

$conn = new mysqli($h, $u, $p, $d);

if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
}

$loc_q = "SELECT DISTINCT location FROM photos";
$loc_res = $conn->query($loc_q);

$yr_q = "SELECT DISTINCT YEAR(date_taken) AS year FROM photos";
$yr_res = $conn->query($yr_q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Photos</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 18px;
        }
        form {
            margin: 20px auto;
            text-align: center;
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
    <h2>Lab 08 Problem 4 - November 2024 </h2>
    <form method="GET" action="">
        <label for="location">sort by the location:</label>
        <select name="location" id="location">
            <option value=""></option>
            <?php
            if ($loc_res->num_rows > 0) {
                while ($r = $loc_res->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($r['location']) . "'>" . htmlspecialchars($r['location']) . "</option>";
                }
            }
            ?>
        </select>

        <label for="year">sort by aa year:</label>
        <select name="year" id="year">
            <option value="">All Years</option>
            <?php
            if ($yr_res->num_rows > 0) {
                while ($r = $yr_res->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($r['year']) . "'>" . htmlspecialchars($r['year']) . "</option>";
                }
            }
            ?>
        </select>

        <button type="submit">Click the button </button>
    </form>

    <?php
    if (isset($_GET['location']) || isset($_GET['year'])) {
        $loc = $_GET['location'];
        $yr = $_GET['year'];

        $q = "SELECT subject, location, date_taken, picture_url FROM photos WHERE 1=1";

        if (!empty($loc)) {
            $q .= " AND location = '" . $conn->real_escape_string($loc) . "'";
        }

        if (!empty($yr)) {
            $q .= " AND YEAR(date_taken) = '" . $conn->real_escape_string($yr) . "'";
        }

        $res = $conn->query($q);

        if ($res->num_rows > 0) {
            echo "<table class='table'>";
            echo "<tr><th>Title</th><th>Location</th><th>Date</th><th>Photo</th></tr>";
            while ($r = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($r['subject']) . "</td>";
                echo "<td>" . htmlspecialchars($r['location']) . "</td>";
                echo "<td>" . htmlspecialchars($r['date_taken']) . "</td>";
                echo "<td><img src='" . htmlspecialchars($r['picture_url']) . "' alt='Photo'></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No photos match your criteria.</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>

