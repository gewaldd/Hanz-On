<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rero = $_POST['rero'];
    list($name) = explode(',', $rero);

    // Remove the record from the database
    $deleteSql = "DELETE FROM table1 WHERE Name='$name'";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Record removed successfully";
    } else {
        echo "Error: " . $deleteSql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
