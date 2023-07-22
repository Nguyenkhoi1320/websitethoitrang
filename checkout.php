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

if (isset($_POST['order'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = ' ' . $_POST['flat'] . ', ' . $_POST['street'] . ', ' . $_POST['state'] . ', ' . $_POST['city'] . ', ' . $_POST['country'] . ' - ' . $_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);

   if ($check_cart->rowCount() > 0) {

      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $total_price]);

      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);

      $message[] = 'đặt hàng thành công!';
   } else {
      $message[] = 'Giỏ của bạn đang trống';
   }

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
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="checkout-orders">

      <form action="" method="POST">

         <h3>đơn đặt hàng của bạn</h3>

         <div class="display-orders">
            <?php
            $grand_total = 0;
            $cart_items[] = '';
            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $select_cart->execute([$user_id]);
            if ($select_cart->rowCount() > 0) {
               while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                  $cart_items[] = $fetch_cart['name'] . ' (' . $fetch_cart['price'] . ' x ' . $fetch_cart['quantity'] . ') - ';
                  $total_products = implode($cart_items);
                  $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
                  ?>
                  <p>
                     <?= $fetch_cart['name']; ?> <span>(
                        <?= $fetch_cart['price'] . 'VNĐ ' . 'X ' . $fetch_cart['quantity']; ?>)
                     </span>
                  </p>
                  <?php
               }
            } else {
               echo '<p class="empty">giỏ hàng của bạn đang trống!</p>';
            }
            ?>
            <input type="hidden" name="total_products" value="<?= $total_products; ?>">
            <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
            <div class="grand-total">Tổng cộng : <span>
                  <?= formatCurrency($grand_total) ?>.000 VNĐ
               </span></div>
         </div>
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

         // Ví dụ sử dụng hàm formatCurrency() với giá trị của biến $grand_total
         $grand_total = 1000000; // Giả sử $grand_total có giá trị là 1,000,000
         echo formatCurrency($grand_total); // Kết quả sẽ là "1.000.000 VNĐ"
         ?>
         <h3>Mục đặt hàng</h3>

         <div class="flex">
            <div class="inputBox">
               <span>Tên :</span>
               <input type="text" name="name" placeholder="nhập vào tên của bạn" class="box" maxlength="20" required>
            </div>
            <div class="inputBox">
               <span>Điện thoại :</span>
               <input type="number" name="number" placeholder="nhập vào số điện thoại của bạn" class="box" min="0"
                  max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
            </div>
            <div class="inputBox">
               <span>Email :</span>
               <input type="email" name="email" placeholder="nhập vào email của bạn" class="box" maxlength="50"
                  required>
            </div>
            <div class="inputBox">
               <span>Hình thức thanh toán :</span>
               <select name="method" class="box" required>
                  <option value="thanh toán khi giao hàng">
                     thanh toán khi giao hàng</option>
                  <option value="thẻ tín dụng">
                     thẻ tín dụng</option>
                  <option value="paytm">paytm</option>
                  <option value="paypal">paypal</option>
               </select>
            </div>
            <div class="inputBox">
               <span>số nhà :</span>
               <input type="text" name="flat" placeholder="ví dụ 49" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
               <span>đường :</span>
               <input type="text" name="street" placeholder="ví dụ Đào Tấn" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
               <span>huyện :</span>
               <input type="text" name="state" placeholder="ví dụ Phú Lộc" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
               <span>thành phố :</span>
               <input type="text" name="city" placeholder="ví dụ TP Huế" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
               <span>
                  quốc gia :</span>
               <input type="text" name="country" placeholder="ví dụ Việt Nam" class="box" maxlength="50" required>
            </div>
            <div class="inputBox">
               <span>mã pin :</span>
               <input type="number" min="0" name="pin_code" placeholder="ví dụ 123456" min="0" max="999999"
                  onkeypress="if(this.value.length == 6) return false;" class="box" required>
            </div>
         </div>

         <input type="submit" name="order" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>" value="thanh toán">

      </form>

   </section>













   <?php include 'components/footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>