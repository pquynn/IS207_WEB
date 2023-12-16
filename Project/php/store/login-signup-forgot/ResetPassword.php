<?php
$title="Đặt lại mật khẩu";
include("connect.php");
$phoneNumber = $_GET["phone"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/Forgetpass.css">
    <link rel="stylesheet" href="../../../css/base.css">
</head>
<body>
    <form action="ResetPassword.php" method="post">
        <!-- Thêm các trường nhập mật khẩu mới và xác nhận mật khẩu mới -->
        <table>
            <tr>
                <td>
                <input type="password" name="new_password" placeholder="Mật khẩu mới" required
                oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu mới.')"
                oninput="this.setCustomValidity('')">
                </td>
            </tr>
            <tr>
                <th>
                <input type="password" name="confirm_password" placeholder="Xác nhận mật khẩu mới" required
                oninvalid="this.setCustomValidity('Vui lòng nhập lại mật khẩu mới.')"
                oninput="this.setCustomValidity('')">
                </th>
            </tr>
            <tr>
                <td colspan="2">
                <?php if (isset($error) && $error): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th colspan="2"><button type="submit" class="btn btn-confirm">Đặt lại mật khẩu</button></th>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
// Lấy thông tin từ form đặt lại mật khẩu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Kiểm tra mật khẩu mới và xác nhận mật khẩu mới
    if ($newPassword == $confirmPassword) {
        // Thực hiện cập nhật mật khẩu mới trong cơ sở dữ liệu
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        //prepared statement
        $updateSql = "UPDATE users SET USER_PASSWORD = ? WHERE USER_TELEPHONE = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("ss", $hashedPassword, $phoneNumber);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        // Chuyển hướng đến trang chủ
        header("Location: #.html");
        exit();
    } else {
        $error = "Mật khẩu không trùng khớp. Vui lòng nhập lại";
    }
}

$conn->close();
?>
