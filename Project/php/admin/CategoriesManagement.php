<!-- start: admin navigation -->
<?php 
    $title = "Quản lý danh mục";
    include("AdminNavigation.php");
?>
<!-- end: admin navigation -->
    
    <!-- start: main section -->
    <div class="section">
        <h2 class="section_heading">Danh mục</h2>
        
        <!-- start: search bar, button section -->
            <?php include("SectionTopContent.php"); ?>
        <!-- end: search bar, button section -->

        <!-- start: section_botton-content -->
        <div class="section_bottom-content">
            <!-- start: admin table -->
            <div class="admin-table">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên danh mục</th>
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
    <?php include("ModalAddNewCategory.php"); ?>
    <!-- end of Modal of Add new elements-->
    <script src="../../js/admin/common.js"></script>
    <script type="module" src="../../js/admin/categories-management.js"></script>
    
</body>
</html>
