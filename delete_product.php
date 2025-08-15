<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['product'] ?? '';

    $file = 'products.json';
    $products = json_decode(file_get_contents($file), true);

    if (isset($products[$productName])) {
        unset($products[$productName]);
        file_put_contents($file, json_encode($products, JSON_PRETTY_PRINT));
        echo "Deleted";
    } else {
        echo "Product not found";
    }
}
?>
