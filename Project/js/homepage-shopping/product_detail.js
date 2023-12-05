// Fetch data using AJAX
$(document).ready(function () {

    // Lấy giá trị của tham số 'product' từ URL
    var productName = getParameterByName('product');

    $.ajax({
        url: '../../controller/homepage-shopping/product_detail-controller.php?name=' + encodeURIComponent(productName),
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('.product-info').append(`
                <div class="product-name"><h2>HELLO</h2></div>
                <div class="product-price"><h3>500000 VND</h3></div>
            `);
            // data.forEach(function (row) {
            //     var imageUrl = 'data:first_picture/png;base64,' + row.first_picture;
            //     var moneyString = row.price;
            //     $('.product-info').append(`
            //         <div class="product-detail">
            //             <div class="product-img--container">
            //             <img src="${imageUrl}">
            //             </div>
            //             <a href="#">${row.product_name}</a> 
            //             <p>${row.price} VND</p>
            //         </div>
            //     `);
            // });
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

    // Lấy tên sản phẩm
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
});
