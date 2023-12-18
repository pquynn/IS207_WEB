
<link rel="stylesheet" href="../../../css/style-components/homepage.css">
<link rel="stylesheet" href="../../../css/store/blog.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <!-- Start of header -->
    <?php 
        $title = "Trang chủ";
        include("../header-footer-nav/header.php"); ?>
    <!-- End of header -->

    <!-- MAIN SLIDER: START -->
    <div class="main-slider">
      <!-- SLIDER COTAINER: STAR -->
      <div class="slider-container">
        <!-- img -->
        <img id="slider-1" src="../../../img/slider_img/slider1.webp" alt="" />
        <img id="slider-1" src="../../../img/slider_img/slider2.webp" alt="" />
        <img id="slider-1" src="../../../img/slider_img/slider3.jpg" alt="" />

        <!-- slider btn -->
        <div class="slider-bnt">
          <button class="btn-back">
            <span class="material-symbols-outlined"> keyboard_arrow_left </span>
          </button>
          <button class="btn-next">
            <span class="material-symbols-outlined"> chevron_right </span>
          </button>
        </div>
      </div>
      <!-- SLIDER COTAINER: END -->
      <!-- BLOG: START -->
      <!-- <p class="myText okdc chuaw">HELLO</p> -->

      <div class="blog">
      </div>
      <!-- BLOG: END -->

      <!-- BEST SELLER: START -->
      <div class="gallery" id="galleryBestSeller">
        <h4>BEST SELLER</h4>

        <div class="product-list">
        </div>
      </div>
      <!-- BEST SELLER: END -->

      <!-- PRODUCT FOR MEN & WOMAN: start -->
      <div class="collection">
        <div class="collection-item zoom-when--hover">
          <!-- img -->
          <div class="zoom-img--container">
            <img
              class="collection-img zoom-img"
              src="https://bisuth-store-demo.myshopify.com/cdn/shop/files/11.png?v=1657512855" />
          </div>
          <!-- text -->
          <div class="collection-text">
            <p class="">Giày nam</p>
            <a class="" href="#"
              >Xem thêm
              <span class="material-symbols-outlined"> double_arrow </span></a
            >
          </div>
        </div>

        <div class="collection-item zoom-when--hover">
          <!-- img -->
          <div class="zoom-img--container">
            <img
              class="collection-img zoom-img"
              src="https://bisuth-store-demo.myshopify.com/cdn/shop/files/12.png?v=1657513152" />
          </div>
          <!-- tetx -->
          <div class="collection-text">
            <p class="">Giày nữ</p>
            <a class="" href="#"
              >Xem thêm
              <span class="material-symbols-outlined"> double_arrow </span></a
            >
          </div>
        </div>
      </div>
      <!-- PRODUCT FOR MEN & WOMAN: end -->

      <!-- NEW ARRIVALS: START -->
      <div class="gallery" id="galleryNewProduct">
        <h4>SẢN PHẨM MỚI</h4>

        <div class="product-list">
        </div>
      </div>
      <!-- NEW ARRIVALS: END -->
    </div>
    <!-- MAIN SLIDER: END -->

    <script src="../../../js/homepage-shopping/homepage.js"></script>

    <!-- Start of footer -->
    <?php include("../header-footer-nav/footer.php"); ?>
        <!-- End of footer -->