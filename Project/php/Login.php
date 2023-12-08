<?php
$title="Đăng nhập";
// Kết nối đến cơ sở dữ liệu
include("connect.php");

// Lấy dữ liệu từ form đăng nhập
$userlogin = $_POST['phonenumber'];
$password = $_POST['pass'];

// Sử dụng Prepared Statements để ngăn chặn SQL injection
$sql = "SELECT * FROM login WHERE USER_LOGIN = ? AND USER_PASSWORD = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $userlogin, $password);

// Thực hiện truy vấn
$stmt->execute();
// Lấy kết quả
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Lấy thông tin người dùng từ cơ sở dữ liệu
    $user = $result->fetch_assoc();
    //Lấy mật khẩu đã hash từ database
    $passwordFromDatabase = $user['USER_PASSWORD'];
    // Kiểm tra mật khẩu nhập từ form với mật khẩu đã hash
    if (password_verify($passwordFromForm, $passwordFromDatabase)) {
        // Phân quyền
        session_start();
        $_SESSION['USER_ID'] = $user_id;
        $role_id = $user['ROLE_ID'];
        if ($role_id == 1) {
            // Người dùng có quyền Admin
            echo json_encode(['status' => 'success', 'role' => 'admin']);
        } elseif ($role_id == 2) {
            // Người dùng có quyền Staff
            echo json_encode(['status' => 'success', 'role' => 'staff']);
        } else {
            // Người dùng có quyền User 
            echo json_encode(['status' => 'success', 'role' => 'user']);
        }
    } else {
        // Mật khẩu không đúng
        echo json_encode(['status' => 'error', 'message' => 'Số điện thoại hoặc mật khẩu không đúng.']);
    }
} else {
    // Đăng nhập thất bại
    echo json_encode(['status' => 'error', 'message' => 'Số điện thoại hoặc mật khẩu không đúng.']);
}
$stmt->close();
$conn->close();
