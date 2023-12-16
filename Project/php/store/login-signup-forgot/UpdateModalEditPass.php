<?php
$title = "Chỉnh sửa mật khẩu";
include("connect.php");

// Kiểm tra xem request có phải là POST không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ yêu cầu AJAX
    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['newpassword'];

    session_start();
    $userID = $_SESSION['USER_ID'];

    // Chuẩn bị và thực thi truy vấn SQL để kiểm tra mật khẩu cũ
    $sql = "SELECT * FROM users WHERE USER_ID = ? AND USER_LOGIN = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $userID, $oldPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra kết quả truy vấn mật khẩu cũ
    if ($result->num_rows > 0) {
        // Mật khẩu cũ đúng, tiến hành cập nhật mật khẩu mới
        $updateSql = "UPDATE users SET USER_LOGIN = ? WHERE USER_ID = ?";
        $updateStmt = $connection->prepare($updateSql);
        $updateStmt->bind_param("ss", $newPassword, $userID);
        $updateResult = $updateStmt->execute();

        // Kiểm tra và trả về kết quả cập nhật mật khẩu mới
        if ($updateResult) {
            echo json_encode(['status' => 'success', 'message' => 'Cập nhật mật khẩu thành công']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi cập nhật mật khẩu: ' . $updateStmt->error]);
        }
    } else {
        // Mật khẩu cũ không đúng
        echo json_encode(['status' => 'error', 'message' => 'Mật khẩu cũ không đúng']);
    }

    $stmt->close();
    $updateStmt->close();
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
        <script src="ModalEditPass.js"></script>
        <link rel="stylesheet" href="../../../css/base.css">
    </head>
    
    <body>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-pass">
            Đổi mật khẩu
        </button>
    
        <!-- Modal -->
        <div class="modal fade" id="edit-pass" tabindex="-1" aria-labelledby="modal-pass" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
    
                    <div class="modal-header" style="border-bottom: none;">
                        <h1 class="modal-title fs-5" id="modal-pass">ĐỔI MẬT KHẨU</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="your-php-filename.php">
                            <!-- Nội dung form đổi mật khẩu -->
                            <div class="row row-gap-3">
                                <!-- ... -->
                                <!-- Đặt tên các trường input sao cho tên trùng với các biến trong PHP để dễ xử lý -->
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="oldpassword" id="oldpassword" placeholder="Mật khẩu cũ*" required>
                                    <label for="oldpassword">Mật khẩu cũ*</label>
                                </div>
    
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="newpassword" id="newpassword" placeholder="Mật khẩu mới*" required>
                                    <label for="newpassword">Mật khẩu mới*</label>
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

$connection->close();
?>
