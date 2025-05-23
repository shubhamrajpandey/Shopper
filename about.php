<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/header.css">
   <link rel="stylesheet" href="css/about.css">
   <link rel="stylesheet" href="css/footer.css">


</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="about">

      <div class="row">

         <div class="image">
            <img src="images/colab.webp" alt="">
         </div>

         <div class="content">
            <h3>Our Story</h3>
            <p>
               Launched in 2025, <strong>Aspiring Developers</strong> is a collaborative tech team formed by six passionate individuals — Shubham, Biswas, Dipendra, Atharva, Shijal, and Suraj. Driven by a shared vision to innovate and learn, we specialize in creating smart, user-friendly digital solutions across web development and design.
            </p>
            <p>
               Based in Nepal, AspiringDevelopers brings together diverse skillsets from frontend and backend development to database and UI/UX design.Along with a commitment to quality, collaboration, and continuous learning, we aim to deliver impactful projects that reflect our dedication to excellence and teamwork.
            </p>
            <a href="contact.php" class="btn">Contact Us</a>
         </div>

      </div>

   </section>

   <section class="stats-section">
   <div class="stats-container">
      <div class="stat-box">
         <div class="icon"><i class="fas fa-store"></i></div>
         <h3>1.5k</h3>
         <p>Sellers active on our site</p>
      </div>
      <div class="stat-box">
         <div class="icon"><i class="fas fa-shopping-bag"></i></div>
         <h3>2.1k</h3>
         <p>Customer active on our site</p>
      </div>
      <div class="stat-box">
         <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
         <h3>15k</h3>
         <p>Annual gross sale in our site</p>
      </div>
   </div>
</section>


   <section class="reviews">

      <h1 class="heading">Aspiring Team Member's</h1>

      <div class="swiper reviews-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <img src="images/Dip.png" alt="">
               <p>AspiringDevelopers exceeded my expectations. They delivered a beautiful, functional website ahead of schedule. Highly recommended!!</p>
               <h3> <a href="" target="_blank">Dipendra Roka</a></h3>
                 <div class="social-icons">
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="https://www.instagram.com/dipforuuu/"><i class="fab fa-instagram"></i></a>
                     
                  </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/Suraj.jpg" alt="">
               <p>Amazing attention to detail and fantastic communication throughout the entire process. I'd love to work with them again!</p>
               <h3><a href="h" target="_blank">Suraj Tamang</a></h3>
               <div class="social-icons">
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="#"><i class="fab fa-instagram"></i></a>
                     
                  </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/Bishwass.jpg" alt="">
               <p>The team understood my vision perfectly and turned it into a professional, user-friendly, and visually appealing site. Deep and team were great to work with!</p>
               <h3><a href="" target="_blank">Bishwas Chhantyal</a></h3>
               <div class="social-icons">
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="https://www.instagram.com/biswas__ctl/"><i class="fab fa-instagram"></i></a>
                     
                  </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/Shubham.jpg" alt="">
               <p>Creative, professional, and reliable — AspiringDevelopers made the entire process so smooth, efficient, and enjoyable. I love the end result!</p>
               <h3><a href="" target="_blank">Shubham Pandey</a></h3>
               <div class="social-icons">
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="https://www.instagram.com/_shubham.pandey_/"><i class="fab fa-instagram"></i></a>
                     
                  </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/atharva.jpg" alt="">
               <p>One of the best teams I've ever hired. Their skills, dedication, and seamless teamwork really show in the final product.</p>
               <h3><a href="" target="_blank">Atharva Paudel</a></h3>
               <div class="social-icons">
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="#"><i class="fab fa-instagram"></i></a>
                     
                  </div>
            </div>

            <div class="swiper-slide slide">
               <img src="images/Shijal.png" alt="">
               <p>Dipendra and Suraj were especially helpful in refining our eCommerce features. Truly a passionate and dedicated group.</p>
               <h3><a href="" target="_blank">Shijal Shakya</a></h3>
               <div class="social-icons">
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="https://www.instagram.com/_zenix_/"><i class="fab fa-instagram"></i></a>
                     
                  </div>
            </div>

         </div>

      </div>

   </section>


   

      <!-- Our Service -->

      <section class="info-section">
      <div class="info-box">
         <div class="icon">
            <i class="fas fa-truck"></i>
         </div>
         <h3>FREE AND FAST DELIVERY</h3>
         <p>Free delivery for all orders over $140</p>
      </div>

      <div class="info-box">
         <div class="icon">
            <i class="fas fa-headset"></i>
         </div>
         <h3>24/7 CUSTOMER SERVICE</h3>
         <p>Friendly 24/7 customer support</p>
      </div>

      <div class="info-box">
         <div class="icon">
            <i class="fas fa-check-circle"></i>
         </div>
         <h3>MONEY BACK GUARANTEE</h3>
         <p>We return money within 30 days</p>
      </div>
   </section>



   <?php include 'components/footer.php'; ?>

   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

   <script src="js/script.js"></script>

   <script>
      var swiper = new Swiper(".reviews-slider", {
         loop: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            0: {
               slidesPerView: 1,
            },
            768: {
               slidesPerView: 2,
            },
            991: {
               slidesPerView: 3,
            },
         },
      });
   </script>

</body>

</html>