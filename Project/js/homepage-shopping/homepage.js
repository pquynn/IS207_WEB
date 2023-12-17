// Fetch data using AJAX
$(document).ready(function () {

    $.ajax({
        url: '../../controller/homepage-shopping/homepage-controller.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data) {
                data.tableBlog.forEach(function (row) {
                    let imageUrl = 'data:blog_img/png;base64,' + row.BLOG_IMG;
                    $('.blog').append(`
                        <div class="blog-content zoom-when--hover">
                            <div class="blog-link">
                                <div class="blog-img--container zoom-img--container">
                                    <img
                                    class="blog-img zoom-img"
                                    src="${imageUrl}"
                                    alt="">
                                </div>
                                <p class="blog-title">${row.BLOG_TITLE}</p>
                            </div>
                            <div class="blog-author">
                                <small>${row.USER_NAME}</small>
                            </div>
                        </div>
                    `);
                    $('.blog-content').last().on('click', function () { // CHỌN BLOG
                        var blogTitle = $(this).find('.blog-title').text();

                        // Tạo URL mới với tham số truyền vào là tên blog
                        var url = '../../store/blog-info/blog.php?blog=?' + encodeURIComponent(blogTitle);
                        
                        // Chuyển hướng đến trang mới
                        window.location.href = url;
                    });
                });

                data.tableProductBestSeller.forEach(function (row) {
                    let imageUrl = 'data:FIRST_PICTURE/png;base64,' + row.FIRST_PICTURE;
                    let stringPrice = formatNumber(row.PRICE);
                    $('#galleryBestSeller .product-list').append(`
                        <a href="#" class="product zoom-when--hover">
                            <div class="product-img--container zoom-img--container">
                            <img
                                class="product-img zoom-img"
                                id="slider1"
                                src="${imageUrl}"
                                alt="" />
                            </div>
                            <div class="product-infor">
                                <p class="product-name">${row.PRODUCT_NAME}</p>
                                <p class="product-price">${stringPrice} VNĐ</p>
                            </div>
                        </a>
                    `);
                    $('.product').last().on('click', function () {
                        var productName = $(this).find('.product-name').text();

                        // Tạo URL mới với tham số truyền vào là tên sản phẩm
                        var url = '../../store/homepage-shopping/product_detail.php?product=' + encodeURIComponent(productName);

                        // Chuyển hướng đến trang mới
                        window.location.href = url;
                    });
                });

                data.tableProductNew.forEach(function (row) {
                    let imageUrl = 'data:FIRST_PICTURE/png;base64,' + row.FIRST_PICTURE;
                    let stringPrice = formatNumber(row.PRICE);
                    $('#galleryNewProduct .product-list').append(`
                        <a href="#" class="product zoom-when--hover">
                            <div class="product-img--container zoom-img--container">
                            <img
                                class="product-img zoom-img"
                                id="slider1"
                                src="${imageUrl}"
                                alt="" />
                            </div>
                            <div class="product-infor">
                                <p class="product-name">${row.PRODUCT_NAME}</p>
                                <p class="product-price">${stringPrice} VNĐ</p>
                            </div>
                        </a>
                    `);
                    $('.product').last().on('click', function () {
                        var productName = $(this).find('.product-name').text();

                        // Tạo URL mới với tham số truyền vào là tên sản phẩm
                        var url = '../../store/homepage-shopping/product_detail.php?product=' + encodeURIComponent(productName);

                        // Chuyển hướng đến trang mới
                        window.location.href = url;
                    });
                });
            }
            else {
                console.error('Empty data received from the server.');
            }
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
    
    $('.collection-item').click(function () {
        // Lấy giới tính
        var gender = $(this).find('p').text();

        // Tạo URL mới với tham số truyền vào là giới tính
        var url = '../../store/homepage-shopping/product_list.php?gender=';

        if (gender === "Giày nam")
            url += "Nam";
        else    
            url += "Nữ";

        // Chuyển hướng đến trang mới
        window.location.href = url;
    });
});
