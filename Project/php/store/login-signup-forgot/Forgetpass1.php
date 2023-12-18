
<?php 
    $title = "Lấy lại mật khẩu";
    include("./login-head.php"); ?>
 
    <div class="container bg-white rounded-4" style="height:480px;">
        <form>
            <div class="text-center">
                <h2 class="p-4 text-center">Quên mật khẩu?</h2>
                <p>Nhập tên đăng nhập và số điện thoại để lấy lại mật khẩu.</p>
            </div>
            <div class="form-floating col-12 m-1 mb-3">
                <input class="form-control" type="text" id="userlogin" placeholder=" Tên đăng nhập" required
                    oninvalid="this.setCustomValidity('Vui lòng nhập tên đăng nhập.')"
                    oninput="this.setCustomValidity('')">
                <label for="userlogin" class="form-label"> Tên đăng nhập</label>
            </div>

            <div class="form-floating col-12 m-1 mb-2">
                <input class="form-control" type="text" id="phonenumber" placeholder=" Số điện thoại" required pattern="^0[0-9]{9}$" 
                oninvalid="this.setCustomValidity('Yêu cầu nhập số điện thoại có 10 số và bắt đầu =0.')" 
                oninput="this.setCustomValidity('')">
                <label for="phonenumber" class="form-label"> Số điện thoại</label>
            </div>

            <div class="btn-container col-12 m-1">
                <button class="btn btn-confirm forget-pw" style="width: 100%;">Tiếp tục</button>
                <a class="btn btn-cancel w-100" href="./Login.php">Quay lại</a>
            </div>
            
        </form>
    </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="module" src="../../../js/store/account-management/ForgetPw.js"></script>
</body>

</html>

