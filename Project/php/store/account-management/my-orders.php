
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
        <input type="text" name="" placeholder="Tìm kiếm đơn hàng..." class="search-field">
        <a href="#" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></a>
      </div>
      <!--          -->

      <!-- Change table style. modified 10/28 by Quyen --> 
      <!--Table list orders--start-->
      <div class="store-table">
        <table>
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
          </tr>

          <tr>
              <td>A123</td>
              <td>dd/mm/yyyy</td>   
              <td>0912345678</td>   
              <td>ABC DEF GHIJK</td>                  
              <td>123 ABCD</td>
              <td>Momo</td>               
              <td>Giao hàng thành công</td>
              <td>3</td>                 
              <td>$9999</td>  
          </tr>
          <tr>
              <td>A123</td>
              <td>dd/mm/yyyy</td>   
              <td>0912345678</td>   
              <td>ABC DEF GHIJK</td>                  
              <td>123 ABCD</td>
              <td>Momo</td>               
              <td>Giao hàng thành công</td>
              <td>3</td>                 
              <td>$9999</td>   
          </tr>
          <tr>
              <td>A123</td>
              <td>dd/mm/yyyy</td>   
              <td>0912345678</td>   
              <td>ABC DEF GHIJK</td>                  
              <td>123 ABCD</td>
              <td>Momo</td>               
              <td>Giao hàng thành công</td>
              <td>3</td>                 
              <td>$9999</td>   
          </tr>

        </table>
      </div>
      <!--Table list orders--end-->
    
      <!--pagination--start-->
      <div class="pagination"  id="pagination-my-orders">
        <a href="#">&laquo;</a>
        <a class="active" href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <span class="ellipsis">...</span>
        <a href="#">10</a>
        <a href="#">&raquo;</a>
      </div>
      <!--pagiantion--end-->
    </div>
  <!--LIST-ORDERS END-->
</div>
<!--MAIN SECTION END-->

<?php
    include("../header-footer-nav/footer.php");
?>