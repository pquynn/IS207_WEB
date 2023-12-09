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
          <h2>Chi tiết đơn hàng #
            <span id="orderId"></span>
            <span class="order-status"></span>           
          </h2>
          <!-- TODO: order status??? -->
          <p id="date-create-order">
            Ngày tạo:
          </p>
      </div>

      <ul class="info-customer">
        <li class="box-info" id="info-1">
          <i class="fa-regular fa-user icon-info"></i>
              
          <ul class="info">
            <li class="header-info">Thông tin người nhận</li>
            <li id="cus-name">Họ tên: </li>
            <li id="cus-tel">SĐT: </li> 
          </ul>
        </li>
      
        <li class="box-info" id="info-2">
          <i class="fa-solid fa-location-dot icon-info"></i>
              
          <ul class="info">
            <li class="header-info">Địa chỉ người nhận</li>
            <li id="cus-add"></li>
          </ul>
        </li>

        <li class="box-info" id="info-3">
            <i class="fa-solid fa-credit-card icon-info"></i>
                <ul class="info">
                    <li class="header-info">Phương thức thanh toán</li>
                    <li id="cus-pay"></li>
                </ul>
            </li>
      </ul>
      
      <table class="store-table">
        <thead>
          <tr>
            <th>Mã sản phẩm</th>
            <th>Kích thước</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
        <tbody class="tbody-product"></tbody>
      </table>

      <table class="order-cost">
        <tr>
          <td>Tổng tiền sản phẩm</td>
          <td class="cost order"></td>
        </tr>
        
        <tr>
          <td>Khuyến mãi</td>
          <td class="cost promotion"></td>
        </tr>

        <tr class="total-cost">
          <td>Tổng tiền thanh toán</td>
          <td class="cost total"></td>
        </tr>
      </table>

      <!--Modified. Change to <button>-->
      <div class="order-selection">
        <button class="order-option">
          <a href="../account-management/my-order-feedback.php" >
            <i class="fa-solid fa-star" style="color:#FEC30D"></i>
            ĐÁNH GIÁ
          </a>
        </button>

        <button class="order-option" id="order-report">BÁO CÁO</button>                  
        <!--START - Modal "Report"-->
          <div id="modal-report-container">
            <form id="modal-report">
                <button id="close-report"><i class="fa-solid fa-xmark"></i></button><br>
                <label>Email liên hệ</label><br>
                <input type="email" placeholder="Email của bạn" id="customer-email"><br>
                
                <label>Báo cáo</label><br>
                <textarea placeholder="Nhập vấn đề của bạn" id="report-textfield"></textarea><br>
                
                <input type="Submit" id="btn-submit-report" value="Báo cáo">
            </form>
          </div>
        <!--END - Modal "Report"-->
        <button class="order-option cancel-order" onclick="confirm_cancel()">HỦY ĐƠN HÀNG</button>
      </div>
    </div>
  <!--DETAIL ORDER--END-->  
</div>
<script src="../../../js/my-order/detail.js"></script>
<?php
    include("../header-footer-nav/footer.php");
?>