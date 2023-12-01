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
      <form class="form-rating">
        <h2>Đánh giá đơn hàng</h2>

          <div class="rating-star">
            Đánh giá sản phẩm
            <div class="stars">
              <input type="radio" id="star5" name="rating" value="5"/>
              <label for="star5" class="fa-solid fa-star"></label>
              <input type="radio" id="star4" name="rating" value="4"/>
              <label for="star4" class="fa-solid fa-star"></label>
              <input type="radio" id="star3" name="rating" value="3"/>
              <label for="star3" class="fa-solid fa-star"></label>
              <input type="radio" id="star2" name="rating" value="2"/>
              <label for="star2" class="fa-solid fa-star"></label>
              <input type="radio" id="star1" name="rating" value="1"/>
              <label for="star1" class="fa-solid fa-star"></label>
            </div>
          </div>

          <textarea placeholder="Nhận xét đơn hàng" class="input-feedback"></textarea>

          <input type="submit" value="Đánh giá" class="submit-feedback"> 
      </form>
  </div>  
</div>    
<!--MY_ORDER-FEEDBACK END-->

<?php
    include("../header-footer-nav/footer.php");
?>