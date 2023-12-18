<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../../../css/Login.css">
    <link rel="stylesheet" href="../../../css/base.css">
    <script src="../../../js/Login.js"></script>
</head>

<body>
    <?php
    $title = "Đăng nhập";
    include("../../controller/connect.php");

    // Xử lý form đăng nhập
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu từ form đăng nhập
        $userlogin = $_POST['userlogin'];
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
            if (password_verify($password, $passwordFromDatabase)) {
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
                echo json_encode(['status' => 'error', 'message' => 'Tên đăng nhập hoặc mật khẩu không đúng.']);
            }
        } else {
            // Đăng nhập thất bại
            echo json_encode(['status' => 'error', 'message' => 'Tên đăng nhập hoặc mật khẩu không đúng.']);
        }
        $stmt->close();
    }
    $conn->close();
    ?>
    <form method="post" onsubmit="return validateLogin()">
    <table>
            <tr>
                <td colspan="2">
                    <h1>LOGIN</h1>
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="text" id="userlogin" placeholder=" Tên đăng nhập" required
                        oninvalid="this.setCustomValidity('Vui lòng nhập tên đăng nhập.')"
                        oninput="this.setCustomValidity('')">
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="password" id="pass" placeholder=" Mật khẩu" required
                        oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu.')"
                        oninput="this.setCustomValidity('')">
                </th>
            </tr>
            <tr>
                <td><input type="checkbox" id="remember">Ghi nhớ mật khẩu</td>
                <td style="text-align: right;">
                    <a href="Forgetpass1.html" onclick="forgotPassword()">
                        <b>Quên mật khẩu?</b>
                    </a>
                </td>
            </tr>
            <tr>
                <td id="messageContainer" class="messageContainer">
                </td>
            </tr>
            <tr>
                <th colspan="2"><button type="submit" class="btn btn-confirm">Đăng nhập</button></th>
            </tr>
            <tr>
                <th colspan="2">
                    <b>Không có tài khoản?</b>
                    <a href="Signup.html">
                        <b style="color: green;">Đăng kí ở đây</b>
                    </a>
                </th>
            </tr>

        </table>
    </form>
</body>

</html>
