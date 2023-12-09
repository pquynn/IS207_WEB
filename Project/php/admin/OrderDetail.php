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
        <li class= "breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
    </ol>

    <div class="customer-infomation">
        <h3>Mã đơn hàng: #
            <span id="orderId"></span>
            <span class="order-status"></span>
            <button class="btn-edit-info" data-bs-toggle="modal" data-bs-target="#edit-order-status">
                <i class="fa-solid fa-pen "></i>
            </button>
        </h3>
        <!--date order-->
        <div class="date-order">
            <i class="fa-solid fa-calendar"></i>
            Ngày đặt hàng: 
            <span></span>
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
                    <li> 
                        Họ tên:
                        <span id="cus-name"></span>
                    </li>
                    <li> 
                        SĐT:
                        <span id="cus-tel"></span>
                    </li> 
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
                    <li id="cus-add"></li>
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
                    <li id="cus-pay"></li>
                </ul>
            </li>


        </ul>
    </div>

    <!--Information of products in order-->
    <div class="order-infomation admin-table">
        <table>
            <thead>
                <td colspan="7">Sản phẩm</td>
                <tr>
                    <th>Mã đơn hàng</th>
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

        <!--Order cost-->
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
    </div>
</div>
<!--MAIN SECTION----END-->

<!--Modal edit customer's information-->
<?php
    include("./ModalEditCustomerInfor.php");
    include("./ModalEditCustomerAddress.php");
    include("./ModalEditCustomerPayment.php");
    include("./ModalEditOrderStatus.php");
?>
<!---->
<script src="../../js/admin/Order/order-detail"></script>