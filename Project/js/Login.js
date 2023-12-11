function validateLogin() {
  var phonenumber = document.getElementById("phonenumber").value;
  var pass = document.getElementById("pass").value;

  // gửi dữ liệu đăng nhập lên server
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../../php/login.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  var data = "phonenumber=" + encodeURIComponent(phonenumber) + "& pass=" + encodeURIComponent(pass);
  xhr.send(data);

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = JSON.parse(xhr.responseText);
      if (response.status === "success") {
        //Phân quyền
        var role = response.role;
            if (role === 'admin') {
                // Link tới admin
                window.location.href = "#";
            } else if (role === 'staff') {
                // Link tới staff
                window.location.href = "#";
            } else {
                // Link tới User
                window.location.href = "#";
            }
        
      } else {
        // Đăng nhập thất bại, hiển thị thông báo lỗi
        document.getElementById("messageContainer").innerHTML =
          '<p class="error-message">' + response.message + "</p>";
      }
    }
  };
  return false;
}
