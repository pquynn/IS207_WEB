<?php
// Kết nối đến cơ sở dữ liệu
// include("../../controller/connect.php");
// global $conn;

// // Xử lý form đăng kí
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Lấy dữ liệu từ form đăng kí
//     $name = trim($_POST['name'], " ");
//     $userlogin = trim($_POST['userlogin'], " ");
//     $customerphone = trim($_POST['customerphone'], " ");
//     $password = trim($_POST['password'], " ");
//     $userid = generateUserId();
//     //kiểm tra tên đăng nhập đã tồn tại chưa
//     $sql = "SELECT COUNT(*) as count FROM login WHERE user_login = '$userlogin'";
//     $result = $conn->query($sql);

//     if ($result) {
//         $row = $result->fetch_assoc();
//         if($row['count'] == 0){ //nếu không tồn tại tên đăng nhập
//             // Hash mật khẩu nhập vào
//             $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

//             // Thực hiện thêm dữ liệu vào bảng 'login'
//             $sql_login = "INSERT INTO `login` (USER_LOGIN, USER_PASSWORD, ROLE_ID) VALUES (?, ?, 3)";
//             $stmt_login = $conn->prepare($sql_login);
//             $stmt_login->bind_param("ss", $userlogin, $hashedPassword);
//             $result_login = $stmt_login->execute();

//             if($result_login){
//                 // Thực hiện thêm dữ liệu vào bảng 'users'
//                 $sql_users = "INSERT INTO `users` (USER_ID, USER_LOGIN, USER_NAME, USER_TELEPHONE, DAY_ADD) VALUES (?, ?, ?, ?, now())";
//                 $stmt_users = $conn->prepare($sql_users);
//                 $stmt_users->bind_param("ssss", $userid, $userlogin, $name, $customerphone);
//                 $result_users = $stmt_users->execute();

//                 if ($result_users) {
//                     // echo json_encode(true);
//                     echo true;
//                 } else  echo false;
//                     // echo json_encode(['result' => false, 'message' => 'Đăng ký không thành công']);
                
//             }
//             else echo false;
//             // echo json_encode(['result' => false, 'message' => 'Đăng ký không thành công']);

//             $stmt_users->close();
//             $stmt_login->close();
//         }
//         else echo false;
//         // echo json_encode(['result' => false, 'message' => 'Đăng ký không thành công. Tên đăng nhập đã tồn tại']);
//     } else echo false;
//         // Error in the query
//         // echo json_encode(['result' => false, 'message' => 'Đăng ký không thành công']);;
    
// }

// function generateUserId($prefix = 'KH') {
//     // Use a combination of prefix and a unique identifier (timestamp and random number)
//     $uniqueId = time() . mt_rand(1000, 9999);

//     // Concatenate the prefix and unique identifier to create the user_id
//     $userId = $prefix . $uniqueId;

//     return $userId;
// }
// $conn->close();
?>


<?php 
    $title = "Đăng ký";
    include("login-head.php"); ?>

    <div class="container bg-white rounded-4"  style="height: 650px;">
        <form>
            <h2 class="p-4 text-center">ĐĂNG KÝ</h2>

            <div class="row g-3">
                <div class="col-12 form-floating">
                    <input class="form-control" type="text" id="name" placeholder=" Họ và tên" style="font-size: 12px;"required
                    oninvalid="this.setCustomValidity('Vui lòng nhập họ và tên.')"
                    oninput="this.setCustomValidity('')">
                    <label for="name" class="form-label">Họ và tên</label>
                </div>

                <div class="col-12 form-floating">
                    <input class="form-control" type="tel" id="customerphone" placeholder=" Số điện thoại" required pattern="^0[0-9]{9}$"
                    oninvalid="this.setCustomValidity('Yêu cầu nhập số điện thoại có 10 số và bắt đầu =0')"
                    oninput="this.setCustomValidity('')">
                    <label for="customerphone" class="form-label"> Số điện thoại</label>
                </div>

                <div class="col-12 form-floating">
                    <input class="form-control" type="text" id="userlogin" placeholder=" Tên đăng nhập" style="font-size: 12px;"required
                    oninvalid="this.setCustomValidity('Vui lòng nhập tên tài khoản.')"
                    oninput="this.setCustomValidity('')">
                    <label for="userlogin" class="form-label">Tên đăng nhập</label>
                </div>

                <div class="col-12 form-floating" >
                    <input class="form-control" type="password" id="password" placeholder=" Mật khẩu"required
                    oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu.')"
                    oninput="this.setCustomValidity('')">
                    <label for="password" class="form-label"> Mật khẩu</label>
                </div>

                <div class="col-12 form-floating" >
                    <input class="form-control" type="password" id="repassword" placeholder=" Nhập lại mật khẩu" required
                    oninvalid="this.setCustomValidity('Vui lòng nhập lại mật khẩu.')"
                    oninput="this.setCustomValidity('')">
                    <label for="repassword" class="form-label"> Nhập lại mật khẩu</label>
                </div>

                <div class="col-12">
                    <button class="btn btn-confirm w-100">Đăng ký</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="module" src="../../../js/storemy-order/Signup.js"></script>
</body>

</html>
