// Fetch data using AJAX
$(document).ready(function () {
    $.ajax({
        url: '../../php/controller/homepage-shopping/product_list-controller.php?action=fetch', 
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            data.forEach(function (row) {
                var imageUrl = 'data:first_picture/png;base64,' + row.first_picture;

                $('.product-list').append(`
                    <div class="product-detail">
                        <div class="product-img--container">
                            <img src="/Project/img/blog_img/blog2.webp">
                        </div>
                        <a href="#">${row.product_id}</a>
                        <p>${row.price} VND</p>
                    </div>
                `);
                // Build the HTML for the table row
                // $('.admin-table table').append( `
                //     <tr>
                //         <td>${row.product_id}</td>
                //         <td><div class="table-img" style="background-image: url(${imageUrl})"></div></td>
                //         <td>${row.product_name}</td>
                //         <td>${row.price}</td>
                //         <td>xl</td>
                //         <td>${row.category_name}</td>
                //         <td>${row.color}</td>
                //         <td>${row.gender}</td>
                //         <td>${row.description}</td>
                //         <td class="action">
                //             <a href="#" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                //             <a href="#" class="btn-delete"><i class="fa-solid fa-trash"></i></a>
                //         </td>
                //     </tr>
                // `);
            });
        },
        error: function () {
            console.error('Failed to fetch data from the server.');
        }
    });
});