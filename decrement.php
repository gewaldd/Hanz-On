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
    $rer = $_POST['rer'];
    list($name, $price) = explode(',', $rer);

    // Check if the record exists and has a quantity greater than 0
    $checkSql = "SELECT Quantity FROM table1 WHERE Name='$name'";
    $checkSql2323 = "SELECT Price FROM table1 WHERE Name='$name'";
    $result = $conn->query($checkSql);
    $result2323 =  $conn->query($checkSql2323);

    if ($result->num_rows > 0 || $result2323 ->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['Quantity'] > 0) {
            // If record exists and quantity is greater than 0, decrement the quantity
            $updateSql = "UPDATE table1 SET Quantity = Quantity - 1 WHERE Name='$name'";
            $updateSql2323 = "UPDATE table1 SET Price = Price - $price WHERE Name='$name'";
            if ($conn->query($updateSql) === TRUE) {
                echo "Quantity decremented successfully";
            } else {
                echo "Error: " . $updateSql . "<br>" . $conn->error;
            }

            if ($conn->query($updateSql2323) === TRUE) {
                echo " Price Updated successfully";
            } else {
                echo "Error: " . $updateSql2323 . "<br>" . $conn->error;
            }
        } else {
            echo "Quantity is already 0";
        }
    } else {
        echo "Record not found";
    }

    $conn->close();
}
?>
