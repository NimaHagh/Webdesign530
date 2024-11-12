<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nima - Lab08 Part C</title>
    <style>
        .picked-img {
            position: absolute;
            top: 10px;
            right: 10px;
            opacity: 0.6;
            max-width: 100px;
        }

        .img-name {
            font-size: 18px;
        }

        .gallery {
            display: flex;
            margin-bottom: 10px;
        }

        .gallery img {
            width: 80px;
        }
    </style>
</head>

<body>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fav_pic'])) {
        $fav_pic = $_POST['fav_pic'];
        setcookie('fav_img', $fav_pic, time() + 86400);
    }


    if (isset($_COOKIE['fav_img'])) {
        $current_img = $_COOKIE['fav_img'];
        echo "<div class='img-name'>Current: " . htmlspecialchars($current_img) . "</div>";
        echo "<img src='" . htmlspecialchars($current_img) . "' class='picked-img' alt='Picked Image'>";
    } else {
        echo "<p>Nima - Lab08 - Part C</p>";
    }
    ?>


    <div class="gallery">
        <img src="turkey.jpg" alt="Turkey">
        <img src="granny.gif" alt="Granny">
        <img src="feast.gif" alt="Feast">
        <img src="family.gif" alt="Family">
        <img src="pie.gif" alt="Pie">
    </div>

    <div>
        <h3>Pick One:</h3>
        <form action="" method="POST">
            <label>
                <input type="radio" name="fav_pic" value="turkey.jpg" required> Turkey
            </label><br>
            <label>
                <input type="radio" name="fav_pic" value="granny.gif"> Granny
            </label><br>
            <label>
                <input type="radio" name="fav_pic" value="feast.gif"> Feast
            </label><br>
            <label>
                <input type="radio" name="fav_pic" value="family.gif"> Family
            </label><br>
            <label>
                <input type="radio" name="fav_pic" value="pie.gif"> Pie
            </label><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <a href="lab08a.php"><button>Go Back</button></a>

</body>

</html>