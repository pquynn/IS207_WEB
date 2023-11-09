 <!--Not have line chart and pie chart. Modified 10/23/2023 by Quyen  -->
 
 <!-- start: admin navigation -->
    <?php 
        $title = "Thống kê";
        include("AdminNavigation.php");
    ?>
    <!-- end: admin navigation -->
    
    <link rel="stylesheet" href="../../css/admin/Dashboard.css">


    <!-- start: main section -->
    <div class="section">
        <h2 class="section_heading">Thống kê</h2>
        
        <!-- start: button section -->
        <div class="section_top-content dashboard">
            <div class="btn-container">
                <!-- calendar nên dùng button hay input date? -->
                <div class="dropdown">
                    <button class="btn-admin btn-calendar dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-calendar"></i>Thời gian
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Ngày hiện tại</a></li>
                      <li><a class="dropdown-item" href="#">1 tháng trước</a></li>
                      <li><a class="dropdown-item" href="#">3 tháng trước</a></li>
                      <li><a class="dropdown-item" href="#">1 năm trước</a></li>
                    </ul>
                  </div>
        
                <button class="btn-admin btn-export admin">
                    <i class="fa-solid fa-download"></i>Export
                </button>
            </div>
        </div>
        <!-- end: button section -->

        <!-- start: section_botton-content -->
        <div class="section_bottom-content">
            <!-- start: to do lists -->
            <div class="todo-container card">
                <div class="card-body">
                    <p class="card-title container-heading">Danh sách cần làm</p>
                    <div class="row">
                        <div class="col pending-box">
                            <p class="number-display">0</p>
                            <p>Chờ xác nhận</p>
                        </div>

                        <div class="col delivering-box">
                            <p class="number-display">0</p>
                            <p>Đang giao hàng</p>
                        </div>

                        <div class="col canceling-box">
                            <p class="number-display">0</p>
                            <p>Đơn bị hủy</p>
                        </div>

                        <div class="col out-of-stock-box">
                            <p class="number-display">0</p>
                            <p>Sản phẩm hết hàng</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: to do lists -->
                

            <!-- start: overview -->
                <div class="overview-container">
                    <p class="container-heading">Tổng quan</p>

                    <div class="row gap-4">
                        <div class="card col total-revenue">
                            <div class="card-body">
                                <p>Tổng doanh thu</p>
                                <p class="number-display">20000 đ</p>
                            </div>
                        </div>

                        <div class="card col will-pay">
                            <div class="card-body">
                                <p>Chưa thanh toán</p>
                                <p class="number-display">20000 đ</p>
                            </div>
                        </div>

                        <div class="card col paid">
                            <div class="card-body">
                                <p>Đã thanh toán</p>
                                <p class="number-display">20000 đ</p>
                            </div>
                        </div>

                        <div class="card col total-orders">
                            <div class="card-body">
                                <p>Tổng số đơn hàng</p>
                                <p class="number-display">300</p>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- end: overview -->


            <div class="row">
                <!-- start: revenue by categories chart -->
                <div class="col revenue-by-categories-pie-chart-container">
                    <p class="container-heading">Doanh thu theo loại sản phẩm</p>

                    <div class="card">
                        <div class="card-body">
                            *javascript
                        </div>
                    </div>
                </div>
                <!-- end: revenue by categories chart -->

                <!-- start: best seller table -->
                <div class="col best-seller">
                    <p class="container-heading">Sản phẩm bán chạy</p>

                    <div class="admin-table">
                        <table>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng bán</th>
                                <th>Giá</th>
                            </tr>
                            <tr>
                                <td>Ảnh</td>
                                <td>Giày thể thao </td>
                                <td>400</td>
                                <td>100000 đ</td>
                            </tr>
                            <tr>
                                <td>Ảnh</td>
                                <td>Giày thể thao </td>
                                <td>400</td>
                                <td>100000 đ</td>
                            </tr>
                            <tr>
                                <td>Ảnh</td>
                                <td>Giày thể thao </td>
                                <td>400</td>
                                <td>100000 đ</td>
                            </tr>
                            <tr>
                                <td>Ảnh</td>
                                <td>Giày thể thao </td>
                                <td>400</td>
                                <td>100000 đ</td>
                            </tr>
                            <tr>
                                <td>Ảnh</td>
                                <td>Giày thể thao </td>
                                <td>400</td>
                                <td>100000 đ</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- end: best seller table -->
            </div>
            
            <!-- start: statistic line chart -->
            <div class="statistic-graph-container">
                <div class="col revenue-line-chart-container">
                    <p class="container-heading">Thống kê doanh thu</p>

                    <div class="card">
                        <div class="card-body">
                            *javascript
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: statistic line chart -->
        </div>
    </div>
    <!-- end: section bottom content -->


</body>
</html>