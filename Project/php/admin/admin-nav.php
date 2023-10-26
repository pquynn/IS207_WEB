<!-- cut layout: admin navigation. modified 10/18/2023 by Quyen -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f7fcb1a9ac.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/admin-navigation.css">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="stylesheet" href="../../css/pagination.css">
    <title><?php echo $title; ?></title>

    <!--css feat-->
    <link rel="stylesheet" href="../../css/admin-orders.css"/>

    <link rel="stylesheet" href="../../css/admin-order-detail.css"/>
    <!--icon-->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
</head>
<body>
    <!-- start: admin navigation -->
    <div class="nav-container">
        <div class="nav-admin">
            <a href="#" class="nav-admin-logo">
                <!-- change logo color into white. modified 10/18/2023 by Quyen -->
                <img src="../../img/logo-white.png" alt="logo"> 
                <h1>LOGO</h1>
            </a>
    
            <ul class="nav-admin-menu">
                <li><a href="#">Về Cửa Hàng</a></li>
                <li><a href="#">Thống Kê</a></li>
                <li><a href="#">Danh Mục</a></li>
                <li><a href="#">Sản Phẩm</a></li>
                <li><a href="#" class="active">Đơn Hàng</a></li>
                <li><a href="#">Khách Hàng</a></li>
                <li><a href="#">Nhân Viên</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
    
            <div class="nav-admin-account">
                <a href="#" id="account">
                        <img src="../../img/user.png" alt="Your account">
                        <p>Nguyễn Văn A</p>
                </a>
                <a href="#" id="logout">Đăng Xuất</a>
            </div>
        </div>  
    </div>
<!-- end: admin navigation -->