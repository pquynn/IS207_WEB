
<?php 
        $title = "Lấy lại mật khẩu";
        include("./login-head.php"); ?>
 
    <div class="container bg-white rounded-4" style="height:400px;">
        <form>
            <div class="text-center">
                <h2 class="p-4 text-center">Quên mật khẩu?</h2>
                <p>Nhập số điện thoại để nhận hướng dẫn lấy lại mật khẩu.</p>
            </div>
            
            <div class="form-floating col-12 m-1 mb-1">
                <input class="form-control" type="text" id="phonenumber" placeholder=" Số điện thoại">
                <label for="phonenumber" class="form-label"> Số điện thoại</label>
            </div>

            <div class="btn-container col-12 m-1">
                <button class="btn btn-confirm" onclick="submit()" style="width: 100%;">Tiếp tục</button>
                <button class="btn btn-cancel w-100">Quay lại</button>
            </div>
            
        </form>
    </div>
   

</body>

</html>

