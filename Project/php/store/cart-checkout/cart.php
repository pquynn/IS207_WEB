<!-- connect to database: start -->
<?php
$conn=new mysqli('localhost', 'root', '', 'shoe_shop_db');

// check connection
if(!$conn){
  die("Kết nối thất bại: ". mysqli_connect_error());
}
else{
  // echo "Kết nối thành công";
}

// order's detail
$orderDetailList = $conn->query("SELECT DISTINCT * FROM orders INNER JOIN orders_detail ON orders_detail.ORDER_ID = orders.ORDER_ID WHERE STATUS='Đang mua hàng' AND orders.ORDER_ID=1");

// product pricture
$productPictureList = $conn->query("SELECT * FROM product_pictures INNER JOIN orders_detail ON orders_detail.product_id = product_pictures.product_id WHERE ORDER_ID=1");

$productPicture = $productPictureList -> fetch_assoc();
// while ($productPicture = $productPictureList -> fetch_assoc()){

// }
?>
<!-- connect to sever: end -->

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
        <?php
        // src=" .$productPicture["first_picture"]. "
        
        // product index
          $index = 0;

          // RENDER PRODUCT: start
          while ($orderDetail = $orderDetailList -> fetch_assoc()){
            echo "<tr class=\"product\">
            <!-- infor -->
            <td class=\"product-infor\">
              <img 
                class=\"product-img\"
                alt='". $orderDetail["PRODUCT_NAME"]. "' />
              <div class=\"product-descr\">
                <a href=\"#\">". $orderDetail["PRODUCT_NAME"]. "</a>
                <small class=\"gray-text\">Size ". $orderDetail["SIZE"]. "</small>
              </div>
            </td>
  
            <!-- price -->
            <td class=\"price\">" .$orderDetail["PRICE"]. "</td>
  
            <!-- amount -->
            <td>
              <div class=\"flex amount\">
                <button class=\"amount-btn pointer minus\">-</button>
                <input type=\"number\" min=\"1\" value=" .$orderDetail["QUANTITY"]." onChange=\"updateMoney(" .$index. ")\"/>
                <button class=\"amount-btn pointer plus\">+</button>
              </div>
            </td>
  
            <!-- total -->
            <td class=\"product-total\">199000</td>
  
            <!-- remove from cart -->
            <td>
              <button class=\"remove-btn pointer\">
                <span class=\"material-symbols-outlined\"> delete </span>
              </button>
            </td>
          </tr>";

          // update product index
          $index++;
          }
          // RENDER PRODUCT: end
        ?>
        
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
          onclick="location.href='./checkout.php'">
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
    <a href="#" class="btn empty-cart--shopping">TIẾP TỤC MUA SẮM</a>
  </div>
  <!-- EPMTY-CART: END -->

  <!-- page footer: start -->
  <?php include("../header-footer-nav/footer.php");?>
  <!-- page footer: start -->

  <!-- js: start -->
  <script src="../../../js/store/cart-checkout/cart/cart.js"></script> 
  <!-- js: end -->
</body>
</html>

<!-- push value to database: start -->
<?php

?>
<!-- push value to database: end -->