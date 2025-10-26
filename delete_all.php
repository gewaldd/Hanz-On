<?php
$file = 'products.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Overwrite the file with an empty JSON object to represent no products
    file_put_contents($file, '{}');
    echo "All products have been deleted.";
} else {
    echo "Invalid request.";
}
?>
