  <link rel="stylesheet" href="../../../css/store/product_list.css">
  <link rel="stylesheet" href="../../../css/style-components/pagination.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- Start of header -->
  <?php 
    $title = "Danh mục sản phẩm";
    include("../header-footer-nav/header.php"); ?>
  <!-- End of header -->

    <!-- PRODUCT-LIST--BODY: start -->
    <div class="product-list--body">
      <!-- CATEGORY-HEADER: START -->
      <div class="category-header">
        <!-- TITLE -->
        <h1 class="category-title">For Shoes</h1>
        <!-- breadcrum -->
        <nav class="product-list-link" aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="./homepage.php">Trang chủ</a></li>
            <li><a class="breadcrumb-item active" href="#">Danh mục</a></li>
          </ul>
        </nav>
        <!-- DESCRIPTION -->
        <p class="category-search-intro">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non sit
          adipiscing at habitasse lorem volutpat id. Ipsum urna tortor tempus
          hendrerit mauris, diam, ante. Sit ultricies sed mauri-s, consequat.
          Urna, eu tortor, feugiat id in. Pulvinar sit quis nibh mauris non
          cursus blandit. Vel amet malesuada vulputate auctor enim vitae. Enim
          mi et, fermentum imperdiet. Faucibus tellus a tincidunt arcu proin
          mattis egestas varius amet. Tortor tellus lobortis ut pretium nunc
          elit, ornare.
        </p>
      </div>
      <!-- CATEGORY-HEADER: ENS -->

      <!--Khung Filter và Sản phẩm-->
      <div class="filter-product">
        <!--Khung Filter-->
        <!-- left-col: start -->
        <div class="shop-filter">
          <h3>Lọc theo</h3>

          <!-- accordion: start -->
          <div class="accordion" id="accordionPanelsStayOpenExample">
            <!-- collection: start -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <!-- accordion-item header:start -->
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#panelsStayOpen-collapseOne"
                  aria-expanded="true"
                  aria-controls="panelsStayOpen-collapseOne">
                  Bộ sưu tập
                </button>
                <!-- accordion-item header:end -->
              </h2>

              <!-- accordion-item body: start  -->
              <div
                id="panelsStayOpen-collapseOne"
                class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-headingOne">
                <a href="#" class="accordion-body"> Sneaker </a>
                <a href="#" class="accordion-body"> Sneaker </a>
                <a href="#" class="accordion-body"> Sneaker </a>
                <a href="#" class="accordion-body"> Sneaker </a>
                <a href="#" class="accordion-body"> Sneaker </a>
                <!-- <a href="#" class="accordion-body see-more"> Xem thêm </a> -->
              </div>
              <!-- accordion-item body: start  -->
            </div>
            <!-- collection: end -->

            <!-- price: start -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#panelsStayOpen-collapseTwo"
                  aria-expanded="false"
                  aria-controls="panelsStayOpen-collapseTwo">
                  Giá
                </button>
              </h2>
              <div
                id="panelsStayOpen-collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                  <div class="price-range">
                    <div class="value-left">100</div>
                    <input
                      type="range"
                      min="100"
                      max="3000000"
                      value="1450000"
                      steps="1" />
                    <div class="value-right">3000000</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- price: end -->

            <!-- color: start -->
            <!-- <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#panelsStayOpen-collapseThree"
                  aria-expanded="false"
                  aria-controls="panelsStayOpen-collapseThree">
                  Màu
                </button>
              </h2>
              <div
                id="panelsStayOpen-collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body color-list">
                  <button
                    class="btn-color"
                    style="background-color: #7f6000"></button>
                  <button
                    class="btn-color"
                    style="background-color: #762e54"></button>
                  <button
                    class="btn-color"
                    style="background-color: #762e54"></button>
                  <button
                    class="btn-color"
                    style="background-color: #008000"></button>
                  <button
                    class="btn-color"
                    style="background-color: #d2f58d"></button>
                  <button
                    class="btn-color"
                    style="background-color: #324a7b"></button>
                </div>
              </div>
            </div> -->
            <!-- color: end -->

            <!-- size: start -->
            <!-- <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#panelsStayOpen-collapseFour"
                  aria-expanded="false"
                  aria-controls="panelsStayOpen-collapseFour">
                  Kích cỡ
                </button>
              </h2>
              <div
                id="panelsStayOpen-collapseFour"
                class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingFour">
                <div class="accordion-body size color-list">
                  <div class="size-option">
                    <input
                      type="checkbox"
                      name=""
                      value="Small"
                      id="small"
                      class="square-checkbox" />
                    <label for="small">S</label>
                  </div>
                  <div class="size-option">
                    <input
                      type="checkbox"
                      name=""
                      value="Medium"
                      id="large"
                      class="square-checkbox" />
                    <label for="medium">M</label>
                  </div>
                  <div class="size-option">
                    <input
                      type="checkbox"
                      name=""
                      value="Large"
                      id="large"
                      class="square-checkbox" />
                    <label for="large">L</label>
                  </div>
                  <a href="#" class="accordion-body see-more"> Xem thêm </a>
                </div>
              </div>
            </div> -->
            <!-- size: end -->
          </div>
          <!-- accordion: end -->

          <!-- rating-filter: start -->
          <!-- <div class="rating">
            <h4>ĐÁNH GIÁ</h4>
            <a class="5-star" href="#">
              <ion-icon name="star-sharp"></ion-icon
              ><ion-icon name="star-sharp"></ion-icon
              ><ion-icon name="star-sharp"></ion-icon
              ><ion-icon name="star-sharp"></ion-icon
              ><ion-icon name="star-sharp"></ion-icon>
            </a>
            <a class="4-star" href="#">
              <ion-icon name="star-sharp"></ion-icon
              ><ion-icon name="star-sharp"></ion-icon
              ><ion-icon name="star-sharp"></ion-icon
              ><ion-icon name="star-sharp"></ion-icon
              ><ion-icon name="star-outline"></ion-icon>
            </a>
            <a class="3-star" href="#">
              <ion-icon name="star-sharp"></ion-icon
              ><ion-icon name="star-sharp"></ion-icon
              ><ion-icon name="star-sharp"></ion-icon
              ><ion-icon name="star-outline"></ion-icon
              ><ion-icon name="star-outline"></ion-icon>
            </a>
            <a href="#" class="see-more">Xem thêm</a>
          </div> -->
          <!-- rating-filter: end -->
        </div>
        <!-- left-col: end -->

        <!--Khung Sản phẩm-->
        <!-- right-col: star -->
        <div class="right-col">
          <!-- sort-option: start -->
          <select name="sort" id="sort">
            <option value="cheap-to-expensive" >Sắp xếp theo giá tăng dần</option>
            <option value="expensive-to-cheap">Sắp xếp theo giá giảm dần</option>
            <option value="male">Giày nam</option>
            <option value="female">Giày nữ</option>
            <option value="male-female">Giày nam, nữ</option>
          </select>
          <!-- sort-option: end -->

          <p id="myTest"></p>

          <!-- product-list: start -->
          <div class="product-list">
          </div>
          <!-- product-list: end -->

          <div class="pagination m-5">
            <p>Xem thêm</p>
            <!-- <a href="#">&laquo;</a>
            <a class="active" href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <span class="ellipsis">...</span>
            <a href="#">10</a>
            <a href="#">&raquo;</a> -->
          </div>
        </div>
        <!-- right-col: end -->
      </div>
    </div>
    <!-- PRODUCT-LIST--BODY: end -->
  

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
      <script src="../../../js/homepage-shopping/product_list.js"></script>
    <!-- js: end -->

    <!-- Start of footer -->
    <?php include("../header-footer-nav/footer.php"); ?>
    <!-- End of footer -->

