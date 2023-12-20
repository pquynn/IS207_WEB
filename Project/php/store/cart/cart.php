
  <!-- Add particular css link to file: start -->
  <link rel="stylesheet" href="../../../css/store/cart.css" />
  <!-- Add particular css link to file: start -->
  <!-- page header: start -->
  <?php 
    $title = "Giỏ hàng";
    include("../header-footer-nav/header.php");
  ?>
  <!-- page header: end -->
  <!-- CART: START -->
  <div class="cart" method="get" action="checkout.php">
    <!-- CART-HEADER: Start -->
    <div class="cart-header">
      <h2>Giỏ hàng</h2>
      <a href="#">
        <span class="material-symbols-outlined"> keyboard_backspace </span
        >Tiếp tục mua sắm
      </a>
    </div>
    <!-- CART-HEADER: End -->

    <!-- CART-BODY: Start -->
    <div class="cart-body">
      <!-- PRODUCT-LIST: Start -->
      <table class="product-list--cart">
        <!-- header -->
        <tr class="product-list--header">
          <th><p>Tên sản phẩm</p></th>
          <th><p>Giá</p></th>
          <th><p>SL</p></th>
          <th><p>Tổng tiền</p></th>
          <th></th>
        </tr>

        <!-- product -->
        <tbody class="product-list--body"> 
        
        </tbody>
        
      </table>
      <!-- PRODUCT-LIST: End -->

      <!-- SUBMIT-SECTION: Start -->
      <div class="submit-section flex">
        <!-- sub total: Start -->
          <div class="sub-total flex">
            <p>Tạm tính</p>
            <p><span class="sub-total--amount">143910</span> đ</p>
          </div>
        <!-- sub total: End -->

        <!-- total: Start -->
        <div class="total flex">
          <p>Tổng <small class="gray-text">(Bao gồm thuế VAT)</small></p>
          <p><span class="total-amount">143910</span> đ</p>
        </div>
        <!-- total: End -->

        <!-- checkout btn: Start -->
        <button 
          class="btn checkout-bnt pointer" 
          onclick="location.href='../checkout/checkout.php'">
            Tiến hành thanh toán
        </button>
        <!-- checkout btn: End -->
      </div>
      <!-- SUBMIT-SECTION: End -->
    </div>
    <!-- CART-BODY: End -->
  </div>
  <!-- CART: END -->

  <!-- EPMTY-CART: START -->
  <div class="empty-cart hidden">
    <img
    src="https://www.fudcoshop.com/pub/static/frontend/MageBig/martfury_layout04/en_GB/images/empty-cart.svg"
    class="empty-cart--img" />
    <p class="empty-cart--notification">
      Không có sản phẩm nào trong giỏ hàng
    </p>
    <a href="../homepage-shopping/homepage.php" class="btn empty-cart--shopping" >TIẾP TỤC MUA SẮM</a>
  </div>
  <!-- EPMTY-CART: END -->

  <!-- page footer: start -->
  <?php include("../header-footer-nav/footer.php");?>
  <!-- page footer: start -->

  <!-- js: start -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="../../../js/store/cart-checkout/cart/cart.js"></script>
  <script src="../../../js/homepage-shopping/product_detail"></script>
  <!-- js: end -->
<!-- push value to database: start -->
<?php
?>
<!-- push value to database: end -->