// Fetch data using AJAX
$(document).ready(function () {
    $.ajax({
        url: '../../controller/homepage-shopping/product_list-controller.php?action=fetch',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            data.forEach(function (row) {
                var imageUrl = 'data:first_picture/png;base64,' + row.first_picture;
                var moneyString = row.price;
                $('.product-list').append(`
                    <div class="product-detail">
                        <div class="product-img--container">
                        <img src="${imageUrl}">
                        </div>
                        <a href="#">${row.product_name}</a> 
                        <p>${row.price} VND</p>
                    </div>
                `);
            });
        },
        error: function () {
            console.error('Failed to fetch data from the server.');
        }
    });

    function IntToString($money) {
        return $(money).format({
            style: "decimal",
            precision: 2,
            thousandsSeparator: ".",
        });
    }
});