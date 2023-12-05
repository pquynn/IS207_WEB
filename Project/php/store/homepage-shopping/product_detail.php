  <link rel="stylesheet" href="../../../css/store/product_detail.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Start of header -->
  <?php 
    $title = "Chi tiết sản phẩm";
    include("../header-footer-nav/header.php"); ?>
  <!-- End of header -->

    <!--Product Detail Nav-->
    <!-- PRODUCT DETAIL'S BODY: START -->
    <div class="product-detail--body">
      <div class="product-nav">
        <h1>For Shoes</h1>
        <nav class="product-detail-link" aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">For Shoes</a></li>
            <li><a class="breadcrumb-item" href="#">Sneaker</a></li>
            <li class="breadcrumb-item active" aria-current="page">Adidas</li>
          </ul>
        </nav>
      </div>
      <div class="main-info">
        <!--Khung giới thiệu ảnh sản phẩm-->
        <div class="product-image">
          <div class="product-main-img">
            <img src="../../../img/blog_img/blog2.webp" />
          </div>
        </div>

        <!--Khung giới thiệu thông tin sản phẩm-->
        <div class="product-info">
          <!-- <div class="product-name"><h2>Adidas</h2></div>
          <div class="product-price"><h3>500000 VND</h3></div> -->
          <div class="product-rating">
            <ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon
            ><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon
            ><ion-icon name="star"></ion-icon>
          </div>
          <div class="product-category">
            <h4>Phân loại: </h4>
            <p>
              Loại giày
            </p>
          </div>

          <div class="product-size">
            <h4>Kích cỡ:</h4>

            <div class="size">
              <button class="btn-size">XXS</button>
              <button class="btn-size">XS</button>
              <button class="btn-size">S</button>
              <button class="btn-size">M</button>
              <button class="btn-size">L</button>
              <button class="btn-size">XL</button>
            </div>
          </div>
          <div class="product-quantity">
            <h4>Số lượng:</h4>
            <div class="quantity">
              <span class="minus change-amount-btn">-</span>
              <span class="number">1</span>
              <span class="plus change-amount-btn">+</span>
            </div>
          </div>
          <div class="shopping-btn">
            <button class="btn btn-cancel">Thêm vào giỏ hàng</button>
            <button class="btn btn-confirm">Mua ngay</button>
          </div>
        </div>
      </div>
      <!--Khung mô tả và đánh giá-->
      <!-- TAG BTN: start -->
      <nav>
        <div class="nav nav-tabs description" id="nav-tab" role="tablist">
          <button
            class="nav-link active tag-btn"
            id="nav-home-tab"
            data-bs-toggle="tab"
            data-bs-target="#nav-home"
            type="button"
            role="tab"
            aria-controls="nav-home"
            aria-selected="true">
            Mô tả
          </button>
          <button
            class="nav-link tag-btn"
            id="nav-profile-tab"
            data-bs-toggle="tab"
            data-bs-target="#nav-profile"
            type="button"
            role="tab"
            aria-controls="nav-profile"
            aria-selected="false">
            Chi tiết
          </button>
          <button
            class="nav-link tag-btn"
            id="nav-contact-tab"
            data-bs-toggle="tab"
            data-bs-target="#nav-contact"
            type="button"
            role="tab"
            aria-controls="nav-contact"
            aria-selected="false">
            Review
          </button>
        </div>
      </nav>
      <!-- TAG BTN: start -->

      <!-- TAG-CONTENT: start -->
      <div class="tab-content" id="nav-tabContent">
        <!-- description's content: start -->
        <div
          class="tab-pane fade show active"
          id="nav-home"
          role="tabpanel"
          aria-labelledby="nav-home-tab">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
            autem quibusdam dolorum dolorem pariatur dolores, non ipsum ad nulla
            magnam veniam dignissimos vero nam alias minima repellat optio,
            nihil accusantium?
          </p>
        </div>
        <!-- description's content: end -->

        <!-- detail's content:start -->
        <div
          class="tab-pane fade"
          id="nav-profile"
          role="tabpanel"
          aria-labelledby="nav-profile-tab">
          <div class="tab-content">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
              autem quibusdam dolorum dolorem pariatur dolores, non ipsum ad
              nulla magnam veniam dignissimos vero nam alias minima repellat
              optio, nihil accusantium? quam.
            </p>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem,
              eius illum consequuntur quae minus iusto voluptatibus inventore
              exercitationem, similique distinctio repellat veniam animi
              aspernatur laborum laboriosam iste adipisci consectetur
            </p>
          </div>
        </div>
        <!-- detail's content:end -->

        <!-- review's content: start -->
        <div
          class="tab-pane fade"
          id="nav-contact"
          role="tabpanel"
          aria-labelledby="nav-contact-tab">
          <!-- header: start -->
          <div class="rating-header">
            <h4>Đánh giá</h4>

            <!-- star: start -->
            <div class="rating">
              <!-- rating scrore -->
              <div class="rating-score">
                <h5>5</h5>
                <div class="rating-icon">
                  <ion-icon name="star"></ion-icon
                  ><ion-icon name="star"></ion-icon
                  ><ion-icon name="star"></ion-icon
                  ><ion-icon name="star"></ion-icon
                  ><ion-icon name="star"></ion-icon>
                </div>
              </div>
              <!-- amount of review -->
              <div class="people-rate-num">
                <small> 40 lượt đánh giá</small>
              </div>
            </div>
            <!-- star: start -->
          </div>
          <!-- header: end -->

          <!-- PERSONAL RATING: Star -->
          <div class="review-list">
            <div class="person-review">
              <!-- star: start -->
              <div class="review-star">
                <ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon>
                <span>5.0</span>
              </div>
              <!-- star: end -->

              <!-- comment: start -->
              <div class="review-text">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Cursus tristique in tellus diam, metus sit. Quis venenatis,
                  neque arcu accumsan sollicitudin aliquet nunc. Lorem ipsum
                  dolor sit amet consectetur adipisicing elit. Eos dicta ducimus
                  adipisci assumenda? Magnam velit repudiandae nihil, ipsum ad
                  architecto neque est quidem, ratione ullam fuga ipsa?
                  Officiis, ipsum maiores?
                </p>
                <a href="#" class="link">Xem Thêm</a>
              </div>
              <!-- comment: end -->

              <!-- img: start -->
              <div class="review-img">
                <div class="img-container">
                  <img
                    class="img-rv"
                    src="https://www.side-step.co.za/media/catalog/product/cache/f8df61b05911d279f59846ba6dcb8724/a/d/add3483cw-adidas-niiteball-white-fz5741-v1_jpg.jpg" />
                  <img
                    class="img-rv"
                    src="https://www.side-step.co.za/media/catalog/product/cache/f8df61b05911d279f59846ba6dcb8724/a/d/add3483cw-adidas-niiteball-white-fz5741-v1_jpg.jpg" />
                  <img
                    class="img-rv"
                    src="https://www.side-step.co.za/media/catalog/product/cache/f8df61b05911d279f59846ba6dcb8724/a/d/add3483cw-adidas-niiteball-white-fz5741-v1_jpg.jpg" />
                </div>
                <div class="name-date">
                  <div class="name">
                    <p>Linh. DTM</p>
                  </div>
                  <div class="date">
                    <p>4/11/2023</p>
                  </div>
                </div>
              </div>
              <!-- img: end -->
            </div>
            <div class="person-review">
              <!-- star: start -->
              <div class="review-star">
                <ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon>
                <span>5.0</span>
              </div>
              <!-- star: end -->

              <!-- comment: start -->
              <div class="review-text">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Cursus tristique in tellus diam, metus sit. Quis venenatis,
                  neque arcu accumsan sollicitudin aliquet nunc. Lorem ipsum
                  dolor sit amet consectetur adipisicing elit. Eos dicta ducimus
                  adipisci assumenda? Magnam velit repudiandae nihil, ipsum ad
                  architecto neque est quidem, ratione ullam fuga ipsa?
                  Officiis, ipsum maiores?
                </p>
                <a href="#" class="link">Xem Thêm</a>
              </div>
              <!-- comment: end -->

              <!-- img: start -->
              <div class="review-img">
                <div class="img-container">
                  <img
                    class="img-rv"
                    src="https://www.side-step.co.za/media/catalog/product/cache/f8df61b05911d279f59846ba6dcb8724/a/d/add3483cw-adidas-niiteball-white-fz5741-v1_jpg.jpg" />
                  <img
                    class="img-rv"
                    src="https://www.side-step.co.za/media/catalog/product/cache/f8df61b05911d279f59846ba6dcb8724/a/d/add3483cw-adidas-niiteball-white-fz5741-v1_jpg.jpg" />
                  <img
                    class="img-rv"
                    src="https://www.side-step.co.za/media/catalog/product/cache/f8df61b05911d279f59846ba6dcb8724/a/d/add3483cw-adidas-niiteball-white-fz5741-v1_jpg.jpg" />
                </div>
                <div class="name-date">
                  <div class="name">
                    <p>Linh. DTM</p>
                  </div>
                  <div class="date">
                    <p>4/11/2023</p>
                  </div>
                </div>
              </div>
              <!-- img: end -->
            </div>
            <div class="person-review">
              <!-- star: start -->
              <div class="review-star">
                <ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon
                ><ion-icon name="star"></ion-icon>
                <span>5.0</span>
              </div>
              <!-- star: end -->

              <!-- comment: start -->
              <div class="review-text">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Cursus tristique in tellus diam, metus sit. Quis venenatis,
                  neque arcu accumsan sollicitudin aliquet nunc. Lorem ipsum
                  dolor sit amet consectetur adipisicing elit. Eos dicta ducimus
                  adipisci assumenda? Magnam velit repudiandae nihil, ipsum ad
                  architecto neque est quidem, ratione ullam fuga ipsa?
                  Officiis, ipsum maiores?
                </p>
                <a href="#" class="link">Xem Thêm</a>
              </div>
              <!-- comment: end -->

              <!-- img: start -->
              <div class="review-img">
                <div class="img-container">
                  <img
                    class="img-rv"
                    src="https://www.side-step.co.za/media/catalog/product/cache/f8df61b05911d279f59846ba6dcb8724/a/d/add3483cw-adidas-niiteball-white-fz5741-v1_jpg.jpg" />
                  <img
                    class="img-rv"
                    src="https://www.side-step.co.za/media/catalog/product/cache/f8df61b05911d279f59846ba6dcb8724/a/d/add3483cw-adidas-niiteball-white-fz5741-v1_jpg.jpg" />
                  <img
                    class="img-rv"
                    src="https://www.side-step.co.za/media/catalog/product/cache/f8df61b05911d279f59846ba6dcb8724/a/d/add3483cw-adidas-niiteball-white-fz5741-v1_jpg.jpg" />
                </div>
                <div class="name-date">
                  <div class="name">
                    <p>Linh. DTM</p>
                  </div>
                  <div class="date">
                    <p>4/11/2023</p>
                  </div>
                </div>
              </div>
              <!-- img: end -->
            </div>
          </div>
          <!-- PERSONAL RATING: End -->
        </div>
        <!-- review's content: end -->
      </div>
      <!-- TAG-CONTENT: end -->
    </div>
    <!-- PRODUCT DETAIL'S BODY: END -->

    <script>
      // add amount
      const plus = document.querySelector(".plus"),
        minus = document.querySelector(".minus"),
        number = document.querySelector(".number");
      let a = 1;
      plus.addEventListener("click", () => {
        a++;
        number.innerText = a;
      });
      minus.addEventListener("click", () => {
        if (a > 1) {
          a--;
          number.innerText = a;
        }
      });
    </script>

    <script src="../../../js/homepage-shopping/product_detail.js"></script>

    <!-- bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>

<!-- Start of footer -->
<?php include("../header-footer-nav/footer.php"); ?>
    <!-- End of footer -->
