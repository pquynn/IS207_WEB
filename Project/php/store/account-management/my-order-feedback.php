<?php
    $title = "Đánh giá đơn hàng";
    include("../header-footer-nav/header.php");
?>

<!-- MAIN SECTION START -->
  <!-- NAVIGATION ACCOUNT START -->
  <?php include("../header-footer-nav/navigation-account.php");?>
<!-- NAVIGATION ACCOUNT START -->

<!--MY_ORDER-FEEDBACK START-->
  <div class="my-order-feedback store-table">
        <ul class="breadcrumb-my-order">
          <li><a href="my-orders.php">Danh sách đơn hàng</a> / </li>
          <li id="link-back-order-detail"></li>
          <li class="breadcrumb-current-page">Đánh giá đơn hàng</li>
        </ul>
      <form class="form-rating">
        <h2>Đánh giá đơn hàng</h2>

        <table class="my-order-rating">
          <thead>
            <th>#</th>
            <th colspan="2">Sản phẩm</th>
            <th>Kích thước</th>
            <th>Số lượng</th>
            <th>Giá</th>
          </thead>

          <tbody></tbody>
        </table>
      </form>
  </div>  
</div>    
<!--MY_ORDER-FEEDBACK END-->
<script src="../../../js/my-order/my-order-feedback-management"></script>
<?php
    include("../header-footer-nav/footer.php");
    include("ModalOrderFeedback.php");
?>