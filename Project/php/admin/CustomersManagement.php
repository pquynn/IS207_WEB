    <!-- start: admin navigation -->
    <?php 
        $title = "Quản lý khách hàng";
        include("AdminNavigation.php");
    ?>
    <!-- end: admin navigation -->
    

    <!-- start: main section -->
    <div class="section">
        <h2 class="section_heading">Khách hàng</h2>
        
        <!-- start: search bar, button section -->
        <div class="section_top-content">

            <div class="top-content left">
                <div class="admin-search-container">
                    <div class="search-bar-box">
                        <input type="text" id="search" placeholder="Tìm kiếm..." class="form-control ">
                        <!-- <a href="#" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></a> -->
                    </div>
                </div>
            </div>

            <div class="top-content right">
                <button class="btn-admin btn-export">
                    <i class="fa-solid fa-download"></i>Export
                </button>
            </div>
        </div>
        <!-- end: search bar, button section -->

        <!-- start: section_botton-content -->
        <div class="section_bottom-content">
            <!-- start: admin table -->
            <div class="admin-table">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên đăng nhập</th>
                            <th>Điện thoại</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Địa chỉ</th>
                            <th>Ngày thêm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <!-- <tr>
                        <td>1</td>
                        <td>nguyenvan</td>
                        <td>0123456789</td>
                        <td>Nguyễn Văn</td>
                        <td>13/07/2000</td>
                        <td>Nữ</td>
                        <td>Linh Trung, Thủ Đức</td>
                        <td>30</td>
                        <td>18/10/2023</td>
                        <td class="action">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#alert" class="btn-delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr> -->
                </table>
            </div>
            <!-- end: admin table -->

            <!-- start: pagination in admin -->
            <div class="pagination admin">
            </div>
            <!-- end: pagination in admin -->
        </div>

    </div>
    <!-- end: main section -->


    <!-- start of Modal of Add new elements. Modified 10/22/2023 by Quyen -->
    <?php include("ModalAddNewCustomer.php"); ?>
    <!-- end of Modal of Add new elements-->

    <script src="../../js/admin/common.js"></script>
    <script src="../../js/admin/customers-management.js"></script>
</body>
</html>
