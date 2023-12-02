function btn_trash_order() {
    var answer = window.confirm("Xác nhận xóa");
    if(answer)
        console.log("Đã xóa.");
    else
        console.log("Chưa được xóa.");
}