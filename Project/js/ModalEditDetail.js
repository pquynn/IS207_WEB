function savechange() {
    // Lấy giá trị từ các trường nhập liệu
    var name = document.getElementById('name').value;
    var dateOfBirth = document.getElementById('dateofbirth').value;
    var gender = document.querySelector('input[name="gioitinh"]:checked').value;

    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../php/ModalEditDetail.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);
    // Gửi dữ liệu 
    var data = "name=" + encodeURIComponent(name) +
               "&dateOfBirth=" + encodeURIComponent(dateOfBirth) +
               "&gender=" + encodeURIComponent(gender);

    // Xử lý khi có phản hồi từ server
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if (response === "success") {
                alert("Lưu thay đổi thành công!");
                location.reload();
            } else {
                alert("Lỗi khi lưu. Vui lòng thử lại.");
            }
        }
    };

}

function cancel() {
    var myModal = new bootstrap.Modal(document.getElementById('edit-detail'));
    myModal.hide();
}
