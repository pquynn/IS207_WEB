<?php
    $title = "Chi tiết đơn hàng";
    include("../header-footer-nav/header.php");
?>

<!-- MAIN SECTION START -->
  <!-- NAVIGATION ACCOUNT START -->
  <?php include("../header-footer-nav/navigation-account.php");?>
  <!-- NAVIGATION ACCOUNT START -->

<!--DETAIL ORDER--START-->
<div class="my-order-detail">
      <!--breadcrumb-->
      <ul class="breadcrumb-my-order">
        <li><a href="my-orders.php">Danh sách đơn hàng</a> / </li>
        <li class="breadcrumb-current-page">Chi tiết đơn hàng</li>
      </ul>

      <div class="title-order-detail">
          <h2>Chi tiết đơn hàng #A123</h2>
          <!-- TODO: order status??? -->
          <p id="date-create-order">
            Ngày tạo: dd/mm/yyyy
          </p>
      </div>

      <ul class="info-customer">
        <li class="box-info" id="info-1">
          <i class="fa-regular fa-user icon-info"></i>
              
          <ul class="info">
            <li class="header-info">Thông tin người nhận</li>
            <li>Họ tên: </li>
            <li>SĐT: </li> 
          </ul>
        </li>
      
        <li class="box-info" id="info-2">
          <i class="fa-solid fa-location-dot icon-info"></i>
              
          <ul class="info">
            <li class="header-info">Địa chỉ người nhận</li>
            <li> 123 ABC</li>
          </ul>
        </li>

        <li class="box-info" id="info-3">
            <i class="fa-solid fa-credit-card icon-info"></i>
                <ul class="info">
                    <li class="header-info">Phương thức thanh toán</li>
                    <li>Momo: 09123456789</li>
                    <li>Tên: </li>
                </ul>
            </li>
      </ul>
      
      <table class="table-detail-order">
        <tr>
          <td>Mã sản phẩm</td>
          <td>Kích thước</td>
          <td>Tên sản phẩm</td>
          <td>Hình ảnh</td>
          <td>Số lượng</td>
          <td>Tổng tiền</td>
        </tr>

        <tr>
          <td>SS001</td>
          <td>38</td>
          <td>Product name</td>
          <td>xem hình ảnh</td>
          <td>1</td>
          <td>$9999</td>
        </tr>
      </table>

      <table class="order-cost">
        <tr>
          <td>Tổng tiền sản phẩm</td>
          <td class="cost order">$9999</td>
        </tr>
        
        <tr>
          <td>Khuyến mãi</td>
          <td class="cost promotion">$9999</td>
        </tr>

        <tr class="total-cost">
          <td>Tổng tiền thanh toán</td>
          <td class="cost total">$9999</td>
        </tr>
      </table>


      <ul class="order-selection">
        <li class="order-option">
          <a href="#">
            <i class="fa-solid fa-star" style="color:#FEC30D"></i>
            ĐÁNH GIÁ
          </a>
        </li>

        <li class="order-option">
          <a href="#">BÁO CÁO</a>
        </li>

        <li class="order-option cancel-order">
          <a href="#" style="color:#fff;">HỦY ĐƠN HÀNG</a>
        </li>
      </ul>
    </div>
  <!--DETAIL ORDER--END-->  
</div>

<?php
    include("../header-footer-nav/footer.php");
?>