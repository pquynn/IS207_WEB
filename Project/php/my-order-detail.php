<?php
    include("header.php");
?>

<!--DETAIL ORDER--START-->
<div class="my-order-detail">
      <div class="title-order-detail">
          <h2>Chi tiết đơn hàng #A123</h2>
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
            <li>Email: </li>
            <li>SĐT: </li> 
          </ul>
        </li>
        
        <li class="box-info" id="info-2">
          <i class="fa-solid fa-truck-fast icon-info"></i>
              
          <ul class="info">
            <li class="header-info">Vận chuyển</li>
            <li>ĐVVC: </li>
            <li>Thanh toán: </li>
            <li>Trạng thái: </li> 
          </ul>
        </li>

        <li class="box-info" id="info-3">
          <i class="fa-solid fa-location-dot icon-info"></i>
              
          <ul class="info">
            <li class="header-info">Địa chỉ người nhận</li>
            <li> 123 ABC</li>
          </ul>
        </li>
      </ul>
      
      <table class="table-detail-order">
        <tr>
          <td>Sản phẩm</td>
          <td>Số lượng</td>
          <td>Tổng</td>
        </tr>

        <tr>
          <td>Tên sản phẩm 1</td>
          <td>n</td>
          <td>cost1</td>
        </tr>
      </table>

      <table class="order-cost">
        <tr>
          <td>Tổng tiền sản phẩm</td>
          <td class="cost order">$9999</td>
        </tr>
        <tr>
          <td>Chi phí vận chuyển</td>
          <td class="cost delivery">$9999</td>
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
    include("footer.php");
?>