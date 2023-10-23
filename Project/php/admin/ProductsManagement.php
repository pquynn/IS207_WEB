<!-- Init basic layout, components. Modified 10/23/2023 by Quyen. 
    Not have: 
    + export button event
    + filter button event
    + responsive
-->
    <!-- start: admin navigation -->
    <?php 
        $title = "Quản lý sản phẩm";
        include("AdminNavigation.php");
    ?>
    <!-- end: admin navigation -->
    

    <!-- start: main section -->
    <div class="section">
        <h2 class="section_heading">Sản phẩm</h2>
        
        <!-- start: search bar, button section -->
            <?php include("SectionTopContent.php"); ?>
        <!-- end: search bar, button section -->

        <!-- start: section_botton-content -->
        <div class="section_bottom-content">
            <!-- start: admin table -->
            <div class="admin-table">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>...</th>
                        <th>Thao tác</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><div class="table-img"></div></td>
                        <td> Giày ... </td>
                        <td>10000đ</td>
                        <td>...</td>
                        <td class="action">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#alert"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- end: admin table -->

            <!-- start: pagination in admin -->
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
            <!-- end: pagination in admin -->
        </div>

    </div>
    <!-- end: main section -->


    <!-- start of Modal of Add new elements. Modified 10/22/2023 by Quyen -->
        <?php include("ModalAddNewProduct.php"); ?>
    <!-- end of Modal of Add new elements-->

    <!-- start of warning message when click del-btn -->
        <?php 
            $alert_message = "xóa sản phẩm";
            $alert_action = "Xóa";
            include("ModalAlert.php"); 
        ?>
    <!-- end of warning message when click del-btn -->

</body>
</html>
