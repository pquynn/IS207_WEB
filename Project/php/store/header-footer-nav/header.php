<!-- @format -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>

    <!-- css file -->
    <link rel="stylesheet" href="../../../css/style-components/base.css" />
    <link rel="stylesheet" href="../../../css/style-components/header.css" />
    <link rel="stylesheet" href="../../../css/style-components/footer.css"/> 
    <link rel="stylesheet" href="../../../css/style-components/pagination.css"/>

    <!-- icon -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
    <script src="https://kit.fontawesome.com/f7fcb1a9ac.js"crossorigin="anonymous"></script>

    <!-- font-family -->
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap");
    </style>


  </head>
  <body>
    <ul class="header">
      <!-- LOGO: start -->
      <li class="nav-logo">
        <a href="#"><img src="../../../img/logo.png" /></a>
      </li>
      <!-- LOGO: End -->

      <!-- LINK (HOME, SHOP, CATEGORY,....): Start -->
      <ul class="nav-link">
        <li class="nav-link--item hover-underline"><a href="#">TRANG CHỦ</a></li>
        <li class="nav-link--item hover-underline"><a href="#">MUA SẮM</a></li>

        <!-- category sub navigation -->
        <li class="nav-link--item primary-nav hover-underline a">
          <a href="#">LOẠI SP</a>
          <ul class="sub-nav">
            <li class="sub-nav--item hover-underline">
              <a href="#">LOẠI 1</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="#">LOẠI 2</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="#">LOẠI 3</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="#">LOẠI 4</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="#">LOẠI 5</a>
            </li>
          </ul>
        </li>

        <li class="nav-link--item hover-underline"><a href="#">TRANG</a></li>
        <li class="nav-link--item hover-underline"><a href="../blog-info/blog.php">BLOGS</a></li>
      </ul>
      <!-- LINK (HOME, SHOP, CATEGORY,....): End -->

      <!-- ICON (ACCOUNT, CART): Start -->
      <ul class="nav-icon">
        <!-- search -->
        <li class="nav-icon--item">
          <a>
            <span class="material-symbols-outlined"> search </span>
          </a>
        </li>

        <!-- account -->
        <ul class="nav-icon--item primary-nav">
          <a>
            <span class="material-symbols-outlined"> account_circle </span>
          </a>
          <ul class="sub-nav">
            <li class="sub-nav--item hover-underline">
              <a href="../account-management/account-profile.php">TÀI KHOẢN</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="../../admin/Dashboard.php">QUẢN LÝ</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="#">LOG OUT</a>
            </li>
          </ul>
        </ul>

        <!-- cart -->
        <li class="nav-icon--item">
          <a href="../cart-checkout/cart.php">
            <span class="material-symbols-outlined"> shopping_bag </span>
          </a>
        </li>
      </ul>
      <!-- ICON (ACCOUNT, CART): End -->
    </ul>
