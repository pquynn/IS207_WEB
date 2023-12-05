// Fetch data using AJAX
$(document).ready(function () {

    // Lấy giá trị của tham số 'product' từ URL
    //var productName = getParameterByName('product');
    
    //alert(productName);

    $.ajax({
        url: '../../controller/homepage-shopping/product_detail-controller.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
          if (data){
            alert('Have data');
            $('.product-info .product-name h2').text(data.PRODUCT_NAME);
            $('.product-info .product-price h3').text(data.PRICE + ' VND');
            console.log(data);
          }
          else {
            console.error('Empty data received from the server.');
          }
        },
        error: function () {
            console.error('Failed to fetch data from the server.');
        }
    });

    // function formatNumber(input) {
    //     let strNumber = String(input);

    //     // Split the string into groups of 3 characters from the right
    //     let chunks = [];
    //     while (strNumber.length > 0) {
    //         chunks.push(strNumber.slice(-3));
    //         strNumber = strNumber.slice(0, -3);
    //     }

    //     // Reverse the chunks and join them with dots
    //     let formattedStr = chunks.reverse().join('.');

    //     return formattedStr;
    // }

    // Lấy tên sản phẩm từ URL
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