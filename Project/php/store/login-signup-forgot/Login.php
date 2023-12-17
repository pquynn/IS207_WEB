    <?php 
        $title = "Đăng nhập";
        include("./login-head.php"); ?>
 
    <div class="container bg-white rounded-4">
        <form>
            <h2 class="p-4 text-center">ĐĂNG NHẬP</h2>

            <div class="row g-3">
                <!-- <div class="col-12 form-floating">
                    <input class="form-control" type="text" id="phonenumber" placeholder=" Số điện thoại" >
                    <label for="name" class="form-label"> Số điện thoại</label>
                </div> -->
                <!-- t đổi thông tin login từ điện thoại thành tên đăng nhập nha,
                khi quên mật khẩu thì mới cần sđt, kiểu v  -->
                <div class="col-12 form-floating">
                    <input class="form-control" type="text" id="login_name" placeholder=" Tên đăng nhập" style="font-size: 12px;">
                    <label for="login_name" class="form-label">Tên đăng nhập</label>
                </div>

                <div class="col-12 form-floating" >
                    <input class="form-control" type="password" id="pass" placeholder=" Mật khẩu">
                    <label for="pass" class="form-label"> Mật khẩu</label>
                </div>

                <div class="col-6 d-inline">
                    <input type="checkbox" id="remember">
                    <label for="remember" class="form-label" style="color: var(--light-text);">Ghi nhớ mật khẩu</label>
                </div>

                <div class="col-6">
                    <a href="" class="float-end" style="color: var(--light-text);" data-bs-toggle="modal" data-bs-target="#forgetpass">Quên mật khẩu?</a>
                </div>

                <div class="col-12">
                    <button class="btn btn-confirm w-100" onclick="submit()">Đăng nhập</button>
                </div>
                
                <div class="col-12 text-center">
                    <span style="color: var(--light-text);">Không có tài khoản?</span>
                    <a href="" style="color: var(--orange);"><b>Đăng kí ở đây</b></a>
                </div>
            </div>   
        </form>
    </div>
   

</body>

</html>
