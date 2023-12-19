<!-- CSS feat -->
<link rel="stylesheet" href="../../css/admin/admin-orders.css"/>

<?php
    $role_id =1;
    $title = "Danh sách đơn hàng";
    include("AdminNavigation.php");
?>

<!--MAIN SECTION----START-->
<div class="admin-orders">
    <h2 class="section_heading">Danh sách đơn hàng</h2>

    <ol class="breadcrumb">
        <li class= "breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
    </ol>
    <!--Orders' date-->
    <div class="date-orders">
        <h6>
        <i class="fa-solid fa-calendar"></i>            
            Ngày hóa đơn
        </h6>

        <div class="input-date-range row">
            <div class="col-2">
                <input type = "date" id="fromdate" class="input-date form-control" placeholder="Từ ngày">
            </div>
            <div class="col-2 p-0">
                <input type = "date" id="todate" class="input-date form-control" placeholder="Đến ngày">
            </div>
            <div class="col-1">
                <button class="btn-admin btn-add" id="btn-filter-date" value="Tìm">Tìm</button>
            </div>
        </div>
    </div>

    <!--Dropdown choose status for orders-->
    <select name="status" id="choose-status">
        <option value="">Trạng thái đơn hàng</option>
        <option value="prepare">Đang chuẩn bị hàng</option>
        <option value="shipping">Đang giao hàng</option>
        <option value="order-success">Giao thành công</option>
        <option value="order-cancel">Đã hủy</option>                 
    </select>
    
    <!--Search bar-->
    <div class="admin-search-container">
        <div class="search-bar-box">
            <input type="text" id="search" placeholder="Tìm kiếm theo mã đơn hàng" class="form-control ">
            <!--<a href="#" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></a>-->
        </div>
    </div>

    <!--Table list orders-->
    <div class="admin-table">
        <table class="list-orders">
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
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    

    <!--Pagination-->
    <div class="pagination admin">
    </div>
</div>
<!--MAIN SECTION----END-->

<script src="../../js/admin/Order/order-management"></script>