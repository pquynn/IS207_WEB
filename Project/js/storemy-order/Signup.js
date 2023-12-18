import { showToastr } from "../admin/toastr.js";

$(document).ready(function () {
    $('.btn-confirm').click(function (event){
        event.preventDefault();
        // Lấy giá trị từ các trường nhập liệu
        var name = document.getElementById('name').value;
        var customerphone = document.getElementById('customerphone').value;
        var userlogin = document.getElementById('userlogin').value;
        var password = document.getElementById('password').value;
        var repassword = document.getElementById('repassword').value;
        // var acceptCheckbox = document.getElementById('accept');

        // Kiểm tra xác nhận đồng ý với điều khoản
        // if (!acceptCheckbox.checked) {
        //     alert('Vui lòng đồng ý với Điều kiện sử dụng và Chính sách bảo mật.');
        //     return;
        // }
        // Kiểm tra mật khẩu nhập lại
        if (password !== repassword) {
            showToastr('error', 'Mật khẩu không khớp. Vui lòng nhập lại.');
        }
        else{
            // Gửi dữ liệu đăng ký lên server 
            // var xhr = new XMLHttpRequest();
            // xhr.open('POST', '../../store/login-signup-forgot/Signup.php', true);
            // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            
            var name= encodeURIComponent(name), 
            userlogin=  encodeURIComponent(userlogin),
            customerphone= encodeURIComponent(customerphone),
            password=  encodeURIComponent(password);
         
            // xhr.onreadystatechange = function () {
            //     if (xhr.readyState == 4 && xhr.status == 200) {
            //         // Xử lý kết quả từ server (nếu cần)
            //         var response = xhr.responseText;
            //         console.log(response);
            //         if(response == true){
            //             showToastr('success', 'Đăng ký thành công.');
            //         }
            //         else
            //             showToastr('error', 'Đăng ký không thành công. Tên đăng nhập đã tồn tại.');
            //     }
            // };  
            $.ajax({
                url: '../../controller/store/login-signup-forgotpw/signup-controller.php',
                type: 'POST',
                data: { name:name, 
                        userlogin:userlogin, 
                        customerphone:customerphone, 
                        password:password },
                success: function (response) {
                    if(response == true){
                        var signup = '1';
                        var encode_signup = encodeURIComponent(signup);
                        window.location.href = "../../store/login-signup-forgot/Login.php?signup=" + encode_signup;  
                    }
                    else
                        showToastr('error', 'Đăng ký không thành công. Tên người dùng đã tồn tại');
                },
                error: function () {
                    showToastr('error', 'Đăng ký không thành công.');
                }
            });
        }
    })
});
