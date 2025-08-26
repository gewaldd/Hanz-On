<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonFile = 'productsAdd.json';

    // Load existing products
    $products = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];

    // Get form data
    $name = $_POST['name'];
    $price = floatval($_POST['price']);
    $rating = floatval($_POST['rating']);
    $sold = intval($_POST['sold']);
    $stock = intval($_POST['stock']);
    $image = $_FILES['image'];

    // Image handling
    $imageName = basename($image['name']);
    $uploadDir = 'uploads/';
    $uploadPath = $uploadDir . $imageName;

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
        // Save new product
        $products[$name] = [
            'price' => $price,
            'image' => $uploadPath,
            'rating' => $rating,
            'sold' => $sold,
            'stock' => $stock
        ];

        file_put_contents($jsonFile, json_encode($products, JSON_PRETTY_PRINT));

        header('Location: productsAdmin.php'); // Redirect to product page
        exit;
    } else {
        echo "Image upload failed.";
    }
}
?>
