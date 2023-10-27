<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>

    <!-- css file general-->
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/header.css"/>
    <link rel="stylesheet" href="../css/footer.css"/>    
    <link rel="stylesheet" href="../css/table.css"/>
    <link rel="stylesheet" href="../css/pagination.css"/>

    <!--css file feat-->
    <link rel="stylesheet" href="../css/my-orders.css"/>
    <link rel="stylesheet" href="../css/my-order-detail.css"/>
    <link rel="stylesheet" href="../css/my-order-feedback.css"/>
    

    <!-- icon -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!---->  

    <script src="https://kit.fontawesome.com/f7fcb1a9ac.js"crossorigin="anonymous"></script>
  </head>
  <body>
<!--HEADER -- START-->  
    <ul class="header">
      <!-- logo -->
      <li class="nav-logo"><a href="#">LOGO</a></li>

      <!-- link (home, shop, category,....) -->
      <ul class="nav-link">
        <li class="nav-link--item hover-underline"><a href="#">HOME</a></li>
        <li class="nav-link--item hover-underline"><a href="#">SHOP</a></li>

        <!-- category sub navigation -->
        <li class="nav-link--item primary-nav hover-underline a">
          <a href="#">CATEGORY</a>
          <ul class="sub-nav">
            <li class="sub-nav--item hover-underline">
              <a href="#">SUB-CATEGORY</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="#">SUB-CATEGORY</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="#">SUB-CATEGORY</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="#">SUB-CATEGORY</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="#">SUB-CATEGORY</a>
            </li>
          </ul>
        </li>

        <li class="nav-link--item hover-underline"><a href="#">PAGES</a></li>
        <li class="nav-link--item hover-underline"><a href="#">BLOGS</a></li>
      </ul>

      <!-- icon (accoutn, cart) -->
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
              <a href="#">TÀI KHOẢN</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="#">QUẢN LÝ</a>
            </li>
            <li class="sub-nav--item hover-underline">
              <a href="#">LOG OUT</a>
            </li>
          </ul>
        </ul>

        <!-- cart -->
        <li class="nav-icon--item">
          <a>
            <span class="material-symbols-outlined"> shopping_bag </span>
          </a>
        </li>
      </ul>
    </ul>
<!--HEADER -- END-->

<!--MAIN SECTION START-->
<div class="section">
  <!--NAVIGATION START-->
    <div class="navigation-account">
      <ul>
        <li id="title-TaiKhoan">Tài khoản</li>
        <li><a href="#">Quản lý tài khoản</a></li>
        <li><a href="#" class="active">Đơn hàng của tôi</a></li>
      </ul>  
    </div>
  <!--NAVIGATION END-->