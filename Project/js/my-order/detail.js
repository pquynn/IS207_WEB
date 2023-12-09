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

var orderId;
const showOrderId= $('#orderId');
const showOrderStatus = $('.order-status');
const showOrderDate = $('#date-create-order');

const showCusName = $('#cus-name');
const showCusTel = $('#cus-tel');
const showCusAdd = $('#cus-add'); //address
const showCusPay = $('#cus-pay');

const totalOrderCost = $('.cost.order');
const totalOrderPromotion = $('.cost.promotion');
const totalOrder = $('.cost.total');

$(document).ready(function() {
    orderId =  new URLSearchParams(window.location.search).get('id');
    fetchData_Customer(orderId);
});

function fetchData_Customer(orderId) {
    $.ajax({
        url: "../../../php/store/account-management/Controller/my-order-detail-controller.php?action=detail",
        type: 'GET',
        data: {orderId: orderId},
        dataType: 'json',
        success: function (response) {
            var data_cus = response.data1; //khách hàng
            var data_pro = response.data2; //sản phẩm
            if(!data_cus) console.log("dữ liệu khách hàng rỗng");
            if(!data_pro) console.log("dữ liệu sản phẩm rỗng");
            
            data_cus.forEach(function(row) {
                //thêm order_id
                showOrderId.text(`${row.order_id}`);
                //thêm order status
                showOrderStatus.text(`${row.status}`);
                var status = `${row.status}`;
                editStatus(status);
                //thêm order date
                showOrderDate.append(`${row.order_date}`);

                //thêm thông tin khách hàng
                showCusName.append(`${row.name}`);
                showCusTel.append(`${row.telephone}`);
                showCusAdd.append(`${row.address}`);
                showCusPay.text(`${row.pay}`);

                //show order-cost
                totalOrderCost.append(`${row.total_price}đ`);
                totalOrderPromotion.append(`0đ`);
                totalOrder.append(`${row.total_price}đ`);
            });

            //thêm thông tin sản phẩm
            var table_pro = $('.tbody-product');
            data_pro.forEach(function(row) {
                var imageUrl = 'data:image/png;base64,' + row.first_picture;
                table_pro.append(`
                <tr>
                    <td>${row.product_id}</td>
                    <td>${row.size}</td>
                    <td>${row.product_name}</td>
                    <td><div class="table-img" style="background-image: url(${imageUrl})"></div></td>
                    <td>${row.quantity}</td>
                    <td>${row.price}</td>
                </tr>
                `);
            });
        },
        error: function() {
            console.error("Loi ket noi");
        }
    });    
}

function editStatus(status) {
    
    if(status == "Giao thành công") {
        showOrderStatus.addClass('success');
    }
    else if (status == "Đang chuẩn bị hàng" || status == "Đang giao hàng") {
        showOrderStatus.addClass('pending');
    }
    else if (status == "Đã hủy") {
        showOrderStatus.addClass('cancel');
    }
    else
        console.log("lỗi");
}