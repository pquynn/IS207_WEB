<?php
// Include the database configuration file
include '../../connect.php';

function editAddress() {
    global $conn;

    // Kiểm tra xem request có phải là POST không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form chỉnh sửa địa chỉ
    $name = $_POST['name'];
    $phoneNumber = $_POST['phonenumber'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $specificAddress = $_POST['specificaddress'];
    $address = $specificAddress . ', ' . $district . ', ' . $province;
    // Update user information in the database
    $sql = "UPDATE users SET USER_NAME=?, USER_TELEPHONE=?, ADDRESSS=? WHERE USER_ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $phoneNumber, $address, $user_id);
    $result = $stmt->execute();

    if ($result) {
        // Cập nhật thành công, có thể thực hiện các hành động khác nếu cần
        // return "Cập nhật địa chỉ thành công!";
    } else {
        // Cập nhật thất bại
        // return "Cập nhật địa chỉ thất bại. Vui lòng thử lại.";
    }

    $stmt->close();
    }

}

function editPassword(){
    global $conn;

    // Kiểm tra xem request có phải là POST không
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Nhận dữ liệu từ yêu cầu AJAX
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $user_id = 'KH17028633'; //lấy để test chức năng
    

        // Chuẩn bị và thực thi truy vấn SQL để kiểm tra mật khẩu cũ
        $sql = "SELECT users.USER_LOGIN, USER_PASSWORD FROM users, login 
                WHERE USER_ID = ? 
                AND users.USER_LOGIN = login.USER_LOGIN";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Kiểm tra kết quả truy vấn mật khẩu cũ
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userlogin = $row['USER_LOGIN'];
            $passwordFromDB = $row['USER_PASSWORD'];
            if(password_verify($oldPassword, $passwordFromDB)){
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                // Mật khẩu cũ đúng, tiến hành cập nhật mật khẩu mới
                $updateSql = "UPDATE login SET USER_PASSWORD = ? WHERE USER_LOGIN = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("ss", $hashedPassword, $userlogin);
                $updateResult = $updateStmt->execute();

                // Kiểm tra và trả về kết quả cập nhật mật khẩu mới
                if ($updateResult) {
                    return (['status' => 'success', 'message' => 'Cập nhật mật khẩu thành công']);
                } else {
                    return (['status' => 'error', 'message' => 'Lỗi cập nhật mật khẩu: ' . $updateStmt->error]);
                }
            }
            else
                return (['status' => 'error', 'message' => 'Mật khẩu hiện tại không hợp lệ']);
            
        } else 
            // Mật khẩu cũ không đúng
            return (['a' => $user_id, 'status' => 'error', 'message' => 'Không tìm thấy người dùng']);
        
    } else {
        return (['status' => 'error', 'message' => 'Cập nhật mật khẩu không thành công']);
    }
}

// Check the action parameter in the request
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Execute the corresponding function based on the action
    switch ($action) {
        case 'edit_address':
            // Return the fetched data as JSON response
            echo json_encode(editAddress());
            break;
        case 'reset_password':
            // Return the fetched data as JSON response
            echo json_encode(editPassword());
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Action not specified']);
}
// Close the database connection
$conn->close();
?>




