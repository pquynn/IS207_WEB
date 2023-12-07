var listProduct = [];
var size;

// $('btn-size').click(function () {
//     alert($(this).text());
// });

$('.btn-cancel').click(function () {
    // Lấy giá trị từ các trường dữ liệu (ví dụ: input fields)
    var productName = $('.product-name').text();
    // var productPrice = parseFloat($('#productPriceInput').val()); // Chuyển đổi sang kiểu số
    // var productColor = $('#productColorInput').val();

    // Kiểm tra xem có dữ liệu hợp lệ không
    if (productName) {
        // Tạo đối tượng sản phẩm
        var newProduct = { name: productName};

        // var newProduct = { name: productName, price: productPrice, color: productColor };

        // Thêm sản phẩm vào mảng
        listProduct.push(newProduct);

        // In ra mảng để kiểm tra
        console.log(listProduct);

        // Nếu bạn muốn thực hiện các hành động khác sau khi thêm dữ liệu, bạn có thể đặt mã ở đây.
    } else {
        alert('Vui lòng nhập đầy đủ thông tin sản phẩm.');
    }
    //alert($('.product-name').text());
});

