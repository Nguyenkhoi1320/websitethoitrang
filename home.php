<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}
;

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <div class="home-bg">

      <section class="home">

         <div class="swiper home-slider">

            <div class="swiper-wrapper">

               <div class="swiper-slide slide">
                  <div class="image">
                     <img src="images/ao1.png" alt="">
                  </div>
                  <div class="content">
                     <span>giảm giá đến 35%</span>
                     <h3>áo thun nam hàn quốc</h3>
                     <a href="shop.php" class="btn">Mua Ngay</a>
                  </div>
               </div>

               <div class="swiper-slide slide">
                  <div class="image">
                     <img src="images/ao3.png" alt="">
                  </div>
                  <div class="content">
                     <span>giảm giá đến 20%</span>
                     <h3>quần tây âu cao cấp</h3>
                     <a href="shop.php" class="btn">Mua Ngay</a>
                  </div>
               </div>

               <div class="swiper-slide slide">
                  <div class="image">
                     <img src="images/ao4.png" alt="">
                  </div>
                  <div class="content">
                     <span>giảm giá đến 40%</span>
                     <h3>áo sơ mi nam công sở</h3>
                     <a href="shop.php" class="btn">Mua Ngay</a>
                  </div>
               </div>

               <div class="swiper-slide slide">
                  <div class="image">
                     <img src="images/ao5.png" alt="">
                  </div>
                  <div class="content">
                     <span>giảm giá đến 30%</span>
                     <h3>áo sơ mi nam huesa</h3>
                     <a href="shop.php" class="btn">Mua Ngay</a>
                  </div>
               </div>

               <div class="swiper-slide slide">
                  <div class="image">
                     <img src="images/ao6.png" alt="">
                  </div>
                  <div class="content">
                     <span>giảm giá đến 20%</span>
                     <h3>đầm dạ hội cao cấp</h3>
                     <a href="shop.php" class="btn">Mua Ngay</a>
                  </div>
               </div>

               <div class="swiper-slide slide">
                  <div class="image">
                     <img src="images/ao8.png" alt="">
                  </div>
                  <div class="content">
                     <span>giảm giá đến 35%</span>
                     <h3>áo thun nam cao cấp</h3>
                     <a href="shop.php" class="btn">Mua Ngay</a>
                  </div>
               </div>

            </div>

            <div class="swiper-pagination"></div>

         </div>

      </section>

   </div>

   <section class="category">

      <h1 class="heading">Danh Mục Sản Phẩm</h1>

      <div class="swiper category-slider">

         <div class="swiper-wrapper">

            <a href="category.php?category=áo" class="swiper-slide slide">
               <img src="images/icon1.png" alt="">
               <h3>vest</h3>
            </a>

            <a href="category.php?category=quần" class="swiper-slide slide">
               <img src="images/icon2.png" alt="">
               <h3>quần tây</h3>
            </a>

            <a href="category.php?category=áo sơ mi" class="swiper-slide slide">
               <img src="images/icon3.png" alt="">
               <h3>áo sơ mi</h3>
            </a>

            <a href="category.php?category=áo phao" class="swiper-slide slide">
               <img src="images/icon4.png" alt="">
               <h3>áo phao</h3>
            </a>

            <a href="category.php?category=áo thun nữ" class="swiper-slide slide">
               <img src="images/icon5.png" alt="">
               <h3>áo thun nữ</h3>
            </a>

            <a href="category.php?category=mắt kính " class="swiper-slide slide">
               <img src="images/icon6.png" alt="">
               <h3>mắt kính</h3>
            </a>

            <a href="category.php?category=mũ" class="swiper-slide slide">
               <img src="images/icon7.png" alt="">
               <h3>mũ lưỡi trai</h3>
            </a>

            <a href="category.php?category=váy" class="swiper-slide slide">
               <img src="images/icon8.png" alt="">
               <h3>váy</h3>
            </a>
            <a href="category.php?category=giày" class="swiper-slide slide">
               <img src="images/giay.png" alt="">
               <h3>giày</h3>
            </a>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>

   <section class="home-products">

      <h1 class="heading">Sản Phẩm Mới Nhất</h1>

      <div class="swiper products-slider">

         <div class="swiper-wrapper">

            <?php
            $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
               while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <form action="" method="post" class="swiper-slide slide">
                     <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                     <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                     <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                     <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
                     <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                     <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
                     <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
                     <div class="name">
                        <?= $fetch_product['name']; ?>
                     </div>
                     <div class="flex">
                        <div class="price">
                           <?= $fetch_product['price'].'VNĐ'; ?><span>/-</span>
                        </div>
                        <input type="number" name="qty" class="qty" min="1" max="99"
                           onkeypress="if(this.value.length == 2) return false;" value="1">
                     </div>
                     <input type="submit" value="thêm vào giỏ hàng" class="btn" name="add_to_cart">
                  </form>
                  <?php
               }
            } else {
               echo '<p class="empty" style="margin: 0 auto">
               chưa có sản phẩm nào được thêm vào</p>';
            }
            ?>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>









   <?php include 'components/footer.php'; ?>

   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

   <script src="js/script.js"></script>

   <script>

      var swiper = new Swiper(".home-slider", {
         loop: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
      });

      var swiper = new Swiper(".category-slider", {
         loop: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            0: {
               slidesPerView: 2,
            },
            650: {
               slidesPerView: 3,
            },
            768: {
               slidesPerView: 4,
            },
            1024: {
               slidesPerView: 5,
            },
         },
      });

      var swiper = new Swiper(".products-slider", {
         loop: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            550: {
               slidesPerView: 2,
            },
            768: {
               slidesPerView: 2,
            },
            1024: {
               slidesPerView: 3,
            },
         },
      });

   </script>

</body>

</html>