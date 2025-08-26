<?php
// checkout.php (THE NEW ONE)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session to potentially use session variables later
session_start();

// 1. GET THE CART DATA FROM THE URL
if (!isset($_GET['data'])) {
    die("Error: No cart data provided. Please go back and try again.");
}
$cartData = json_decode(urldecode($_GET['data']), true);
$cartItems = $cartData['items'];
$discount = $cartData['discount'];
$subtotal = $cartData['subtotal'];
$total = $cartData['total'];

// 2. DATABASE CONNECTION (For saving the order later)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - HanzOn Airsoft</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Stripe.js for payment -->
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Open Sans', sans-serif;
        }
        .header {
            background-color: #1e1e2f;
            color: white;
        }
        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin-bottom: 1.5rem;
        }
        .btn-hanzon {
            background-color: #f2c94c;
            color: #000;
            font-weight: bold;
        }
        .btn-hanzon:hover {
            background-color: #e0b93e;
        }
    </style>
</head>
<body>
    <!-- NAVBAR (Copy from your main file or simplify) -->
    <nav class="navbar navbar-expand-lg navbar-dark header">
        <div class="container">
            <a class="navbar-brand" href="#">
                <strong>HanzOn</strong> Checkout
            </a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row">
            <!-- Customer Info & Payment Form -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Customer & Payment Information</h5>
                    </div>
                    <div class="card-body">
                        <form id="payment-form">
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <!-- Full Name -->
                            <div class="form-group">
                                <label for="fullName">Full Name *</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                            </div>
                            <!-- Address -->
                            <div class="form-group">
                                <label for="address">Shipping Address *</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <!-- City -->
                            <div class="form-group">
                                <label for="city">City *</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>

                            <hr class="my-4">

                            <h5>Payment Details</h5>
                            <p class="text-muted">All transactions are secure and encrypted.</p>
                            <!-- Stripe Card Element -->
                            <div class="form-group">
                                <label for="card-element">Credit or Debit Card</label>
                                <div id="card-element" class="form-control">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert" class="invalid-feedback d-block"></div>
                            </div>

                            <button type="submit" class="btn btn-hanzon btn-lg btn-block mt-4" id="submit-button">
                                Pay Now $<?php echo number_format($total, 2); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary Sidebar -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <?php foreach ($cartItems as $item): ?>
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <div>
                                    <strong><?php echo $item['name']; ?></strong>
                                    <br>
                                    <small class="text-muted">Qty: <?php echo $item['quantity']; ?> x $<?php echo number_format($item['price'], 2); ?></small>
                                </div>
                                <span>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                            </div>
                        <?php endforeach; ?>

                        <div class="pt-3">
                            <?php if ($discount > 0): ?>
                                <div class="d-flex justify-content-between">
                                    <span>Subtotal:</span>
                                    <span>$<?php echo number_format($subtotal, 2); ?></span>
                                </div>
                                <div class="d-flex justify-content-between text-success">
                                    <span>Discount (<?php echo $discount; ?>%):</span>
                                    <span>-$<?php echo number_format($subtotal * ($discount / 100), 2); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="d-flex justify-content-between mt-2 font-weight-bold">
                                <span>Total:</span>
                                <span>$<?php echo number_format($total, 2); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize Stripe with your PUBLISHABLE key
        var stripe = Stripe('pk_test_your_publishable_key_here'); // REPLACE THIS!
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        cardElement.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            var submitButton = document.getElementById('submit-button');
            submitButton.disabled = true;
            submitButton.textContent = 'Processing...';

            // Create PaymentMethod using Stripe.js
            stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: document.getElementById('fullName').value,
                    email: document.getElementById('email').value,
                    address: {
                        line1: document.getElementById('address').value,
                        city: document.getElementById('city').value,
                    }
                }
            }).then(function(result) {
                if (result.error) {
                    // Show error to your customer
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    submitButton.disabled = false;
                    submitButton.textContent = 'Pay Now $<?php echo number_format($total, 2); ?>';
                } else {
                    // Send the PaymentMethod ID to your server
                    fetch('process_payment.php', { // We will create this file next
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            payment_method_id: result.paymentMethod.id,
                            customer_email: document.getElementById('email').value,
                            customer_name: document.getElementById('fullName').value,
                            customer_address: document.getElementById('address').value,
                            customer_city: document.getElementById('city').value,
                            cart: <?php echo json_encode($cartData); ?>,
                        })
                    })
                    .then(function(response) { return response.json(); })
                    .then(function(paymentResult) {
                        if (paymentResult.error) {
                            alert('Payment failed: ' + paymentResult.error);
                            submitButton.disabled = false;
                            submitButton.textContent = 'Pay Now $<?php echo number_format($total, 2); ?>';
                        } else if (paymentResult.requires_action) {
                            // Handle required action (3D Secure)
                            stripe.confirmCardPayment(paymentResult.client_secret)
                            .then(function(confirmResult) {
                                if (confirmResult.error) {
                                    alert('Authentication failed: ' + confirmResult.error.message);
                                    submitButton.disabled = false;
                                    submitButton.textContent = 'Pay Now $<?php echo number_format($total, 2); ?>';
                                } else {
                                    // Payment succeeded!
                                    window.location.href = "payment_success.php?session_id=" + paymentResult.payment_intent_id;
                                }
                            });
                        } else {
                            // Payment succeeded without action!
                            window.location.href = "payment_success.php?session_id=" + paymentResult.payment_intent_id;
                        }
                    });
                }
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>