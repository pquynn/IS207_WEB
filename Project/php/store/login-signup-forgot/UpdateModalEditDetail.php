<?php
$title = "Chỉnh sửa thông tin";
include("connect.php");

// Kiểm tra xem request có phải là POST không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ yêu cầu AJAX
    session_start();
    $user_id = $_SESSION['USER_ID'];
    $name = $_POST["name"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $gender = $_POST["gender"];

    // Chuẩn bị và thực thi truy vấn SQL để cập nhật thông tin người dùng
    $sql = "UPDATE users SET USER_NAME=?, BIRTHDAY=?, GENDER=? WHERE USER_ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $dateOfBirth, $gender, $user_id);
    $stmt->execute();

    // Kiểm tra và trả về kết quả
    if ($stmt->affected_rows > 0) {
        // Cập nhật thành công, có thể thực hiện các hành động khác nếu cần
        echo json_encode(['status' => 'success']);
    } else {
        // Cập nhật thất bại
        echo json_encode(['status' => 'error', 'message' => 'Cập nhật thông tin thất bại. Vui lòng thử lại.']);
    }

    $stmt->close();
} else {
    // Trả về trang HTML nếu không phải là request POST
    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="ModalEditDetail.js"></script>
        <link rel="stylesheet" href="base.css">
    </head>
    
    <body>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-detail">
            Sửa thông tin cá nhân
        </button>
    
        <!-- Modal -->
        <div class="modal fade" id="edit-detail" tabindex="-1" aria-labelledby="modal-detail" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
    
                    <div class="modal-header" style="border-bottom: none;">
                        <h1 class="modal-title fs-5" id="modal-address">SỬA THÔNG TIN</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="your-php-filename.php">
                            <!-- Nội dung form chỉnh sửa thông tin -->
                            <div class="row row-gap-3">
                                <!-- ... -->
                                <!-- Đặt tên các trường input sao cho tên trùng với các biến trong PHP để dễ xử lý -->
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Họ và tên*" required>
                                    <label for="name">Họ và tên*</label>
                                </div>
    
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="dateOfBirth" id="dateofbirth" required>
                                    <label for="phonenumber">Ngày sinh*</label>
                                </div>
    
                                <div>
                                    <input type="radio" id="nam" name="gender" value="Nam">
                                    <label for="radio1">Nam</label>
    
                                    <input type="radio" id="nu" name="gender" value="Nữ">
                                    <label for="radio2">Nữ</label>
    
                                    <input type="radio" id="khac" name="gender" value="Khác">
                                    <label for="radio3">Khác</label>
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
    
    </body>
    
    </html>
    <?php
}

$conn->close();
?>
