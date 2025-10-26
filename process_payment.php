<?php
// process_payment.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Make sure you run: composer require stripe/stripe-php
require_once 'stripe-php/init.php';
\Stripe\Stripe::setApiKey('sk_test_51RzJQXGkJGCrgc8DHR1yQtuLl5uZRB3CUOrEL7b71c1aQk0Kd9yMQjYngACNuEbnFS1iQ2SMkxGd22Pxr8BKYSKT00dYSjbC5d'); // REPLACE ME!

$input = json_decode(file_get_contents('php://input'), true);
header('Content-Type: application/json');

try {
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => intval($input['cart']['total'] * 100), // Convert dollars to cents
        'currency' => 'usd',
        'payment_method' => $input['payment_method_id'],
        'confirmation_method' => 'manual',
        'confirm' => true,
        'description' => 'Order from HanzOn Airsoft',
        'receipt_email' => $input['customer_email'],
        'metadata' => [
            'customer_name' => $input['customer_name'],
            'customer_email' => $input['customer_email'],
        ],
    ]);

    if ($paymentIntent->status == 'requires_action') {
        echo json_encode([
            'requires_action' => true,
            'payment_intent_id' => $paymentIntent->id,
            'client_secret' => $paymentIntent->client_secret
        ]);
    } else if ($paymentIntent->status == 'succeeded') {
        // PAYMENT SUCCESS! TODO: Save order to database here.
        echo json_encode([
            'success' => true,
            'payment_intent_id' => $paymentIntent->id
        ]);
    } else {
        throw new Exception('Invalid PaymentIntent status');
    }

} catch (\Stripe\Exception\CardException $e) {
    echo json_encode(['error' => $e->getError()->message]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>