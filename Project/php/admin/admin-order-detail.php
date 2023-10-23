<?php
    include("admin-order-navigation.php");
?>
<!--MAIN SECTION----START-->
<div class="admin-order-detail">
    <h2>Chi tiết đơn hàng</h2>
    <div class="customer-infomation">
        <h3>Mã đơn hàng: 
            <span class="order-status">Đang xử lý</span>
        </h3>
        <!--date order-->
        <div class="date-order">
            <i class="fa-solid fa-calendar"></i>
            <span>dd/mm/yyyy</span>
        </div>

        <!--Change status, button print, button save-->
        <div class="box-change_status-print-save">
            <div class="change-status">
                <span>Trạng thái đơn hàng</span>                
                <i class="fa-solid fa-angle-down"></i>

                <ul class="option-status">
                    <li>Đang xử lý</li>
                    <li>Giao hàng thành công</li>
                    <li>Đã hủy</li>  
                </ul>                      
            </div>

            <i class="fa-solid fa-print icon"></i>
            <i class="fa-solid fa-floppy-disk icon"></i>            
        </div>

        <!--3 boxes information of customer-->
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
        
        <!--2 boxes: Payment method, Note-->
        <ul class="info-customer">
            <li class="box-info">
                <ul class="info">
                    <li class="header-info">Thông tin thanh toán</li>
                    <li>Momo: 09123456789</li>
                    <li>Tên: </li>
                </ul>
            </li>

            <li class="box-info" id="box-text-note">
                <p class="header-info">Ghi chú</p>
                <textarea placeholder="Nhập ghi chú" id="area-text-note"></textarea>
            </li>
        </ul>
    </div>

    <!--Information of products in order-->
    <div class="order-infomation">
        <table class="table-products">
            <th colspan="4">Sản phẩm</th>
            <tr>
                <td colspan="2">Tên Sản phẩm</td>
                <td>Số lượng</td>
                <td>Tổng</td>
            </tr>

            <tr>
                <td class="col-checkbox"><input type="checkbox"></td>
                <td>Tên sản phẩm 1</td>
                <td>n</td>
                <td>cost1</td>
            </tr>
            <tr>
                <td class="col-checkbox"><input type="checkbox"></td>
                <td>Tên sản phẩm 1</td>
                <td>n</td>
                <td>cost1</td>
            </tr>
            <tr>
                <td class="col-checkbox"><input type="checkbox"></td>
                <td>Tên sản phẩm 1</td>
                <td>n</td>
                <td>cost1</td>
            </tr>
        </table>

        <!--Order cost-->
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
    </div>
</div>
<!--MAIN SECTION----END-->