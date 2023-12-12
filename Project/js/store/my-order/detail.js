//Open and close REPORT dialog
const open_rpt = document.getElementById("order-report");
const close_rpt = document.getElementById("close-report");

const modal_container = document.getElementById("modal-report-container");
const modal_report = document.getElementById("modal-report");

open_rpt.addEventListener('click', ()=> {
    modal_container.style.display = "block";
});

close_rpt.addEventListener('click', ()=> {
    modal_container.style.display = "none";
});

//Confirm or not cancel order
function confirm_cancel() {
    var answer = window.confirm("Xác nhận gửi yêu cầu hủy đơn hàng");
    if(answer)
        console.log("Đã gửi yêu cầu.");
    else
        console.log("Yêu cầu chưa được gửi");
}