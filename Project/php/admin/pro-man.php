<!-- admin navigation -->
    <?php
        $title = "Quản lý sản phẩm";
        include("admin-nav.php")
    ?>

    <!-- start: main section -->
    <div class="section">

        <h2 class="section_heading">Sản phẩm</h2>

        <!-- start: search bar, button section -->
        <div class="section_functions">

            <div class="functions-left">
                <div class="search-bar admin">
                    <input type="text" name="" placeholder="Tìm kiếm..." class="search-field">
                    <a href="#" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
    
                <button class="btn btn-filter  admin">
                    <i class="fa-solid fa-filter"></i>Bộ lọc
                </button>
            </div>
            
            <div class="functions-right">
                <button class="btn btn-export admin">
                    <i class="fa-solid fa-download"></i>Export
                </button>
            
                <button class="btn btn-add  admin">
                    <i class="fa-solid fa-plus"></i>Thêm mới
                </button>
            </div>
        
        </div>
        <!-- start: search bar, button section -->


        <div class="section_table">
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