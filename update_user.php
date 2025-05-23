<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ? WHERE id = ?");
   $update_profile->execute([$name, $email, $user_id]);

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $prev_pass = $_POST['prev_pass'];
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   if ($old_pass == $empty_pass) {
      $message[] = 'please enter old password!';
   } elseif ($old_pass != $prev_pass) {
      $message[] = 'old password not matched!';
   } elseif ($new_pass != $cpass) {
      $message[] = 'confirm password not matched!';
   } else {
      if ($new_pass != $empty_pass) {
         $update_admin_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
         $update_admin_pass->execute([$cpass, $user_id]);
         $message[] = 'password updated successfully!';
      } else {
         $message[] = 'please enter a new password!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/user_update.css">
   <link rel="stylesheet" href="css/header.css">
   <link rel="stylesheet" href="css/footer.css">


</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="form-container">

   <form action="" method="post">
   <h3 style="color: #e60023; font-size: 16px; margin-bottom: 25px;">Edit Your Profile</h3>

   <input type="hidden" name="prev_pass" value="<?= $fetch_profile["password"]; ?>">

   <div style="display: flex; gap: 20px; margin-bottom: 20px;" class="input-row" >
      <div style="flex: 1;">
         <label for="name" style="font-size: 13px; font-weight: 500;">Full Name</label>
         <input type="text" id="name" name="name" required placeholder="Full Name" maxlength="20" class="box-user1" value="<?= $fetch_profile["name"]; ?>">
      </div>
      <div style="flex: 1;">
         <label for="email" style="font-size: 13px; font-weight: 500;">Email</label>
         <input type="email" id="email" name="email" required placeholder="Enter Email" maxlength="50" class="box-user" oninput="this.value = this.value.replace(/\s/g, '')" value="<?= $fetch_profile["email"]; ?>">
      </div>
   </div>

   <div style="margin-bottom: 15px;">
      <label style="font-size: 13px; font-weight: 500; margin-bottom: 8px; display: block;">Password Changes</label>
      <input type="password" name="old_pass" placeholder="Current Password" maxlength="20" class="box-user" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="new_pass" placeholder="New Password" maxlength="20" class="box-user" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" placeholder="Confirm New Password" maxlength="20" class="box-user" oninput="this.value = this.value.replace(/\s/g, '')">
   </div>

   <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
      <input type="submit" value="Save Changes" class="btn" name="submit" style="background-color: #e60023;">
   </div>
</form>


   </section>













   <?php include 'components/footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>