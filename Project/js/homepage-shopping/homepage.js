// Fetch data using AJAX
$(document).ready(function () {

    $.ajax({
        url: '../../controller/homepage-shopping/homepage-controller_test.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            data.forEach(function (row) {
                $.each(data.tableBlog, function(index, item) {

                    var imageUrl = 'data:blog_img/png;base64,' + item.blog_img;

                    $('.blog').append(`
                        <div class="blog-content zoom-when--hover">
                            <a class="blog-link" href="#">
                                <div class="blog-img--container zoom-img--container">
                                    <img class="blog-img zoom-img" src="${imageUrl}" alt="">
                                </div>
                                <p class="blog-title">${item.blog_title}</p>
                            </a>
                            <a href="#" class="blog-author">
                                <small>${item.user_name}</small>
                            </a>
                        </div>
                    `);

                });
                // var imageUrl = 'data:first_picture/png;base64,' + row.first_picture;
                // var moneyString = formatNumber(row.price);
                // $('.blog').append(`
                //     <div class="product-detail">
                //         <div class="product-img--container">
                //             <img src="${imageUrl}">
                //         </div>
                //         <a href="#">${row.product_name}</a> 
                //         <p>${moneyString} VND</p>
                //     </div>

                //     <div class="blog-content zoom-when--hover">
                //     <a class="blog-link" href="#">
                //       <div class="blog-img--container zoom-img--container">
                //         <img
                //           class="blog-img zoom-img"
                //           src=""
                //           alt="" />
                //       </div>
                //       <p class="blog-title">Tên blog</p>
                //     </a>
                //     <a href="#" class="blog-author">
                //       <small>Tên tác giả</small>
                //     </a>
                //   </div>
                // `);
            });
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
    
    // $('.product-list').on('click', '.product-detail', function () {
    //     let productName = $(this).find('a').text();

    //     // Tạo URL mới với tham số truyền vào là tên sản phẩm
    //     var url = '../../store/homepage-shopping/product_detail.php?product=' + encodeURIComponent(productName);

    //     // Chuyển hướng đến trang mới
    //     window.location.href = url;
    // });

});
