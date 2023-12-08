<?php
$title="Chỉnh sửa thông tin";
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ yêu cầu AJAX
    session_start();
    $user_id = $_SESSION['USER_ID'];
    $name = $_POST["name"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $gender = $_POST["gender"];

    // Chuẩn bị và thực thi truy vấn SQL để cập nhật thông tin người dùng
    $sql = "UPDATE users SET USER_NAME=?, BIRTHDAY=?, GENDER=? WHERE USER_ID='$user_id'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $dateOfBirth, $gender);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
