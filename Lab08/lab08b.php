<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nima - Lab08 Part B</title>
</head>

<body>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $x = isset($_POST['rows']) ? intval($_POST['rows']) : 0;
        $y = isset($_POST['columns']) ? intval($_POST['columns']) : 0;

        if ($x >= 3 && $x <= 12 && $y >= 3 && $y <= 12) {
            echo "<h2>Multiplication Table ($x x $y)</h2>";
            echo "<table border='1'>";

            echo "<tr><td></td>";
            for ($c = 1; $c <= $y; $c++) {
                echo "<td>$c</td>";
            }
            echo "</tr>";

            for ($r = 1; $r <= $x; $r++) {
                echo "<tr><td>$r</td>";
                for ($c = 1; $c <= $y; $c++) {
                    echo "<td>" . ($r * $c) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

            echo "<br><a href='lab08b.php'><button>Back</button></a>";
        } else {
            echo "<a href='problem2.php'><button>Return</button></a>";
        }
    } else {
        ?>
        <h2>Enter 2 Numbers (3-12) for a Multiplication Table</h2>
        <form action="" method="POST">
            <label>Rows:</label>
            <input type="number" name="rows" min="3" max="12" required>
            <br><br>
            <label>Columns:</label>
            <input type="number" name="columns" min="3" max="12" required>
            <br><br>
            <button type="submit">Generate</button>
        </form>
        <?php
    }
    ?>

    <a href="lab08a.php"><button>Main</button></a>

</body>

</html>