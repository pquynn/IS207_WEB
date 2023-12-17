<?php
$title = "Chỉnh sửa địa chỉ";
include("connect.php");

session_start();
$user_id = $_SESSION['USER_ID'];

// Kiểm tra xem request có phải là POST không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form chỉnh sửa địa chỉ
    $name = $_POST['name'];
    $phoneNumber = $_POST['phonenumber'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $specificAddress = $_POST['specificaddress'];

    // Update user information in the database
    $sql = "UPDATE users SET USER_NAME=?, USER_TELEPHONE=?, ADDRESSS=? WHERE USER_ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $phoneNumber, $specificAddress . ', ' . $district . ', ' . $province, $user_id);
    $result = $stmt->execute();

    if ($result) {
        // Cập nhật thành công, có thể thực hiện các hành động khác nếu cần
        echo "Cập nhật địa chỉ thành công!";
    } else {
        // Cập nhật thất bại
        echo "Cập nhật địa chỉ thất bại. Vui lòng thử lại.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/base.css">
    <script src="ModalEditAddress.js"></script>
</head>

<body>
    <!-- Start of edit address modal -->
    <!-- use modal of bootstrap to style edit address. modified 10/27/2023 by Quyen -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-address">
        Sửa địa chỉ mua hàng
    </button>

    <!-- Modal -->
    <div class="modal fade" id="edit-address" tabindex="-1" aria-labelledby="modal-address" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header" style="border-bottom: none;">
            <h1 class="modal-title fs-5" id="modal-address">ĐỊA CHỈ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="your-php-filename.php">
                    <!-- Nội dung form chỉnh sửa địa chỉ -->
                    <div class="row row-gap-3">
                        <!-- ... -->
                        <!-- Đặt tên các trường input sao cho tên trùng với các biến trong PHP để dễ xử lý -->
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Họ và tên*" required>
                            <label for="name">Họ và tên*</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="Số điện thoại*" required>
                            <label for="phonenumber">Số điện thoại*</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" name="province" id="province" placeholder="Tỉnh*" required>
                            <label for="province">Tỉnh*</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control h-50" name="district" id="district" placeholder="Quận/huyện*" required>
                            <label for="district">Quận/huyện*</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" name="specificaddress" id="specificaddress" placeholder="Địa chỉ cụ thể*" required>
                            <label for="specificaddress">Địa chỉ cụ thể*</label>
                        </div>

                        <div class="btn-container">
                            <button class="btn btn-confirm" style="width: 100%;">Lưu thay đổi</button>
                            <button class="btn btn-cancel" style="width: 100%;" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- End of edit address modal -->

</body>

</html>
