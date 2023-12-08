<?php
$title = "Chỉnh sửa mật khẩu";
include("connect.php");

$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];

session_start();
$userID = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE USER_ID = ? AND USER_LOGIN = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $userID, $oldPassword);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $updateSql = "UPDATE users SET USER_LOGIN = ? WHERE USER_ID = ?";
    $updateStmt = $connection->prepare($updateSql);
    $updateStmt->bind_param("ss", $newPassword, $userID);
    $updateResult = $updateStmt->execute();

    if ($updateResult) {
        echo "Cập nhật mật khẩu thành công";
    } else {
        echo "Lỗi cập nhật mật khẩu: " . $updateStmt->error;
    }
} else {
    echo "Mật khẩu cũ không đúng";
}
$stmt->close();
$updateStmt->close();
$connection->close();
?>
