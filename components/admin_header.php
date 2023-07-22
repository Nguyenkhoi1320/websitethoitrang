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

<header class="header">

   <section class="flex">

      <a href="../admin/dashboard.php" class="logo"> <span style="color:#ec95b6">KQN</span> Sho<span>pee.</span></a>
      </a>

      <nav class="navbar">
         <a href="../admin/dashboard.php">trang chủ</a>
         <a href="../admin/products.php">sản phẩm</a>
         <a href="../admin/placed_orders.php">đơn hàng</a>
         <a href="../admin/admin_accounts.php">quản lý</a>
         <a href="../admin/users_accounts.php">người dùng</a>
         <a href="../admin/messages.php">tin nhắn</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
         $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
         $select_profile->execute([$admin_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <h1 style="text-align: center">
            <?= 'Xin Chào ' . $fetch_profile['name']; ?>
         </h1>
         <a href="../admin/update_profile.php" class="btn">cập nhật thông tin</a>
         <div class="flex-btn">
            <a href="../admin/register_admin.php" class="option-btn">đăng ký</a>
            <a href="../admin/admin_login.php" class="option-btn">đăng nhập</a>
         </div>
         <a href="../components/admin_logout.php" class="delete-btn"
            onclick="return confirm('đăng xuất khỏi website?');">đăng xuất</a>
      </div>

   </section>

</header>