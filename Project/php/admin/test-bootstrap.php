<!-- Change html into php. Modified 10/18/2023 by Quyen -->



<!-- admin navigation -->
<?php
        $title = "Sản phẩm";
        include("AdminNavigation.php");
    ?>


    <!-- start: main section -->
    <div class="section">

        <!-- section_functions -->
        <?php
            $heading = "Sản phẩm";
            include("section_functions.php");
        ?>

       <?php
        include("ModalAddNewProduct.php");
       ?>

    
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
                            <a href="#"><i class="fa-solid fa-pen"></i></a>
                            <a href="#"><i class="fa-solid fa-trash"></i></a>
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

</body>
</html>