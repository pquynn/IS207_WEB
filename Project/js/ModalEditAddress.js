function savechange() {
    var name = document.getElementById('name').value;
    var phoneNumber = document.getElementById('phonenumber').value;
    var province = document.getElementById('province').value;
    var district = document.getElementById('district').value;
    var specificAddress = document.getElementById('specificaddress').value;
    
    var data = 'name=' + encodeURIComponent(name) +
    '&phoneNumber=' + encodeURIComponent(phoneNumber) +
    '&province=' + encodeURIComponent(province) +
    'specificAddress=' + encodeURIComponent(specificAddress);
    xhr.send(data);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/save_changes.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the server if needed
            console.log(xhr.responseText);
        }
    };
}
function cancel() {
    var myModal = new bootstrap.Modal(document.getElementById('edit-address'));
    myModal.hide();
}
