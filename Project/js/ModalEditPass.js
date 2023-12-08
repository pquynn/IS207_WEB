function savechange() {
    var oldPassword = document.getElementById('oldpassword').value;
    var newPassword = document.getElementById('newpassword').value;

    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "change_password.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("oldPassword=" + oldPassword + "&newPassword=" + newPassword);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };
}

function cancel() {
    var myModal = new bootstrap.Modal(document.getElementById('edit-pass'));
    myModal.hide();
}
