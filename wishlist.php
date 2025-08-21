<?php
$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM wishlist WHERE user_id = $user_id");

echo "<h3>Your Wishlist</h3>";
while ($row = $result->fetch_assoc()) {
    echo "<div>{$row['product_name']} - {$row['product_price']}$</div>";
}
?>
