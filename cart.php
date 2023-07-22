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

if (isset($_POST['delete'])) {
   $cart_id = $_POST['cart_id'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$cart_id]);
}

if (isset($_GET['delete_all'])) {
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart_item->execute([$user_id]);
   header('location:cart.php');
}

if (isset($_POST['update_qty'])) {
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = 'số lượng trong giỏ hàng được cập nhật';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>giỏ hàng</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="products shopping-cart">

      <h3 class="heading">GIỎ HÀNG</h3>

      <div class="box-container">

         <?php
         $grand_total = 0;
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if ($select_cart->rowCount() > 0) {
            while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
               ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
                  <a href="quick_view.php?pid=<?= $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
                  <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
                  <div class="name">
                     <?= $fetch_cart['name']; ?>
                  </div>
                  <div class="flex">
                     <div class="price">
                        <?= $fetch_cart['price'] . 'VNĐ'; ?>
                     </div>
                     <input type="number" name="qty" class="qty" min="1" max="99"
                        onkeypress="if(this.value.length == 2) return false;" value="<?= $fetch_cart['quantity']; ?>">
                     <button type="submit" class="fas fa-edit" name="update_qty"></button>
                  </div>
                  <div class="sub-total"> tổng phụ : <span>
                        <?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>.000 VNĐ
                     </span> </div>
                  <input type="submit" value="xóa sản phẩm" onclick="return confirm('xóa sản phẩm này khỏi giỏ hàng?');"
                     class="delete-btn" name="delete">
               </form>
               <?php
               $grand_total += $sub_total;
            }
         } else {
            echo '<p class="empty" style="margin: 0 auto">giỏ hàng của bạn đang trống!!</p>';
         }
         ?>
      </div>

      <div class="cart-total">
         <p>tổng cộng : <span>
               <?= formatCurrency($grand_total); ?>.000 VNĐ
            </span></p>
         <a href="shop.php" class="option-btn">Tiếp tục mua sắm</a>
         <a href="cart.php?delete_all" class="delete-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>"
            onclick="return confirm('xóa tất cả sản phẩm?');">Xóa tất cả sản phẩm</a>
         <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">
            tiến hành thanh toán</a>
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