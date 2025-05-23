<?php
include 'components/connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
   header('location:user_login.php');
   exit;
} else {
   $user_id = $_SESSION['user_id'];
}

if (isset($_POST['order'])) {
   $_SESSION['order_data'] = $_POST;
   header("Location: process_order.php");
   exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/checkout.css">
   <link rel="stylesheet" href="css/header.css">
   <link rel="stylesheet" href="css/footer.css">

</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="checkout-orders">
      <form action="" method="POST">
         <div class="order-items">
            <h3>Your Orders</h3>
            <div class="display-orders">
               <?php
               $grand_total = 0;
               $cart_items = [];

               $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
               $select_cart->execute([$user_id]);

               if ($select_cart->rowCount() > 0) {
                  while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                     $cart_items[] = $fetch_cart['name'] . ' (' . $fetch_cart['price'] . ' x ' . $fetch_cart['quantity'] . ')';
                     $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
               ?>
                     <p><?= $fetch_cart['name']; ?> <span>(<?= 'Rs. ' . $fetch_cart['price'] . ' x ' . $fetch_cart['quantity']; ?>)</span></p>
               <?php
                  }
               } else {
                  echo '<p class="empty">your cart is empty!</p>';
               }
               ?>
               <div class="grand-total">Grand Total: <span>Rs. <?= $grand_total; ?>/-</span></div>
            </div>
         </div>

         <div class="user-details">
            <h3>Place your order</h3>
            <div class="user-inputs">
               <div class="inputBox">
                  <span>Your Name:</span>
                  <input type="text" name="name" required>
               </div>
               <div class="inputBox">
                  <span>Your Number:</span>
                  <input type="tel" name="number" pattern="^(98|97)\d{8}$" minlength="10" maxlength="10" required title="Phone number must start with 98 or 97 and be exactly 10 digits">
               </div>

               <div class="inputBox">
                  <span>Your Email:</span>
                  <input type="email" name="email" required>
               </div>
               <div class="inputBox">
                  <span>Payment Method:</span>
                  <select name="method" required>
                     <option value="esewa">eSewa</option>
                     <option value="cash on delivery">Cash on Delivery</option>
                  </select>
               </div>
               <div class="inputBox"><span>Flat No:</span><input type="text" name="flat" required></div>
               <div class="inputBox"><span>Street:</span><input type="text" name="street" required></div>
               <div class="inputBox"><span>City:</span><input type="text" name="city" required></div>
               <div class="inputBox"><span>Province:</span><input type="text" name="state" required></div>
               <div class="inputBox"><span>Country:</span><input type="text" name="country" required></div>
               <div class="inputBox"><span>PIN Code:</span><input type="number" name="pin_code" required></div>
            </div>
            <input type="submit" name="order" value="Place Order" class="btn">
         </div>
      </form>

   </section>
   <?php include 'components/footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>