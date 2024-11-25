<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Database connection details
$host = "localhost";
$username = "nhaghdou";
$password = "2CvBQzOn";
$database = "nhaghdou";

// Connect to MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Something wrong with the SQL connection: " . $conn->connect_error);
}

// SQL query to insert records into the 'photos' table
$sql = "
INSERT INTO photos (subject, location, date_taken, picture_url) VALUES
('Dipper and Mable Exploring', 'Gravity Falls Village', '2023-07-12', 'images/dipper.jpg'),
('Mabel and Pig', 'Gravity Falls Village', '2023-07-12', 'images/mabel.jpg'),
('Grunkle Stan', 'Gravity Falls Village', '2023-07-12', 'images/stan.jpg'),
('Mable and dipper in the room', 'Gravity Falls Village', '2023-08-18', 'images/mdroom.jpg'),
('Dragon in the Village', 'Gravity Falls Village', '2023-04-10', 'images/dragon.jpg'),
('Mabel and Dipper being PB&J', 'Gravity Falls Village', '2023-09-05', 'images/pbj.jpg'),
('Supermarket', 'Gravity Falls Town downtown', '2023-03-25', 'images/supermarket.jpg'),
('Scared Guy', 'Gravity Falls Junkyard', '2023-02-14', 'images/theend.jpg'),
('The Gang going on trick or treating', 'Gravity Falls Village', '2023-01-08', 'images/gang.jpg'),
('The Gravity Falls team', 'Toronto', '2023-11-11', 'images/creator.jpg');
";

if ($conn->query($sql) === TRUE) {
    echo "Code is working as inspected and the table has been made!!.";
} else {
    echo "Error inserting records: " . $conn->error;
}

// Close connection
$conn->close();
?>

