import { showToastr } from "../admin/toastr.js";


// XyZ!aBc@123
$(document).ready(function() {
    $('#edit-pass .btn-confirm').on('click', function(e){
        e.preventDefault();
        var oldPassword = document.getElementById('oldpassword').value;
        var newPassword = document.getElementById('newpassword').value;
    
        if(oldPassword.localeCompare('') != 0 && newPassword.localeCompare('') != 0){
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../../controller/store/login-signup-forgotpw/account-controller.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("oldPassword=" + oldPassword + "&newPassword=" + newPassword + "&action=" + 'reset_password');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    
                    console.log(xhr.responseText);
                    var response = JSON.parse(xhr.responseText);
                    console.log(response);
                    if (response.status === "success") {
                        $('#edit-pass').modal('hide');
                        showToastr('success', response.message);
                    }
                    else
                        // Đăng nhập thất bại, hiển thị thông báo lỗi
                        showToastr('error', response.message);
                }
            };
        }
    })
    
    $('#edit-pass .btn-cancel').on('click', function(e){
        if(confirm('Những thay đổi của bạn sẽ không được lưu?')){
            var myModal = new bootstrap.Modal(document.getElementById('edit-pass'));
            myModal.hide();
        }
        else{
        }
    })

});
