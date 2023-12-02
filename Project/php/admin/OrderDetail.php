<!-- CSS feat -->
    <link rel="stylesheet" href="../../css/admin/admin-orders.css"/>
    <link rel="stylesheet" href="../../css/admin/admin-order-detail.css"/>

<?php
    $title = "Chi tiết đơn hàng";
    include("./AdminNavigation.php");
?>
<!--MAIN SECTION----START-->
<div class="admin-order-detail">
    <h2 class="section_heading">Chi tiết đơn hàng</h2>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../../php/admin/OrdersManagement.php">Danh sách đơn hàng</a></li>
        <li class= "breadcrumb-item active" aria-current="page">Chi tiết đơn hàng #A123</li>
    </ol>

    <div class="customer-infomation">
        <h3>Mã đơn hàng: 
            <span class="order-status">Giao hàng thành công</span>
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
            <i class="fa-solid fa-user icon-info"></i>
                    
                <ul class="info">
                    <li class="header-info">Thông tin người nhận 
                        <button class="btn-edit-info" data-bs-toggle="modal" data-bs-target="#edit-customer-info">
                            <i class="fa-solid fa-pen "></i>
                        </button>
                    </li>
                    <li>Họ tên: </li>
                    <li>SĐT: </li> 
                </ul>
            </li>
            
            <li class="box-info" id="info-2">
                <i class="fa-solid fa-location-dot icon-info"></i>
                    
                <ul class="info">
                    <li class="header-info">Địa chỉ người nhận
                        <button class="btn-edit-info" data-bs-toggle="modal" data-bs-target="#edit-customer-address">
                            <i class="fa-solid fa-pen "></i>
                        </button>
                    </li>
                    <li> 123 ABC</li>
                </ul>
            </li>

            <li class="box-info" id="info-3">
            <i class="fa-solid fa-credit-card icon-info"></i>
                    
                <ul class="info">
                    <li class="header-info">Phương thức thanh toán
                        <button class="btn-edit-info" data-bs-toggle="modal" data-bs-target="#edit-customer-payment">
                            <i class="fa-solid fa-pen "></i>
                        </button>
                    </li>
                    <li>Momo: 09123456789</li>
                </ul>
            </li>


        </ul>
    </div>

    <!--Information of products in order-->
    <div class="order-infomation admin-table">
        <table>
            <td colspan="8">Sản phẩm</td>
            <tr>
                <td>Mã đơn hàng</td>
                <td>Mã sản phẩm</td>
                <td>Kích thước</td>
                <td>Tên sản phẩm</td>
                <td>Hình ảnh</td>
                <td>Số lượng</td>
                <td>Tổng tiền</td>
                <td></td>
            </tr>

            <tr>
                <td>#A123</td>
                <td>SS001</td>
                <td>38</td>
                <td>Product name</td>
                <td>xem hình ảnh</td>
                <td>1</td>
                <td>$9999</td>
                <td class="action">
                    <a href="#"><i class="fa-solid fa-pen"></i></a>
                    <button class="btn-delete" onclick="btn_trash_order()"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>#A123</td>
                <td>SS001</td>
                <td>38</td>
                <td>Product name</td>
                <td>xem hình ảnh</td>
                <td>1</td>
                <td>$9999</td>
                <td class="action">
                    <a href="#"><i class="fa-solid fa-pen"></i></a>
                    <button class="btn-delete" onclick="btn_trash_order()"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>#A123</td>
                <td>SS001</td>
                <td>38</td>
                <td>Product name</td>
                <td>xem hình ảnh</td>
                <td>1</td>
                <td>$9999</td>
                <td class="action">
                    <a href="#"><i class="fa-solid fa-pen"></i></a>
                    <button class="btn-delete" onclick="btn_trash_order()"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        </table>

        <!--Order cost-->
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
    </div>
</div>
<!--MAIN SECTION----END-->

<!--Modal edit customer's information-->
<?php
    include("./ModalEditCustomerInfor.php");
    include("./ModalEditCustomerAddress.php");
    include("./ModalEditCustomerPayment.php");
?>
<!---->

<script src="../../js/admin/Order/order"></script>