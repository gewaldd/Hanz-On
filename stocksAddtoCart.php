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

// Handle POST request to update or insert stock data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Name']) && isset($_POST['Stocks'])) {
    $Name = $conn->real_escape_string(trim($_POST['Name']));  
    $Stocks = intval($_POST['Stocks']);  // Ensure stocks is an integer

    // Check if the product already exists in the database
    $checkSql = "SELECT * FROM admin WHERE Name='$Name'";
    $result = $conn->query($checkSql);

    if ($result && $result->num_rows > 0) {
        // If the product exists, update its stock
        $updateSql = "UPDATE admin SET Stock=$Stocks WHERE Name='$Name'";
        if ($conn->query($updateSql) === TRUE) {
            echo "Stock updated successfully for $Name.";
        } else {
            echo "Error updating stock for $Name: " . $conn->error;
        }
    } else {
        // If the product doesn't exist, insert it
        $insertSql = "INSERT INTO admin (Name, Stock) VALUES ('$Name', $Stocks)";
        if ($conn->query($insertSql) === TRUE) {
            echo "New product ($Name) added successfully with stock: $Stocks.";
        } else {
            echo "Error adding product: " . $conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Handle GET requests to fetch stock data
    $sql = "SELECT Name, Stock FROM admin";
    $result = $conn->query($sql);
    $products = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[$row['Name']] = $row['Stock'];
        }
    }
    header('Content-Type: application/json');
    echo json_encode($products);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productName'])) {
    $productName = $conn->real_escape_string($_POST['productName']);
    
    // Get current stock
    $sql = "SELECT Stock FROM admin WHERE Name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productName);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['stock' => $row['Stock']]);
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
    
    $stmt->close();
}
$conn->close();
?>
