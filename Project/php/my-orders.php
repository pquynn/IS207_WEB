<?php
    include("header.php");
?>

  <!--LIST-ORDERS START-->
    <div class="list-orders">
      <h1>Đơn hàng của tôi</h1>

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
          <td>Ngày đặt hàng</td>
          <td>PTTT</td>
          <td>Trạng thái</td>
          <td>Trị giá</td>
        </tr>

        <tr>
          <td>A123</td>
          <td>18/10/2023</td>
          <td>Momo</td>
          <td>Giao hàng thành công</td>
          <td>152.000đ</td>
        </tr>
        <tr>
          <td>A123</td>
          <td>18/10/2023</td>
          <td>Momo</td>
          <td>Giao hàng thành công</td>
          <td>152.000đ</td>
        </tr>
        <tr>
          <td>A123</td>
          <td>18/10/2023</td>
          <td>Momo</td>
          <td>Giao hàng thành công</td>
          <td>152.000đ</td>
        </tr>
        <tr>
          <td>A123</td>
          <td>18/10/2023</td>
          <td>Momo</td>
          <td>Giao hàng thành công</td>
          <td>152.000đ</td>
        </tr>

      </table>
      <!--Table list orders--end-->
    
      <!--pagination--start-->
      <div class="pagination" id="pagination-my-orders">
        <a href="#">&laquo;</a>
        <a class="active" href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
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