<?php
$title = "Quên mật khẩu";
include("connect.php");

// Khởi tạo biến error
$error = "";

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
        header("Location: Forgetpass2.php");
        exit();
    } else {
        // Số điện thoại không tồn tại
        $error = "Số điện thoại không tồn tại. Vui lòng kiểm tra lại.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="Forgetpass.css">
    <link rel="stylesheet" href="base.css">
</head>

<body>
    <form action="Forgetpass.php" method="post">
    <table>
            <tr>
                <td>
                    <img src="logo.png">
                </td>
                
            </tr>
            <tr>
                <th>
                    <b>Quên mật khẩu ?</b>
                </th>
            </tr>
            <tr>
                <td>
                   <p>Nhập số điện thoại để nhận hướng dẫn lấy lại mật khẩu.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" id="phonenumber" placeholder=" Số điện thoại" required
                    oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại.')"
                    oninput="this.setCustomValidity('')">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php if (isset($error) && $error): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th colspan="2"><button type="submit" class="btn btn-confirm">Tiếp tục</button></th>
            </tr>
            <tr>
                <td style="font-weight: bold;">
                    <a href="Login.html" onclick="regturnback()">Quay lại</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
