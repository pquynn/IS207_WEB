
<div class="modal fade" id="forgetpass" tabindex="-1" aria-labelledby="modal-forgetpass" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header" style="border-bottom: none;">
            <div class="logo-box text-center">
                <img src="../../../img/logo.png" style="max-width: 20%; height: auto;">
            </div>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="text-center">
                    <h1 class="modal-title fs-5" id="modal-address">Quên mật khẩu?</h1>
                    <p>Nhập số điện thoại để nhận hướng dẫn lấy lại mật khẩu.</p>
                </div>
                
                <div class="form-floating col-12 m-1">
                    <input class="form-control" type="text" id="phonenumber" placeholder=" Số điện thoại">
                    <label for="phonenumber" class="form-label"> Số điện thoại</label>
                </div>

                <div class="btn-container col-12 m-1">
                    <button class="btn btn-confirm" onclick="submit()" style="width: 100%;" data-bs-toggle="modal" data-bs-target="#forgetpass2">Tiếp tục</button>
                </div>
                
            </form>
        </div>
    </div>
    </div>
</div>


<?php include("Forgetpass2.php"); ?>

