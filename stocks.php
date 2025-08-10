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

// Handle GET requests to fetch stock data
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT Name, Stock FROM admin";
    $result = $conn->query($sql);
    $products = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[$row['Name']] = $row['Stock'];
        }
    } else {
        // Handle the case where the query fails or returns no rows
        echo json_encode([]); // Return an empty array to avoid errors
    }
    header('Content-Type: application/json');
    echo json_encode($products);
}

// Handle POST request to get stock for a specific product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productName'])) {
    $productName = $conn->real_escape_string(trim($_POST['productName']));

    $sql = "SELECT Stock FROM admin WHERE Name = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $productName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode(['stock' => intval($row['Stock'])]);
        } else {
            echo json_encode(['error' => 'Product not found']);
        }
        $stmt->close();
    } else {
        echo json_encode(['error' => 'SQL error: ' . $conn->error]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Name']) && isset($_POST['Stocks'])) {
    $Name = $conn->real_escape_string(trim($_POST['Name']));
    $Stocks = intval($_POST['Stocks']);

    $checkSql = "SELECT * FROM admin WHERE Name = ?";
    $stmt = $conn->prepare($checkSql);
    if ($stmt) {
        $stmt->bind_param("s", $Name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $updateSql = "UPDATE admin SET Stock = ? WHERE Name = ?";
            $updateStmt = $conn->prepare($updateSql);
            if ($updateStmt) {
                $updateStmt->bind_param("is", $Stocks, $Name);
                $updateStmt->execute();
                echo "Stock updated successfully for $Name.";
                $updateStmt->close();
            } else {
                echo "Error preparing UPDATE statement: " . $conn->error;
            }
        } else {
            $insertSql = "INSERT INTO admin (Name, Stock) VALUES (?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            if ($insertStmt) {
                $insertStmt->bind_param("si", $Name, $Stocks);
                $insertStmt->execute();
                echo "New product ($Name) added successfully with stock: $Stocks.";
                $insertStmt->close();
            } else {
                echo "Error preparing INSERT statement: " . $conn->error;
            }
        }
        $stmt->close();
    } else {
        echo "Error preparing SELECT statement: " . $conn->error;
    }
}

// Handle POST request to update stock after checkout
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cartData'])) {
    $cartData = json_decode($_POST['cartData'], true); // Decode the cart data from JSON

    foreach ($cartData as $item) {
        $productName = $conn->real_escape_string(trim($item['name']));
        $quantityPurchased = intval($item['quantity']);

        // Get current stock
        $sql = "SELECT Stock FROM admin WHERE Name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $productName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $newStock = $row['Stock'] - $quantityPurchased;

            if ($newStock >= 0) {
                // Update the stock if it's valid
                $updateSql = "UPDATE admin SET Stock = ? WHERE Name = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("is", $newStock, $productName);
                $updateStmt->execute();
                $updateStmt->close();
            } else {
                echo json_encode(['error' => "Insufficient stock for $productName."]);
                $stmt->close();
                exit;
            }
        } else {
            echo json_encode(['error' => "Product not found: $productName."]);
            $stmt->close();
            exit;
        }

        $stmt->close();
    }

    echo json_encode(['success' => 'Stock updated successfully after checkout']);
}
$conn->close();
?>