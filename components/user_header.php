<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
   }
}
?>

<style>
   .message {
      background-color: rgb(216, 248, 215);
      color: #721c24;
      /* border: 1px solid #f5c6cb; */
      padding: 12px 20px;
      margin: 10px auto;
      width: 50%;
      max-width: 600px;
      border-radius: 5px;
      position: absolute;
      left: 30%;
      font-family: Arial, sans-serif;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
   }

   .message span {
      display: inline-block;
      font-size: 16px;
   }

   .message i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #721c24;
      font-size: 18px;
   }
</style>
<div class="top">
   <p>
      Summer Mega Sale on Electronics - Up to 50% OFF!
   </p>
   <a href="../shop.php" style="text-decoration:underline;">Shop Now</a>

   <button>
      <i class="fa-solid fa-xmark"></i>
   </button>
</div>
<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">Shopper</a>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About Us</a>
         <a href="orders.php">Orders</a>
         <a href="shop.php">Shop Now</a>
         <a href="contact.php">Contact Us</a>
      </nav>

      <div class="icons">
         <?php
         $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
         $count_wishlist_items->execute([$user_id]);
         $total_wishlist_counts = $count_wishlist_items->rowCount();

         $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $count_cart_items->execute([$user_id]);
         $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
         <form action="search_page.php" method="get" class="searchbar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="query" placeholder="What are you looking for?" required>
         </form>

         <div class="inner-icons">
            <a href="wishlist.php" class="icon">
               <i class="fas fa-heart"></i>
               <?php
               if ($total_wishlist_counts > 0) {
               ?>
                  <span><?= $total_wishlist_counts; ?></span>
               <?php
               }
               ?>


            </a>
            <a href="cart.php" class="icon">
               <i class="fas fa-shopping-cart"></i>
               <?php
               if ($total_cart_counts > 0) {
               ?>
                  <span><?= $total_cart_counts; ?></span>
               <?php
               }
               ?>
            </a>

            <div id="user-btn" onclick="document.querySelector('.profile').classList.toggle('show');">
               <div class="icon">
                  <i class="fas fa-user"></i>
               </div>
            </div>
            <div class="profile">
               <?php
               $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
               $select_profile->execute([$user_id]);
               if ($select_profile->rowCount() > 0) {
                  $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
               ?>
                  <p><?= $fetch_profile["name"]; ?></p>
                  <div class="flex-btn">
                     <a href="update_user.php" class="btn">Update Profile.</a>
                     <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a>
                  </div>
               <?php
               } else {
               ?>
                  <p>Please Login Or Register First to proceed !</p>
                  <div class="flex-btn">
                     <a href="user_register.php" class="option-btn">Register</a>
                     <a href="user_login.php" class="option-btn">Login</a>
                  </div>
               <?php
               }
               ?>


            </div>

         </div>
      </div>

   </section>

   <script>
      const navbars = document.querySelectorAll(".navbar a");
      console.log(navbars);

      const navbar = document.querySelectorAll(".navbar");
      console.log(navbar);

      navbars.forEach(element => {
         element.addEventListener("click", (e) => {
            document.querySelector('.active').classList.remove();

            element.classList.add('active')
         })
      });

      // Wait for the DOM to load
      window.addEventListener('DOMContentLoaded', () => {
         const messages = document.querySelectorAll('.message');
         messages.forEach(msg => {
            setTimeout(() => {
               msg.style.opacity = '0';
               msg.style.transition = 'opacity 0.5s ease';
               setTimeout(() => msg.remove(), 500); // Remove after fade
            }, 2000);
         });
      });

      window.addEventListener('scroll', () => {
         const profileBox = document.querySelector('.profile');
         profileBox.classList.remove('show');
      });
   </script>

</header>