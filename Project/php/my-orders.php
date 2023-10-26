<?php
    $title = "Danh sách đơn hàng của tôi";
    include("header.php");
?>

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

      <!--Table list orders--start-->
      <table class="table-list-orders">
        <tr>  
            <td>Mã đơn hàng</td>
            <td>Ngày hóa đơn</td>   
            <td>SĐT</td>   
            <td>Tên khách hàng</td>                  
            <td>Địa chỉ</td>
            <td>PTTT</td>   
            <td>Trạng thái</td>    
            <td>Tổng sản phẩm</td>   
            <td>Tổng tiền</td> 
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
    include("footer.php");
?>