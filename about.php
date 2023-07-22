<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}
;

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="about">

      <div class="row">

         <div class="image">
            <img src="images/about-img.svg" alt="">
         </div>

         <div class="content">
            <h3>tại sao chọn chúng tôi?</h3>
            <p>Tất cả những gì người đàn ông cần để trông lịch lãm, sang trọng và tự tin, đều có thể tìm thấy tại trang
               web của chúng tôi. Chúng tôi là một doanh nghiệp chuyên cung cấp các sản phẩm thời trang nam cao cấp, đặc
               biệt là đồ âu như suit, giày tây, quần âu và sơ mi. Với chất lượng và kiểu dáng đẳng cấp, các sản phẩm
               của chúng tôi sẽ giúp khách hàng tỏa sáng trong mọi dịp.

               Tại trang web của chúng tôi, và trên một số nền tảng Social khác như Facebook, Insta, Tiktok khách hàng
               có thể dễ dàng tìm thấy những sản phẩm thời trang nam phong phú, đa dạng về kiểu dáng và màu sắc. Chúng
               tôi cam kết đem đến cho khách hàng những sản phẩm có chất lượng tốt nhất, được sản xuất từ những nguyên
               liệu chất lượng cao và được thiết kế bởi những nhà thiết kế tài năng và kinh nghiệm.</p>
            <a href="contact.php" class="btn">liên hệ</a>
         </div>

      </div>

   </section>

   <section class="reviews">

      <h1 class="heading">Đánh giá của khách hàng</h1>

      <div class="swiper reviews-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <img src="images/pic-1.png" alt="">
               <p>Lấy một gợi ý từ cuốn sách “I am Dandy” của Rose Callahan, khi
                  chúng ta đi sâu vào yếu tố của mình là ăn mặc đẹp, thì đó là lúc chúng ta có thể mở rộng bức tường của
                  sự tự do và thể hiện bản thân độc đáo…</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>john wick</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-2.png" alt="">
               <p>Lấy một gợi ý từ cuốn sách “I am Dandy” của Rose Callahan, khi
                  chúng ta đi sâu vào yếu tố của mình là ăn mặc đẹp, thì đó là lúc chúng ta có thể mở rộng bức tường của
                  sự tự do và thể hiện bản thân độc đáo…</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>isabella</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-3.png" alt="">
               <p>Lấy một gợi ý từ cuốn sách “I am Dandy” của Rose Callahan, khi
                  chúng ta đi sâu vào yếu tố của mình là ăn mặc đẹp, thì đó là lúc chúng ta có thể mở rộng bức tường của
                  sự tự do và thể hiện bản thân độc đáo…</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>johnny</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-4.png" alt="">
               <p>Lấy một gợi ý từ cuốn sách “I am Dandy” của Rose Callahan, khi
                  chúng ta đi sâu vào yếu tố của mình là ăn mặc đẹp, thì đó là lúc chúng ta có thể mở rộng bức tường của
                  sự tự do và thể hiện bản thân độc đáo…</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>john deo</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-5.png" alt="">
               <p>Lấy một gợi ý từ cuốn sách “I am Dandy” của Rose Callahan, khi
                  chúng ta đi sâu vào yếu tố của mình là ăn mặc đẹp, thì đó là lúc chúng ta có thể mở rộng bức tường của
                  sự tự do và thể hiện bản thân độc đáo…</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>john deo</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-6.png" alt="">
               <p>Lấy một gợi ý từ cuốn sách “I am Dandy” của Rose Callahan, khi
                  chúng ta đi sâu vào yếu tố của mình là ăn mặc đẹp, thì đó là lúc chúng ta có thể mở rộng bức tường của
                  sự tự do và thể hiện bản thân độc đáo…</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>john deo</h3>
            </div>

         </div>

         <div class="swiper-pagination"></div>

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