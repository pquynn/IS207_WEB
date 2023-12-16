<?php
$title = "Quên mật khẩu";
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
        header("Location: #");
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
    <link rel="stylesheet" href="../../../css/Forgetpass.css">
    <link rel="stylesheet" href="../../../css/base.css">
</head>

<body>
    <form action="#" method="post">
    <table>
            <tr>
                <td>
                    <img src="message.jpg">
                </td>
                
            </tr>
            <tr>
                <th>
                    <b>Kiểm tra tin nhắn</b>
                </th>
            </tr>
            <tr>
                <td>
                   <p>Chúng tôi vừa gửi đến số điện thoại bạn hướng dẫn để thiết lập lại mật khẩu. Nếu không thấy vui lòng nhấp vào nút "Gửi lại".</p>
                </td>
            </tr>
            <tr>
                <th><button class="btn btn-confirm" onclick="resend()">Gửi lại</button></th>
            </tr>
            <tr>
                <td style="font-weight: bold;">
                    <a href="Login.html" onclick="returnback()">Quay lại</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
