<?php
// payment_success.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - HanzOn Airsoft</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container text-center py-5">
        <div class="card shadow mx-auto" style="max-width: 500px;">
            <div class="card-body py-5">
                <h1 class="text-success">✅</h1>
                <h2>Thank You For Your Purchase!</h2>
                <p class="lead">Your payment was successful and your order is confirmed.</p>
                <p>A confirmation email has been sent to you.</p>
                <hr>
                <p class="text-muted">Order ID: <?php echo htmlspecialchars($_GET['session_id'] ?? 'N/A'); ?></p>
                <a href="productsAirsoftUnits.php" class="btn btn-warning">Continue Shopping</a>
            </div>
        </div>
    </div>
</body>
</html>