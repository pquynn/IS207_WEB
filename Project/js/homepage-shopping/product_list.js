// Fetch data using AJAX
$(document).ready(function () {

    // Lấy giá trị của tham số "gender"
    var genderValue = getParameterByName('gender');

    // var categoryValue = getParameterByName('category');

    // alert(categoryValue);


    $.ajax({
        url: '../../controller/homepage-shopping/product_list-controller.php?action=fetch',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            let totalProducts = data.length;
            // alert(totalProducts);

            let continueLoadProduct = false;

            let countProductHasDisplay = 0;
            let limitOfProduct = 9;

            // Hàm truyền dữ liệu lên màn hình.
            function InsertData(data, optionGioiTinh){
                if (optionGioiTinh==="null"){
                    data.some(function (row) {
                        var imageUrl = 'data:first_picture/png;base64,' + row.first_picture;
                        var moneyString = formatNumber(row.price);
                        $('.product-list').append(`
                            <div class="product-detail">
                                <div class="product-img--container">
                                    <img src="${imageUrl}" id="${row.product_id}">
                                </div>
                                <a href="#">${row.product_name}</a> 
                                <p id="${row.gender}">${moneyString} VND</p>
                            </div>
                        `);

                        // countProductHasDisplay++;
                        // if (countProductHasDisplay === limitOfProduct) {
                        //     return true;
                        // }
                    })
                }
//                                 <p>${optionGioiTinh} ${row.gender}</p>
                else {
                    data.some(function (row) {
                        if (optionGioiTinh===row.gender){
                            var imageUrl = 'data:first_picture/png;base64,' + row.first_picture;
                            var moneyString = formatNumber(row.price);
                            $('.product-list').append(`
                                <div class="product-detail">
                                    <div class="product-img--container">
                                        <img src="${imageUrl}" id="${row.product_id}">
                                    </div>
                                    <a href="#">${row.product_name}</a> 
                                <p id="${row.gender}">${moneyString} VND</p>
                                </div>
                            `);
                        }
                        // countProductHasDisplay++;
                        // if (countProductHasDisplay === limitOfProduct) {
                        //     return true;
                        // }
                    })
                }
                // countProductHasDisplay=0;
            }

            // $('.pagination p').click(function(){
            //     limitOfProduct *= 2;
            //     alert(limitOfProduct);
            //     if (limitOfProduct >= totalProducts) {
            //         $(this).hide();
            //         limitOfProduct = 9;
            //     }
            // });
            

            // Hàm sắp xếp theo cột "price"
            function SapXepTheoGiaTien(data, condition) {
                data.sort(function (firstRow, secondRow) {
                    var columnA = firstRow.price; 
                    var columnB = secondRow.price;
            
                    if (condition === "asc") 
                        return columnA - columnB; // Sắp xếp tăng dần
                    return columnB - columnA; // Sắp xếp giảm dần
                });
            }

            // if (categoryValue !== null){
            //     if (genderValue === "Giày nam")
            //         InsertData(data, "Nam");
            //     else
            //         InsertData(data, "Nữ");
            // }
            // else
            //     InsertData(data, "null");

            if (genderValue !== null){
                if (genderValue === "Giày nam")
                    InsertData(data.tableProduct, "Nam");
                else
                    InsertData(data.tableProduct, "Nữ");
            }
            else
                InsertData(data.tableProduct, "null");

            $('#sort').val('cheap-to-expensive');

            // Xử lý sự kiện khi giá trị của select thay đổi
            $('#sort').change(function () {
                // Lấy giá trị được chọn
                var selectedValue = $(this).val();

                $('.product-list').empty();
                if (selectedValue==="cheap-to-expensive") {
                    SapXepTheoGiaTien(data.tableProduct, "asc");
                    InsertData(data.tableProduct, "null");
                }   
                else if (selectedValue==="expensive-to-cheap") {
                    SapXepTheoGiaTien(data.tableProduct, "desc");
                    InsertData(data.tableProduct, "null");
                }
                else if (selectedValue==="male") {
                    InsertData(data.tableProduct, "Nam");
                }
                else if (selectedValue==="female") {
                    InsertData(data.tableProduct, "Nữ");
                }
                else if (selectedValue==="male-female") {
                    InsertData(data.tableProduct, "Nam, nữ");
                }
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

        // Chuyển hướng đến trang mới
        window.location.href = url;
    });

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
