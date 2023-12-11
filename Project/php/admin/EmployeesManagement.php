    <!-- start: admin navigation -->
    <?php 
        $title = "Quản lý nhân viên";
        include("AdminNavigation.php");
    ?>
    <!-- end: admin navigation -->
    
    <!-- start: main section -->
    <div class="section">
        <h2 class="section_heading">Nhân viên</h2>
        
        <!-- start: search bar, button section -->
            <?php include("SectionTopContent.php"); ?>
        <!-- end: search bar, button section -->

        <!-- start: section_botton-content -->
        <div class="section_bottom-content">
            <!-- start: admin table -->
            <div class="admin-table">
                <table >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên đăng nhập</th>
                            <th>Điện thoại</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Địa chỉ</th>
                            <th>Ngày thêm</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
    <?php include("ModalAddNewEmployee.php"); ?>
    <!-- end of Modal of Add new elements-->

    <script src="../../js/admin/common.js"></script>
    <script src="../../js/admin/employees-management.js"></script>
</body>
</html>
