<?php
$title = "Chỉnh sửa địa chỉ";
include("connect.php");

session_start();
$user_id = $_SESSION['USER_ID'];
$name = $data['name'];
$phoneNumber = $data['phoneNumber'];
$province = $data['province'];
$district = $data['district'];
$specificAddress = $data['specificAddress'];

// Update user information in the database

$sql = "UPDATE users SET USER_NAME=?, USER_TELEPHONE=?, ADDRESSS=? WHERE USER_ID=$user_id";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $phoneNumber, $specificAddress . ', ' . $district . ', ' . $province);
$result = $stmt->execute();
$stmt->close();
$conn->close();
