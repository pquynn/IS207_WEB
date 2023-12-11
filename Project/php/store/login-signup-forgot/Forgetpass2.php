<?php 
        $title = "Quên mật khẩu ";
        include("./login-head.php"); ?>
 <div class="container bg-white rounded-4">
        <form>
            <div class="logo-box text-center">
                <img src="../../../img/message.jpg" style="max-width: 20%; height: auto;">
            </div>
            <h2 class="p-4 text-center">Kiểm tra tin nhắn</h2>
            <p class="text-center">Chúng tôi vừa gửi đến số điện thoại bạn hướng dẫn để thiết lập lại mật khẩu. Nếu không thấy vui lòng nhấp vào nút "Gửi lại".</p>
            
            <div class="btn-container col-12 m-1">
                <button class="btn btn-confirm" onclick="resend()" style="width: 100%;">Gửi lại</button>
                <button class="btn btn-cancel" onclick="" style="width: 100%;">Tiếp tục Đăng nhập</button>
            </div>
               
        </form>
    </div>
</body>

</html>