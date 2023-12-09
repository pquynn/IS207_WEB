var orderId;
const showOrderId= $('#orderId');
const showOrderStatus = $('.order-status');
const showOrderDate = $('.date-order span');

const showCusName = $('#cus-name');
const showCusTel = $('#cus-tel');
const showCusAdd = $('#cus-add'); //address
const showCusPay = $('#cus-pay');

const totalOrderCost = $('.cost.order');
const totalOrderPromotion = $('.cost.promotion');
const totalOrder = $('.cost.total');

const modal_name = $('#customer-name');
const modal_tel = $('#customer-tel');
const modal_add = $('#customer-address');
const modal_pay = $('#customer-pay');

$(document).ready(function() {
    orderId =  new URLSearchParams(window.location.search).get('id');
    fetchData_Customer(orderId);

    $('.btn-cancel').on('click', function() {
        if(confirm("Xác nhận hủy các thay đổi?")) {
            //modal_name.val(showCusName.text());
            //modal_tel.val(showCusTel.text());
            var url='../../php/admin/OrderDetail.php?id='+ orderId;
            window.location.href = url;   
        }
    });

    //chỉnh sửa thông tin khách hàng: tên, số điện thoại
    $('#edit-customer-info .btn-confirm').on('click', function() {
            var form_data = {
                id: orderId,
                name: $('#customer-name').val(),
                tel: $('#customer-tel').val()
            };        
        if(confirm("Xác nhận thay đổi thông tin?")) {

            /*var form = $('#edit-customer-info form');
            Array.from(form).forEach(form_element => {
                if(form_element.validate() === false){
                    event.stopPropagation();
                }
                else{}
                                       
            })*/
            if (form_data.name != showCusName.val() || form_data.tel != showCusTel.val())
                updateInfoCus(form_data);        
        }
        else {}
        //else{
        //    var url='../../php/admin/OrderDetail.php?id='+ form_data.id;
        //    window.location.href = url;
            //fetchData_Customer(form_data.id);   
        //}
    })

    //chỉnh sửa thông tin khách hàng: địa chỉ
    $('#edit-customer-address .btn-confirm').on('click', function() {
            var form_data = {
                id: orderId,
                address: $('#customer-address').val()
            };        
        if(confirm("Xác nhận thay đổi thông tin?")) {

            /*var form = $('#edit-customer-info form');
            Array.from(form).forEach(form_element => {
                if(form_element.validate() === false){
                    event.stopPropagation();
                }
                else{}
                                       
            })*/
            if (form_data.address != showCusAdd.val())
                updateCusAddress(form_data);
        }
        else {
            //bị lỗi
            var url='../../php/admin/OrderDetail.php?id='+ form_data.id;
            window.location.href = url;
        }
    })

    //chỉnh sửa thông tin khách hàng: phương thức thanh toán
    $('#edit-customer-payment .btn-confirm').on('click', function() {
        if(confirm("Xác nhận thay đổi thông tin?")) {
            var form_data = {
                id: orderId,
                pay: $('#customer-pay').val()
            };
            /*var form = $('#edit-customer-info form');
            Array.from(form).forEach(form_element => {
                if(form_element.validate() === false){
                    event.stopPropagation();
                }
                else{}
                                       
            })*/
            if (form_data.pay != showCusPay.val()){
                updateCusPay(form_data);
            }    
        }
        else {}
    })    
    //thay đổi trạng thái đơn hàng
    $('#edit-order-status .btn-confirm').on('click', function() {
       
        if(confirm("Xác nhận thay đổi thông tin?")) {
            var form_data = {
                id: orderId,
                order_status: $("input[type='radio'][name='status-order']:checked").val()
            };             
            updateStatus(form_data);  
        }
    })    

});

function updateInfoCus(form_data) {
    $.ajax({
        url: "../../php/admin/ORDERS/order-detail-controller.php?action=updateInfoCus",
        type: 'GET',
        data: {name: form_data.name, tel: form_data.tel, id: form_data.id},
        dataType: 'json',
        success: function(result) {
            if(result == true) {
                alert("Cập nhật thông tin thành công");
                var url='../../php/admin/OrderDetail.php?id='+ form_data.id;
                window.location.href = url;       
            }
            else 
                alert("Cập nhật không thành công");
        },
        error: function() {
            console.error("Loi ket noi");
        }
    });       
}

function updateCusAddress(form_data) {
    $.ajax({
        url: "../../php/admin/ORDERS/order-detail-controller.php?action=updateCusAddress",
        type: 'GET',
        data: {address: form_data.address, id: form_data.id},
        dataType: 'json',
        success: function(result) {
            if(result == true) {
                alert("Cập nhật thông tin thành công");
                var url='../../php/admin/OrderDetail.php?id='+ form_data.id;
                window.location.href = url;        
            }
            else {
                alert("Cập nhật không thành công");
                var url='../../php/admin/OrderDetail.php?id='+ form_data.id;
                window.location.href = url;   
            }          
        },
        error: function() {
            console.error("Loi ket noi");
        }
    });
}

function updateCusPay(form_data) {
    $.ajax({
        url: "../../php/admin/ORDERS/order-detail-controller.php?action=updateCusPay",
        type: 'GET',
        data: {pay: form_data.pay, id: form_data.id},
        dataType: 'json',
        success: function(result) {
            if(result == true) {
                alert("Cập nhật thông tin thành công");
                var url='../../php/admin/OrderDetail.php?id='+ form_data.id;
                window.location.href = url;        
            }
            else {
                alert("Cập nhật không thành công");
                var url='../../php/admin/OrderDetail.php?id='+ form_data.id;
                window.location.href = url;   
            }          
        },
        error: function() {
            console.error("Loi ket noi");
        }
    });
}

function updateStatus(form_data) {
    $.ajax({
        url: "../../php/admin/ORDERS/order-detail-controller.php?action=updateStatus",
        type: 'GET',
        data: {order_status: form_data.order_status, id: form_data.id},
        dataType: 'json',
        success: function(result) {
            if(result == true) {
                alert("Cập nhật thông tin thành công");
                var url='../../php/admin/OrderDetail.php?id='+ form_data.id;
                window.location.href = url;        
            }
            else {
                alert("Cập nhật không thành công");
                var url='../../php/admin/OrderDetail.php?id='+ form_data.id;
                window.location.href = url;   
            }          
        },
        error: function() {
            console.error("Loi ket noi");
        }
    });
}

function fetchData_Customer(orderId) {
    $.ajax({
        url: "../../php/admin/ORDERS/order-detail-controller.php?action=detail",
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
                showOrderDate.text(`${row.order_date}`);

                //thêm thông tin khách hàng
                showCusName.append(`${row.name}`);
                showCusTel.append(`${row.telephone}`);
                showCusAdd.append(`${row.address}`);
                showCusPay.text(`${row.pay}`);

                //show order-cost
                totalOrderCost.append(`${row.total_price}đ`);
                totalOrderPromotion.append(`0đ`);
                totalOrder.append(`${row.total_price}đ`);

                //thêm dữ liệu vào modal chỉnh sửa thông tin
                modal_name.val(`${row.name}`);
                modal_tel.val(`${row.telephone}`);
                modal_add.val(`${row.address}`);
                modal_pay.val(`${row.pay}`);
            });

            //thêm thông tin sản phẩm - còn thiếu hình ảnh sản phẩm
            var table_pro = $('.tbody-product');
            data_pro.forEach(function(row) {
                var imageUrl = 'data:image/png;base64,' + row.first_picture;
                table_pro.append(`
                <tr>
                    <td>${row.order_id}</td>
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

/*function PaymentInfo(divID, element) {
    document.getElementById(divID).style.display = element.value == 1? 'block': 'none';
}*/
