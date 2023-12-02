    <?php 
        $title = "Đăng ký";
        include("login-head.php"); ?>

    <!-- modified 10/28 by Quyen -->
    <div class="container bg-white rounded-4">
        <form>
            <h2 class="p-4 text-center">ĐĂNG KÝ</h2>

            <div class="row g-3">
                <div class="col-12 form-floating">
                    <input class="form-control" type="text" id="name" placeholder=" Họ và tên" style="font-size: 12px;">
                    <label for="name" class="form-label">Họ và tên</label>
                </div>

                <div class="col-12 form-floating">
                    <input class="form-control" type="tel" id="phonenumber" placeholder=" Số điện thoại">
                    <label for="phonenumber" class="form-label"> Số điện thoại</label>
                </div>

                <div class="col-12 form-floating" >
                    <input class="form-control" type="password" id="pass" placeholder=" Mật khẩu">
                    <label for="pass" class="form-label"> Mật khẩu</label>
                </div>

                <div class="col-12 form-floating" >
                    <input class="form-control" type="re-password" id="pass" placeholder=" Nhập lại mật khẩu">
                    <label for="re-password" class="form-label"> Nhập lại mật khẩu</label>
                </div>

                <div class="col-12">
                    <input type="checkbox" id="remember"> Đồng ý với "Điều kiện sử dụng" và "Chính sách bảo mật"
                </div>

                <div class="col-12">
                    <button class="btn btn-confirm w-100" onclick="register()">Đăng ký</button>
                </div>
                
                <div class="col-6 text-center">
                    <a href="" class="text-primary float-start">Điều kiện sử dụng</a>
                </div>

                <div class="col-6 text-center">
                    <a href="" class="text-primary float-end">Chính sách bảo mật</a>
                </div>

            </div>
        </form>
    </div>
</body>

</html>
