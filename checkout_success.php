<?php
session_start();

if (!isset($_SESSION['epay'])) {
    header('Location: checkout.php');
    exit;
}

$epay_url = "https://rc-epay.esewa.com.np/api/epay/main/v2/form";
$grand_total = $_SESSION['epay']['grand_total'];
$transaction_uuid = $_SESSION['epay']['transaction_uuid'];
$signature = $_SESSION['epay']['signature'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Placed</title>
    <link rel="stylesheet" href="css/checkout.css">

    <link rel="stylesheet" href="css/checkout_success.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>

<div class="esewa">
    <div class="order-success">
        <h2>🎉 Your order has been placed!</h2>
        <p>Thank you for shopping with us.</p>
        <p>Please click the button below to complete your payment via <strong>eSewa</strong>.</p>
    </div>
    <?php

    ?>
    <form action="<?= $epay_url; ?>" method="POST">
        <input type="hidden" name="amount" value="<?= $grand_total; ?>">
        <input type="hidden" name="tax_amount" value="0">
        <input type="hidden" name="total_amount" value="<?= $grand_total; ?>">
        <input type="hidden" name="transaction_uuid" value="<?= $transaction_uuid; ?>">
        <input type="hidden" name="product_code" value="EPAYTEST">
        <input type="hidden" name="product_service_charge" value="0">
        <input type="hidden" name="product_delivery_charge" value="0">
        <input type="hidden" name="success_url" value="https://developer.esewa.com.np/success">
        <input type="hidden" name="failure_url" value="https://developer.esewa.com.np/failure">
        <input type="hidden" name="signed_field_names" value="total_amount,transaction_uuid,product_code">
        <input type="hidden" name="signature" value="<?= $signature; ?>">
        <input type="submit" value="Pay with eSewa" class="btn">
    </form>

</div>

</body>

</html>