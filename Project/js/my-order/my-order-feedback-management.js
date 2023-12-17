
$(document).ready(function() {
    orderId =  new URLSearchParams(window.location.search).get('id');

    var linkOrderDetail = $('#link-back-order-detail');
    linkOrderDetail.append(`
        <a href="my-order-detail.php?id=${orderId}">Chi tiết đơn hàng</a> / 
    `);

    showFormFb(orderId);
    $('#add-feedback').on('click', '.btn-cancel', function(event) {
        event.preventDefault();
        if(confirm("Những thay đổi của bạn sẽ không được lưu?")) {
            showFormFb(orderId);
        }
        
    })

    $('.my-order-rating').on('click', '.btn-input-feedback',function(event) {
        event.preventDefault();
        var closest_row = $(this).closest('tr');
        product_id = closest_row.find('td:first').text();
        $('.add-order-feedback').trigger("reset");
        $('#ModalproductID').val(product_id);
        $('#ModalproductID').text(product_id);
        
    })

    $('#add-feedback').on('click','.btn-confirm', function(event){
        event.preventDefault();

        product_id = $('#ModalproductID').val();
        feedback_content = $('.input-feedback').val();
        feedback_star = $("input[type='radio'][name='rating']:checked").val();

        formdata = {
            orderId: orderId,
            productId: product_id,
            fb_content: feedback_content,
            fb_score: feedback_star
        }
        
        if(confirm("Xác nhận đánh giá đơn hàng?")) {
            addComment(formdata);
        }
    })
    
})

function addComment(formdata) {
    $.ajax({
        url: "../../../php/Controller/store/my-order-feedback-controller.php",
        type: 'POST',
        data: { action: 'feedback',
                orderId: formdata.orderId,
                productId: formdata.productId,
                fb_content: formdata.fb_content,
                fb_score: formdata.fb_score},
        dataType: 'json',
        success: function (result) {
            if(result.result==true){
                alert("Đánh giá thành công!");
                $('#add-feedback').modal('hide');
                
                var classString = '.btn-input-feedback.pro-' + formdata.productId;
                $(classString).removeAttr('data-bs-target');
                var btn_feedback = $(classString);
                btn_feedback.addClass("done");
                btn_feedback.text("Đã đánh giá");               
            }
            else {
                alert("Đánh giá không thành công");

            }
        },
        error: function() {
            console.error("Lỗi kết nối: thêm đánh giá");
        }
    });
}

function showFormFb(id) {
    $.ajax({
        url: "../../../php/Controller/store/my-order-feedback-controller.php",
        type: 'POST',
        data: {action:'fetch', orderId: orderId},
        dataType: 'json',
        success: function (response) {
            var data1= response.data1; //sản phẩm
            if(!data1) console.log("dữ liệu sản phẩm rỗng");

            var listPro = $('.my-order-rating tbody');
            var modalProId = $('.modal-title');
            data1.forEach(function(row) {
                var imageUrl = 'data:image/png;base64,' + row.first_picture;
                listPro.append(`
                    <tr class="tbl-fb-row">
                        <td>${row.product_id}</td>
                        <td class="td-img"><div class="table-img" style="background-image: url(${imageUrl})"></div></td>
                        <td>
                            ${row.product_name}
                           <a href="#" class="btn-input-feedback pro-${row.product_id}" data-bs-toggle="modal" data-bs-target="#add-feedback">
                            Viết đánh giá                            
                        </td>
                        <td>${row.size}</td>
                        <td>${row.quantity}</td>
                        <td>${row.price}</td>
                    </tr>
                `);
            })
        },
        error: function() {
            console.error("Lỗi kết nối: fetch data feedback");
        }
    });    
}