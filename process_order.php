<?php
session_start();
include 'components/connect.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['order_data'])) {
    header('Location: checkout.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$data = $_SESSION['order_data'];
unset($_SESSION['order_data']); // remove data after use

$name = filter_var($data['name'], FILTER_SANITIZE_STRING);
$number = filter_var($data['number'], FILTER_SANITIZE_STRING);
$email = filter_var($data['email'], FILTER_SANITIZE_STRING);
$method = filter_var($data['method'], FILTER_SANITIZE_STRING);

// Build address first
$address = 'flat no. ' . $data['flat'] . ', ' . $data['street'] . ', ' . $data['city'] . ', ' . $data['state'] . ', ' . $data['country'] . ' - ' . $data['pin_code'];
$address = filter_var($address, FILTER_SANITIZE_STRING);

// Calculate cart and grand total
$grand_total = 0;
$cart_items = [];

$select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
$select_cart->execute([$user_id]);

if ($select_cart->rowCount() > 0) {
    while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
        $cart_items[] = $fetch_cart['name'] . ' (' . $fetch_cart['price'] . ' x ' . $fetch_cart['quantity'] . ')';
        $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
    }

    $total_products = implode(', ', $cart_items);
    $transaction_uuid = uniqid("txn_", true);
    $product_code = "EPAYTEST";
    $signed_fields = "total_amount,transaction_uuid,product_code";
    $message1 = "total_amount={$grand_total},transaction_uuid={$transaction_uuid},product_code={$product_code}";
    $secret_key = "8gBm/:&EnhH.1/q";
    $signature = base64_encode(hash_hmac('sha256', $message1, $secret_key, true));

    if ($method === 'esewa') {
        $_SESSION['epay'] = [
            'grand_total' => $grand_total,
            'transaction_uuid' => $transaction_uuid,
            'signature' => $signature
        ];
        header("Location: checkout_success.php");
        exit;
    } else if ($method === 'cash on delivery') {
        $insert_order = $conn->prepare("INSERT INTO `orders` (user_id, name, number, email, method, address, total_products, total_price, transaction_id, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $grand_total, $transaction_uuid, 'cash on delivery']);

        $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
        $delete_cart->execute([$user_id]);

        $_SESSION['message'] = "Your order has been placed successfully with Cash on Delivery.";
        header("Location: orders.php");
        exit;
    }
} else {
    $_SESSION['message'] = "Your cart is empty.";
    header("Location: checkout.php");
    exit;
}
