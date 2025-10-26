<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    $record = json_decode($_POST['record'], true); 

    if (isset($record['Total'], $record['Discount'], $record['Discounted'])) {
        // Format Total and Discounted to two decimal places
        $Total = number_format((float)$record['Total'], 2, '.', ''); 
        $Discount = $conn->real_escape_string(trim($record['Discount']));
        $Discounted = number_format((float)$record['Discounted'], 2, '.', ''); 

        // Use Total as the unique identifier for the record
        $checkSql = "SELECT * FROM transaction WHERE Total='$Total'";
        $result = $conn->query($checkSql);

        if ($result->num_rows > 0) {
            $updateSql = "UPDATE transaction SET Discount='$Discount', Discounted='$Discounted' WHERE Total='$Total'";
            if ($conn->query($updateSql) === TRUE) {
                echo "Record Updated successfully";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            $insertSql = "INSERT INTO transaction (Total, Discount, Discounted) VALUES ('$Total', '$Discount', '$Discounted')";
            if ($conn->query($insertSql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    } else {
        echo "Invalid data received.";
    }
}

$conn->close();
?>