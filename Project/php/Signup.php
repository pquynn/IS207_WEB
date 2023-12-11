<?php
$title = "Đăng kí";
// Kết nối đến cơ sở dữ liệu
include("connect.php");

// Lấy dữ liệu từ form đăng kí
$name = $_POST['name'];
$phoneNumber = $_POST['phoneNumber'];
$password = $_POST['password'];

// Thực hiện thêm dữ liệu vào bảng 'users'
$sql_users = "INSERT INTO `users` (USER_LOGIN, USER_NAME, USER_TELEPHONE, DAY_ADD) VALUES (?, ?, ?, now())";
$stmt_users = $conn->prepare($sql_users);
$stmt_users->bind_param("sss", $phoneNumber, $name, $phoneNumber);
$result_users = $stmt_users->execute();
//Hash mật khẩu nhập vào
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
// Thực hiện thêm dữ liệu vào bảng 'login'
$sql_login = "INSERT INTO `login` (USER_LOGIN, USER_PASSWORD, ROLE_ID) VALUES (?, ?, 1)";
$stmt_login = $conn->prepare($sql_login);
$stmt_login->bind_param("ss", $phoneNumber, $password);
$result_login = $stmt_login->execute();

if ($result && $result_login) {
    echo "Đăng ký thành công!";
} else {
    echo "Đã xảy ra lỗi. Vui lòng thử lại.";
}

$stmt_users->close();
$stmt_login->close();
$conn->close();
