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
    $record = $_POST['record'];
    list($name, $quantity, $price) = explode(',', $record);

    // Sanitize input to prevent SQL injection
    $name = $conn->real_escape_string($name);


    // Check if the record already exists
    $checkSql = "SELECT * FROM table1 WHERE Name='$name'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        $num = 1;
        $updateSql = "UPDATE table1 SET Quantity = Quantity + $num WHERE Name='$name'";
        if ($conn->query($updateSql) === TRUE) {
            echo "Database updated successfully";
        } else {
            echo "Error updating cart: " . $conn->error;
        }

    } else {
        $insertSql = "INSERT INTO table1 (Name, Quantity, Price) VALUES ('$name', $quantity, $price)";
        if ($conn->query($insertSql) === TRUE) {
            echo "Item added to Database Successfully";
        } else {
            echo "Error adding to cart: " . $insertSql . "<br>" . $conn->error; //Keep this for debugging
        }
    }

    $conn->close();
}
?>