
<link rel="stylesheet" href="../../css/admin-blog-style.css">
    
    <!-- Start of header -->
    <?php 
        $title = "Blog";
        include("header.php"); ?>
    <!-- End of header -->

    <div class="blogBox">
        <h2>Blogs</h2>
        <div class="mainBlog">

            <div class="blog">
                <div class="blog-information">
                    <img src="../../img/nike.jpg" alt="">
                    <p>In love with the classic look of '80s basketball but have a thing for
                        the fast-paced culture of today's game? Meet the Nike Court Vision Low. A classic remixed with
                        at least 20% recycled materials by weight, its crisp upper and stitched overlays keep the soul
                        of the original style. The plush, low-cut collar keeps it sleek and comfortable for your
                        world.<br>Link: https//...</p>
                </div>
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
            </div>

            <!-- pagination -->
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <span class="ellipsis">...</span>
                <a href="#">10</a>
                <a href="#">&raquo;</a>
            </div>
        </div>
    </div>

    <!-- Start of footer -->
    <?php include("footer.php"); ?>
        <!-- End of footer -->