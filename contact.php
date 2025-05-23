<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

if (isset($_POST['send'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if ($select_message->rowCount() > 0) {
      $message[] = 'already sent message!';
   } else {

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'Successfully message sent!';
   }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/contact.css">
   <link rel="stylesheet" href="css/header.css">
   <link rel="stylesheet" href="css/footer.css">


</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="contact">

   <!-- Left Contact Info Section -->
   <div class="contact-info">
      <div class="info-box">
         <i class="fas fa-phone"></i>
         <div>
            <h4>Call To Us</h4>
            <p>We are available 24/7, 7 days a week.<br>Phone: +977 9823696700/p>
         </div>
      </div>
      <hr>
      <div class="info-box">
         <i class="fas fa-envelope"></i>
         <div>
            <h4>Write To Us</h4>
            <p>Fill out our form and we will get back to you within 24 hours.<br><br>
               Emails: customer@shopper.com<br>
               support@shopper.com
            </p>
         </div>
      </div>
   </div>

   <form action="" method="post">
      <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
         <input type="text" name="name" placeholder="Your Name *" required maxlength="20" class="box" style="flex: 1 1 30%;">
         <input type="email" name="email" placeholder="Your Email *" required maxlength="50" class="box" style="flex: 1 1 30%;">
         <input type="number" name="number" min="0" max="9999999999" placeholder="Your Phone *" required onkeypress="if(this.value.length == 10) return false;" class="box" style="flex: 1 1 30%;">
      </div>
      <textarea name="msg" class="box" placeholder="Your Message" required></textarea>
      <input type="submit" value="Send Message" name="send" class="btn">
   </form>

</section>
   <?php include 'components/footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>