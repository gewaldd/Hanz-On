<?php
session_start();
include 'db.php'; // your database connection file

if (isset($_POST['add_to_wishlist'])) {
    if (!isset($_SESSION['user_id'])) {
        // If not logged in, redirect to login
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    // Prevent duplicate wishlist entries
    $check = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ? AND product_name = ?");
    $check->bind_param("is", $user_id, $product_name);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO wishlist (user_id, product_name, product_price, product_image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isds", $user_id, $product_name, $product_price, $product_image);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: " . $_SERVER['HTTP_REFERER']); // send back to product page
    exit();
}
?>
