<?php
    include("admin-order-navigation.php");
?>

<!--MAIN SECTION----START-->
<div class="admin-orders">
    <h2>Danh sách đơn hàng</h1>
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
    <div class="search-bar">    
        <input type="text" name="" placeholder="Tìm kiếm đơn hàng..." class="search-field">
        <a href="#" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></a>            
    </div>

    <!--Table list orders-->
    <table class="list-orders">
        <th colspan="7">Danh sách đơn hàng</th>
        <tr>
            <td><input type="checkbox"></td>   
            <td>Mã đơn hàng</td>   
            <td>Ngày</td>   
            <td>PTTH</td>   
            <td>Tên khách hàng</td>   
            <td>Trạng thái</td>   
            <td>Trị giá</td>   
        </tr>

        <tr>
            <td><input type="checkbox"></td>
            <td>A123</td>   
            <td>dd/mm/yyyy</td>   
            <td>Momo</td>   
            <td>ABCD EFGH IJKLMN</td>   
            <td>Giao hàng thành công</td>   
            <td>$9999</td>   
        </tr>
    </table>

    <!--Pagination-->
    <div class="pagination">
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