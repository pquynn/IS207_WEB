<?php
$title = "Đăng kí";
// Kết nối đến cơ sở dữ liệu
include("connect.php");

// Xử lý form đăng kí
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form đăng kí
    $name = $_POST['name'];
    $userlogin = $_POST['userlogin'];
    $customerphone = $_POST['customerphone'];
    $password = $_POST['password'];

    // Thực hiện thêm dữ liệu vào bảng 'users'
    $sql_users = "INSERT INTO `users` (USER_LOGIN, USER_NAME, USER_TELEPHONE, DAY_ADD) VALUES (?, ?, ?, now())";
    $stmt_users = $conn->prepare($sql_users);
    $stmt_users->bind_param("sss", $userlogin, $name, $customerphone);
    $result_users = $stmt_users->execute();

    // Hash mật khẩu nhập vào
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Thực hiện thêm dữ liệu vào bảng 'login'
    $sql_login = "INSERT INTO `login` (USER_LOGIN, USER_PASSWORD, ROLE_ID) VALUES (?, ?, 3)";
    $stmt_login = $conn->prepare($sql_login);
    $stmt_login->bind_param("ss", $userlogin, $hashedPassword);
    $result_login = $stmt_login->execute();

    if ($result_users && $result_login) {
        echo "Đăng ký thành công!";
    } else {
        echo "Đã xảy ra lỗi. Vui lòng thử lại.";
    }

    $stmt_users->close();
    $stmt_login->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="Signup.css">
    <link rel="stylesheet" href="base.css">
    <script src="Signup.js"></script>
</head>

<body>
    <form method="post" onsubmit="return signup()">
    <table>
            <tr>
                <td>
                    <h1>TẠO TÀI KHOẢN</h1>
                </td>
            </tr>
            <tr>
                <td>Họ và tên*</td>
            </tr>
            <tr>
                <th><input type="text" id="name" placeholder="Họ và tên*" required
                    oninvalid="this.setCustomValidity('Vui lòng nhập họ và tên.')"
                    oninput="this.setCustomValidity('')"></th>
            </tr>
            <tr>
                <td>Số điện thoại*</td>
            </tr>
            <tr>
                <th><input type="tel" id="customerphone" placeholder="Số điện thoại*" required pattern="^0[0-9]{9}$"
                    oninvalid="this.setCustomValidity('Yêu cầu nhập số điện thoại có 10 số và bắt đầu =0')"
                    oninput="this.setCustomValidity('')"></th>
            </tr>
            <tr>
                <th>
                    <h2>Thông tin đăng nhập</h2>
                </th>
            </tr>
            <tr>
                <td>Tên tài khoản*</td>
            </tr>
            <tr>
                <th><input type="text" id="userlogin" placeholder="Tên tài khoản*" required
                    oninvalid="this.setCustomValidity('Vui lòng nhập tên tài khoản.')"
                    oninput="this.setCustomValidity('')"></th>
            <tr>
            <tr>
                <td>Mật khẩu*</td>
            </tr>
            <tr>
                <th><input type="password" id="password" placeholder="Mật khẩu*" required
                    oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu.')"
                    oninput="this.setCustomValidity('')"></th>
            <tr>

            <tr>
                <td>Nhập lại mật khẩu*</td>
            </tr>
            <tr>
                <th><input type="password" id="repassword" placeholder="Nhập lại mật khẩu*" required
                    oninvalid="this.setCustomValidity('Vui lòng nhập lại mật khẩu.')"
                    oninput="this.setCustomValidity('')"></th>
            <tr>
                <td><input type="checkbox" id="accept"> Đồng ý với "Điều kiện sử dụng" và "Chính sách bảo mật"</td>

            </tr>
            <tr>
                <th><button type="submit" class="btn btn-confirm" onclick="register()">Đăng kí</button></th>
            </tr>
            <tr>
                <td>
                    <span style="margin-left: 50px; color: rgb(0, 0, 209);">Điều kiện sử dụng</span>
                    <span style="margin-left: 150px ;color: rgb(0, 0, 209)">Chính sách bảo mật</span>
                </td>
            </tr>

        </table>
    </form>
</body>

</html>
