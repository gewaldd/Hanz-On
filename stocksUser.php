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

// Fetch stock count for 'Silent Hill' or other products (this could be dynamic based on product name)
$Name = 'Silent Hill';  // You can replace this with dynamic product name based on your need
$checkSql = "SELECT Stock FROM admin WHERE Name = '$Name'";
$result = $conn->query($checkSql);

$stockCount = 0;  // Default value in case product not found
if ($result && $row = $result->fetch_assoc()) {
    $Stocks = $row['Stock'];
}

// Close the connection
$conn->close();
?>
