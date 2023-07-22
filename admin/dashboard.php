<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

   <?php include '../components/admin_header.php'; ?>

   <section class="dashboard">

      <h1 class="heading">dashboard</h1>

      <div class="box-container">

         <div class="box">
            <h3>xin chào!</h3>
            <p>
               <?= $fetch_profile['name']; ?>
            </p>
            <a href="update_profile.php" class="btn">cập nhật thông tin</a>
         </div>

         <div class="box">
            <?php
            $total_pendings = 0;
            $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_pendings->execute(['đang xử lý']);
            if ($select_pendings->rowCount() > 0) {
               while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
                  $total_pendings += $fetch_pendings['total_price'];
               }
            }
            ?>
            <h3>
               <?= formatCurrency($total_pendings); ?>.000 VNĐ
            </h3>
            <p>
               đơn hàng đang chờ xử lý</p>
            <a href="placed_orders.php" class="btn">Xem đơn hàng</a>
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
         $total_pendings = 1000000; // Giả sử $grand_total có giá trị là 1,000,000
        // echo formatCurrency($total_pendings); // Kết quả sẽ là "1.000.000 VNĐ"
         ?>
             <?php
         function formatCurrency1($amount)
         {
            // Sử dụng hàm number_format() để định dạng số thành chuỗi kiểu tiền tệ
            // Tham số thứ nhất là số cần định dạng
            // Tham số thứ hai là số chữ số sau dấu thập phân (mặc định là 0)
            // Tham số thứ ba là ký tự ngăn cách phần nghìn (mặc định là dấu phẩy)
            // Tham số thứ tư là ký tự ngăn cách phần thập phân (mặc định là dấu chấm)
            return number_format($amount, 0, ',', '.');
         }

         // Ví dụ sử dụng hàm formatCurrency() với giá trị của biến $grand_total
         $total_completes = 1000000; // Giả sử $grand_total có giá trị là 1,000,000
         // echo formatCurrency($total_completes); // Kết quả sẽ là "1.000.000 VNĐ"
         ?>

         <div class="box">
            <?php
            $total_completes = 0;
            $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_completes->execute(['hoàn tất']);
            if ($select_completes->rowCount() > 0) {
               while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
                  $total_completes += $fetch_completes['total_price'];
               }
            }
            ?>
            <h3>
            <?= formatCurrency($total_completes); ?>.000 VNĐ
            </h3>
            <p>
               đơn hàng đã hoàn thành</p>
            <a href="placed_orders.php" class="btn">Xem đơn hàng</a>
         </div>

         <div class="box">
            <?php
            $select_orders = $conn->prepare("SELECT * FROM `orders`");
            $select_orders->execute();
            $number_of_orders = $select_orders->rowCount()
               ?>
            <h3>
               <?= $number_of_orders; ?>
            </h3>
            <p>
               Đặt hàng</p>
            <a href="placed_orders.php" class="btn">Xem đơn hàng</a>
         </div>

         <div class="box">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
               ?>
            <h3>
               <?= $number_of_products; ?>
            </h3>
            <p>
               sản phẩm được thêm vào</p>
            <a href="products.php" class="btn">
               xem sản phẩm</a>
         </div>

         <div class="box">
            <?php
            $select_users = $conn->prepare("SELECT * FROM `users`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
               ?>
            <h3>
               <?= $number_of_users; ?>
            </h3>
            <p>
               người dùng</p>
            <a href="users_accounts.php" class="btn">xem người dùng</a>
         </div>

         <div class="box">
            <?php
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount()
               ?>
            <h3>
               <?= $number_of_admins; ?>
            </h3>
            <p>tài khoản admin</p>
            <a href="admin_accounts.php" class="btn">xem</a>
         </div>

         <div class="box">
            <?php
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
            $number_of_messages = $select_messages->rowCount()
               ?>
            <h3>
               <?= $number_of_messages; ?>
            </h3>
            <p>Tin nhắn mới</p>
            <a href="messages.php" class="btn">Xem tin nhắn</a>
         </div>

      </div>

   </section>












   <script src="../js/admin_script.js"></script>

</body>

</html>