
<?php 
    include('../../controller/connect.php');
    global $conn;

    $title = "Lấy lại mật khẩu";
        
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
<?php include("./login-head.php"); ?>
 
    <div class="container bg-white rounded-4" style="height:400px;">
        <form>
            <div class="text-center">
                <h2 class="p-4 text-center">Quên mật khẩu?</h2>
                <p>Nhập số điện thoại để nhận hướng dẫn lấy lại mật khẩu.</p>
            </div>
            
            <div class="form-floating col-12 m-1 mb-1">
                <input class="form-control" type="text" id="phonenumber" placeholder=" Số điện thoại" required
                    oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại.')"
                    oninput="this.setCustomValidity('')">
                <label for="phonenumber" class="form-label"> Số điện thoại</label>
            </div>

            <?php if (isset($error) && $error): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <div class="btn-container col-12 m-1">
                <button class="btn btn-confirm" style="width: 100%;">Tiếp tục</button>
                <a class="btn btn-cancel w-100" href="Login.php" onclick="regturnback()">Quay lại</a>
            </div>
            
        </form>
    </div>
   
</body>

</html>

