// Fetch data using AJAX
$(document).ready(function () {

    $.ajax({
        url: '../../controller/homepage-shopping/product_list-controller.php?action=fetch',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            data.forEach(function (row) {
                var imageUrl = 'data:first_picture/png;base64,' + row.first_picture;
                var moneyString = formatNumber(row.price);
                $('.product-list').append(`
                    <div class="product-detail">
                        <div class="product-img--container">
                            <img src="${imageUrl}">
                        </div>
                        <a href="#">${row.product_name}</a> 
                        <p>${moneyString} VND</p>
                    </div>
                `);
            });
        },
        error: function () {
            console.error('Failed to fetch data from the server.');
        }
    });

    function formatNumber(input) {
        let strNumber = String(input);

        // Split the string into groups of 3 characters from the right
        let chunks = [];
        while (strNumber.length > 0) {
            chunks.push(strNumber.slice(-3));
            strNumber = strNumber.slice(0, -3);
        }

        // Reverse the chunks and join them with dots
        let formattedStr = chunks.reverse().join('.');

        return formattedStr;
    }
    
    $('.product-list').on('click', '.product-detail', function () {
        let productName = $(this).find('a').text();

        // Tạo URL mới với tham số truyền vào là tên sản phẩm
        var url = '../../store/homepage-shopping/product_detail.php?product=' + encodeURIComponent(productName);
        //var url = '../../store/homepage-shopping/product_detail.php';

        // Chuyển hướng đến trang mới
        window.location.href = url;
    });

    $('#sort').val('cheap-to-expensive');

    // Xử lý sự kiện khi giá trị của select thay đổi
    $('#sort').change(function () {
        //var selectedValue = $(this).find('option').val();
        // Lấy giá trị được chọn
        var selectedValue = $(this).val();
        //alert(selectedValue);
        // Sắp xếp sản phẩm trong product-list dựa trên lựa chọn của người dùng
        sortProducts(selectedValue);
    });

      // Hàm sắp xếp sản phẩm
  function sortProducts(sortOption) {
    var productList = $('.product-list');

    // Lấy danh sách các sản phẩm
    var products = productList.children('.product-detail');

    // Sắp xếp sản phẩm dựa trên lựa chọn
    switch (sortOption) {
        case 'cheap-to-expensive':
            products.sort(function (a, b) {
            var priceA = parseFloat($(a).find('.product-price').text());
            var priceB = parseFloat($(b).find('.product-price').text());
            return priceA - priceB;
            });
            break;

        case 'expensive-to-cheap':
            products.sort(function (a, b) {
            var priceA = parseFloat($(a).find('.product-price').text());
            var priceB = parseFloat($(b).find('.product-price').text());
            return priceB - priceA;
            });
            break;

        case 'new-to-old':
            // Điều chỉnh logic sắp xếp theo thời gian nếu cần
            // Ví dụ: sử dụng thuộc tính data-time để so sánh thời gian
            products.sort(function (a, b) {
            var timeA = parseInt($(a).data('time'));
            var timeB = parseInt($(b).data('time'));
            return timeB - timeA;
            });
            break;
        }

        // Xóa sản phẩm hiện tại trong product-list
        productList.empty();

        // Thêm lại sản phẩm đã sắp xếp vào product-list
        productList.append(products);
  }
});
