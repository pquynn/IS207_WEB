function signup() {
    // Lấy giá trị từ các trường nhập liệu
    var name = document.getElementById('name').value;
    var phoneNumber = document.getElementById('phonenumber').value;
    var password = document.getElementById('password').value;
    var repassword = document.getElementById('repassword').value;
    var acceptCheckbox = document.getElementById('accept');

    // Kiểm tra xác nhận đồng ý với điều khoản
    if (!acceptCheckbox.checked) {
        alert('Vui lòng đồng ý với Điều kiện sử dụng và Chính sách bảo mật.');
        return;
    }

    // Kiểm tra mật khẩu nhập lại
    if (password !== repassword) {
        alert('Mật khẩu không khớp. Vui lòng nhập lại.');
        return;
    }

    // Gửi dữ liệu đăng ký lên server 
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/signup.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    
    var data = 'name=' + encodeURIComponent(name) +
    '&phoneNumber=' + encodeURIComponent(phoneNumber) +
    '&password=' + encodeURIComponent(password);
    xhr.send(data);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Xử lý kết quả từ server (nếu cần)
            var response = xhr.responseText;
        }
    };  
} 

    
