<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../../../css/store/account-profile.css"/>

<?php
    $title = "Quản lý tài khoản";
    include("../header-footer-nav/header.php");
?>

<!-- MAIN SECTION START -->
  <!-- NAVIGATION ACCOUNT START -->
    <?php include("../header-footer-nav/navigation-account.php");?>
  <!-- NAVIGATION ACCOUNT START -->
  
    
  <!--LIST-ORDERS START-->
      <div class="list-orders">
        <!--breadscrumb-->
        <ul class="breadcrumb-my-order">
          <li class="breadcrumb-current-page">Quản lý tài khoản</li> / 
        </ul>

        <h2>Quản lý tài khoản</h2>

        <div class="account">
          <br>
          <ul>
            <li class="sub-nav--item hover-underline" >
              <a href="" data-bs-toggle="modal" data-bs-target="#edit-profile">CHỈNH SỬA THÔNG TIN</a>
            </li>
              <br>
            <li class="sub-nav--item hover-underline" >
              <a href="" data-bs-toggle="modal" data-bs-target="#edit-pass">ĐỔI MẬT KHẨU</a>
            </li>
              <br>
              <li class="sub-nav--item hover-underline">
                <a href="" data-bs-toggle="modal" data-bs-target="#edit-address">ĐỊA CHỈ</a>
              </li>
              <br>
            <li class="sub-nav--item hover-underline">
              <a href="#">ĐĂNG XUẤT</a>
            </li>
          </ul>
        </div>
      </div>  
</div>
<!--MAIN SECTION END-->

<?php
    include("../header-footer-nav/footer.php");
?>

<?php include("modal-edit-address.php"); ?>
<?php include("modal-edit-password.php"); ?>
<?php include("modal-edit-profile.php"); ?>