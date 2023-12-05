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

});
