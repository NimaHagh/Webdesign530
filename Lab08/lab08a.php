<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nima - Lab08 Part A</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php

    date_default_timezone_set('America/Toronto');
    $hour = date('G');
    $currentTime = date("h:i:sa");
    $greeting = "";
    $backgroundImage = "";


    if ($hour >= 7 && $hour < 12) {
        $greeting = "Hello and Good morning";
        $backgroundImage = "morning.jpg";
    } elseif ($hour >= 12 && $hour < 17) {
        $greeting = "Hello and Good afternoon";
        $backgroundImage = "afternoon.jpg";
    } elseif ($hour >= 17 && $hour < 22) {
        $greeting = "Hello and Good evening";
        $backgroundImage = "evening.jpg";
    } else {
        $greeting = "Hello and Good night";
        $backgroundImage = "night.jpg";
    }
    ?>

    <div id="greeting-container" style="background-image: url('<?php echo $backgroundImage; ?>');">
        <div class="greeting-text"><?php echo $greeting; ?></div>
        <a href="lab08b.php"><br><br><br>
            <button>Click for Problem 2</button>
        </a>
        <a href="lab08c.php"><br><br><br>
            <button>Click for Problem 3</button>
        </a>
    </div>

</body>

</html>