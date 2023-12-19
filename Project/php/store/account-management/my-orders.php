
<?php
    $title = "Danh sách đơn hàng của tôi";
    include("../header-footer-nav/header.php");
?>

<!-- MAIN SECTION START -->
  <!-- NAVIGATION ACCOUNT START -->
    <?php include("../header-footer-nav/navigation-account.php");?>
  <!-- NAVIGATION ACCOUNT START -->
    
  <!--LIST-ORDERS START-->
    <div class="list-orders">
      <!--breadscrumb-->
      <ul class="breadcrumb-my-order">
        <li class="breadcrumb-current-page">Danh sách đơn hàng</li> / 
      </ul>

      <h2>Danh sách đơn hàng của tôi</h2>
      <!--search bar-->
      <div class="search-bar">
        <input type="text" name="" placeholder="Nhập mã đơn hàng" class="search-field" id="search">
      </div>
      <!--          -->

      <!-- Change table style. modified 10/28 by Quyen --> 
      <!--Table list orders--start-->
      <div class="store-table orders-list">
        <table>
          <thead>
          <tr>  
              <th>Mã đơn hàng</th>
              <th>Ngày hóa đơn</th>   
              <th>SĐT</th>   
              <th>Tên khách hàng</th>                  
              <th>Địa chỉ</th>
              <th>PTTT</th>   
              <th>Trạng thái</th>    
              <th>Tổng sản phẩm</th>   
              <th>Tổng tiền</th>
              <th></th> 
          </tr>
          </thead>

          <tbody></tbody>
        </table>
      </div>
      <!--Table list orders--end-->
    
      <!--pagination--start-->
      <div class="pagination"  id="pagination-my-orders">
      </div>
      <!--pagiantion--end-->
    </div>
  <!--LIST-ORDERS END-->
</div>
<!--MAIN SECTION END-->
<script src="../../../js/my-order/my-order-management"></script>
<?php
    include("../header-footer-nav/footer.php");
?>
