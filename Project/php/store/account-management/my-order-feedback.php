<?php
    $title = "Đánh giá đơn hàng";
    include("../header-footer-nav/header.php");
?>

<!-- MAIN SECTION START -->
  <!-- NAVIGATION ACCOUNT START -->
  <?php include("../header-footer-nav/navigation-account.php");?>
<!-- NAVIGATION ACCOUNT START -->

<!--MY_ORDER-FEEDBACK START-->
<div class="my-order-feedback">
      <ul class="breadcrumb-my-order">
        <li><a href="my-orders.php">Danh sách đơn hàng</a> / </li>
        <li> <a href="my-order-detail.php">Chi tiết đơn hàng</a> / </li>
        <li class="breadcrumb-current-page">Đánh giá đơn hàng</li>
      </ul>

      <h2>Đánh giá đơn hàng</h2>

        <p class="star product">
          Đánh giá sản phẩm
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        </p>

        <p class="star service">
          Đánh giá dịch vụ người bán
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <i class="fa-regular fa-star"></i>
        </p>

        <textarea placeholder="Nhận xét đơn hàng" class="input-feedback"></textarea>

        <input type="submit" value="Đánh giá" class="submit-feedback"> 

    </div>
</div>
<!--MY_ORDER-FEEDBACK END-->

<?php
    include("../header-footer-nav/footer.php");
?>