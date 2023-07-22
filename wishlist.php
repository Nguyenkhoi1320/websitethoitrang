<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
   header('location:user_login.php');
}
;

include 'components/wishlist_cart.php';

if (isset($_POST['delete'])) {
   $wishlist_id = $_POST['wishlist_id'];
   $delete_wishlist_item = $conn->prepare("DELETE FROM `wishlist` WHERE id = ?");
   $delete_wishlist_item->execute([$wishlist_id]);
}

if (isset($_GET['delete_all'])) {
   $delete_wishlist_item = $conn->prepare("DELETE FROM `wishlist` WHERE user_id = ?");
   $delete_wishlist_item->execute([$user_id]);
   header('location:wishlist.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>danh sách yêu thích</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="products">

      <h3 class="heading">sản phẩm yêu thích</h3>

      <div class="box-container">

         <?php
         $grand_total = 0;
         $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
         $select_wishlist->execute([$user_id]);
         if ($select_wishlist->rowCount() > 0) {
            while ($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)) {
               $grand_total += $fetch_wishlist['price'];
               ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="pid" value="<?= $fetch_wishlist['pid']; ?>">
                  <input type="hidden" name="wishlist_id" value="<?= $fetch_wishlist['id']; ?>">
                  <input type="hidden" name="name" value="<?= $fetch_wishlist['name']; ?>">
                  <input type="hidden" name="price" value="<?= $fetch_wishlist['price']; ?>">
                  <input type="hidden" name="image" value="<?= $fetch_wishlist['image']; ?>">
                  <a href="quick_view.php?pid=<?= $fetch_wishlist['pid']; ?>" class="fas fa-eye"></a>
                  <img src="uploaded_img/<?= $fetch_wishlist['image']; ?>" alt="">
                  <div class="name">
                     <?= $fetch_wishlist['name']; ?>
                  </div>
                  <div class="flex">
                     <div class="price">
                        <?= $fetch_wishlist['price']; ?>VNĐ /-
                     </div>
                     <input type="number" name="qty" class="qty" min="1" max="99"
                        onkeypress="if(this.value.length == 2) return false;" value="1">
                  </div>
                  <input type="submit" value="thêm vào giỏ hàng" class="btn" name="add_to_cart">
                  <input type="submit" value="xóa sản phẩm" onclick="return confirm('bạn muốn xóa sản phẩm này?');"
                     class="delete-btn" name="delete">
               </form>
               <?php
            }
         } else {
            echo '<p class="empty">danh sách sản phẩm yêu thích của bạn đang trống!!</p>';
         }
         ?>
      </div>

      <div class="wishlist-total">
         <p>tổng phụ : <span>
               <?= formatCurrency($grand_total); ?>.000 VNĐ
            </span></p>
         <a href="shop.php" class="option-btn">Tiếp tục mua sắm</a>
         <a href="wishlist.php?delete_all" class="delete-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>"
            onclick="return confirm('Bạn có muốn xóa tất cả sản phẩm?');">xóa tất cả sản phẩm</a>
      </div>

   </section>

   <?php
   function formatCurrency($amount)
   {
      // Sử dụng hàm number_format() để định dạng số thành chuỗi kiểu tiền tệ
      // Tham số thứ nhất là số cần định dạng
      // Tham số thứ hai là số chữ số sau dấu thập phân (mặc định là 0)
      // Tham số thứ ba là ký tự ngăn cách phần nghìn (mặc định là dấu phẩy)
      // Tham số thứ tư là ký tự ngăn cách phần thập phân (mặc định là dấu chấm)
      return number_format($amount, 0, ',', '.');
   }

   ?>











   <?php include 'components/footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>