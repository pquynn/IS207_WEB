<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f7fcb1a9ac.js"crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../../css/style-components/base.css">
    <link rel="stylesheet" href="../../css/admin/AdminNavigation.css">
    <link rel="stylesheet" href="../../css/style-components/table.css">
    <link rel="stylesheet" href="../../css/style-components/pagination.css">
    <link rel="stylesheet" href="../../css/admin/ProductsManagement.css">
    <link rel="stylesheet" href="../../css/admin/ModalAddNewProduct.css">
    <link rel="stylesheet" href="../../css/admin/ModalAlert.css">
    <title>
        <?php echo $title; ?>
    </title>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- xlsx library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>

</head>
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
                <li><a class="nav-item" href="../store/homepage-shopping/homepage.php">Về Cửa Hàng</a></li>
                <li><a class="nav-item" href="Dashboard.php">Thống Kê</a></li>
                <li><a class="nav-item" href="CategoriesManagement.php">Danh Mục</a></li>
                <li><a class="nav-item" href="ProductsManagement.php">Sản Phẩm</a></li>
                <li><a class="nav-item" href="OrdersManagement.php">Đơn Hàng</a></li>
                <li><a class="nav-item" href="CustomersManagement.php">Khách Hàng</a></li>
                <li><a class="nav-item" href="EmployeesManagement.php">Nhân Viên</a></li>
                <li><a class="nav-item" href="BlogManagement.php">Blog</a></li>
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

   
    <script src="../../js/admin/admin-nav"></script>


