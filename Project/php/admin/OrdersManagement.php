<!-- CSS feat -->
<link rel="stylesheet" href="../../css/admin/admin-orders.css"/>

<?php
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
        <i class="fa-solid fa-calendar"></i>
        <span>dd/mm/yyyy - dd/mm/yyyy</span>
    </div>

    <!--Dropdown choose status for orders-->
    <div class="choose-status">
            <span>Trạng thái đơn hàng</span>                
            <i class="fa-solid fa-angle-down"></i>

            <ul class="list-status">
                <li>Đang xử lý</li>
                <li>Giao hàng thành công</li>
                <li>Đã hủy</li>  
            </ul>                      
    </div>
    
    <!--Search bar-->
    <div class="admin-search-container">
        <div class="search-bar-box">
            <input type="text" id="search" placeholder="Tìm kiếm..." class="form-control ">
            <a href="#" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>
    </div>

    <!--Table list orders-->
    <div class="admin-table">
        <table class="list-orders">
            <tr>
                <th><input type="checkbox"></th>   
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

            <tr>
                <td><input type="checkbox"></td>
                <td>A123</td>
                <td>dd/mm/yyy</td>   
                <td>0912345678</td>   
                <td>ABC DEF GHIJK</td>                  
                <td>123 ABCD</td>
                <td>Momo</td>   
                <td>Giao hàng thành công</td>   
                <td>3</td>   
                <td>$9999</td> 
                <td class="action">
                    <a href="OrderDetail.php"><i class="fa-solid fa-pen"></i></a>
                    <a href="#"><i class="fa-solid fa-trash"></i></a>
                </td> 
            </tr>
        </table>
    </div>
    

    <!--Pagination-->
    <div class="pagination admin">
        <a href="#">&laquo;</a>
        <a class="active" href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
    </div>
</div>
<!--MAIN SECTION----END-->