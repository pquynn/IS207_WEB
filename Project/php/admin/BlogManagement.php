    <link rel="stylesheet" href="../../css/admin/admin-blog-style.css">
    
    <!-- start: admin navigation -->
    <?php 
        $title = "Quản lý Blogs";
        include("AdminNavigation.php");
    ?>
    <!-- end: admin navigation -->
    

    <!-- start: main section -->
    <div class="section">
        <h2 class="section_heading">Quản lý Blogs</h2>
        
        <!-- start: search bar, button section -->
        <div class="section_top-content">

            <div class="top-content left">
                <div class="admin-search-container">
                    <div class="search-bar-box">
                        <input type="text" id="search" placeholder="Tìm kiếm..." class="form-control ">
                        <a href="#" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                </div>
            </div>

            <div class="top-content right">
                <button class="btn-admin btn-add" data-bs-toggle="modal" data-bs-target="#add-new">
                    <i class="fa-solid fa-plus"></i>Thêm mới
                </button>
            </div>
        </div>
        <!-- end: search bar, button section -->

        <!-- start: section_botton-content -->
        <div class="section_bottom-content">
            <div class="blogBox">
            <div class="mainBlog">

                <div class="blog ">
                    <div class="blog-information">
                        <img src="../../img/nike.jpg" alt="" >
                        <p >In love with the classic look of '80s basketball but have a thing for
                            the fast-paced culture of today's game? Meet the Nike Court Vision Low. A classic remixed with
                            at least 20% recycled materials by weight, its crisp upper and stitched overlays keep the soul
                            of the original style. The plush, low-cut collar keeps it sleek and comfortable for your
                            world.<br>Link: https//...</p>
                    </div>
                    <a id="btnXoa" >
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>

                <div class="blog">
                    <div class="blog-information">
                        <img src="../../img/nike.jpg" alt="">
                        <p>In love with the classic look of '80s basketball but have a thing for
                            the fast-paced culture of today's game? Meet the Nike Court Vision Low. A classic remixed with
                            at least 20% recycled materials by weight, its crisp upper and stitched overlays keep the soul
                            of the original style. The plush, low-cut collar keeps it sleek and comfortable for your
                            world.<br>Link: https//...</p>
                    </div>
                    <a id="btnXoa">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>

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
    </div>
    <!-- end: main section -->


    <!-- start of Modal of Add new elements. Modified 10/22/2023 by Quyen -->
    <?php include("ModalAddNewCategory.php"); ?>
    <!-- end of Modal of Add new elements-->

    <!-- start of warning message when click del-btn -->
        <?php 
            $alert_message = "xóa danh mục";
            $alert_action = "Xóa";
            include("ModalAlert.php"); 
        ?>
    <!-- end of warning message when click del-btn -->

</body>
</html>
