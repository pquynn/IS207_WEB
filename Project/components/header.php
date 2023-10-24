<!-- @format -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <!-- css file -->
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/header.css" />

    <!-- icon -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- font-family -->
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap");
    </style>
  </head>
  <body>
    <ul class="header">
      <!-- LOGO: start -->
      <li class="nav-logo">
        <a href="#"><img src="../img/logo.png" /></a>
      </li>
      <!-- LOGO: End -->

      <!-- LINK (HOME, SHOP, CATEGORY,....): Start -->
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
      <!-- ICON (ACCOUNT, CART): End -->
    </ul>
  </body>
</html>
