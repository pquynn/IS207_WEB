<?php
$title="Quên mật khẩu";
include("connect.php");

// Lấy số điện thoại từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phoneNumber = $_POST["phonenumber"];

    // Kiểm tra số điện thoại trên cơ sở dữ liệu
    $sql = "SELECT * FROM users WHERE USER_TELEPHONE = '$phoneNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Số điện thoại tồn tại, gửi tin nhắn và tạo link đến trang đặt lại mật khẩu
        $resetLink = "#" . $phoneNumber;
        // Đang phát triển gửi tin nhắn đến sđt
        // Chuyển hướng đến trang thông báo
        header("Location: Forgetpass2.html");
        exit();
    } else {
        // Số điện thoại không tồn tại
        $error = "Số điện thoại không tồn tại. Vui lòng kiểm tra lại.";
    }
}

$conn->close();
?>
