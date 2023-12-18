//const page_name = $('.section_heading').text();
//const table = document.querySelector('.admin-table table');

// Fetch data using AJAX
$(document).ready(function () {
    $.ajax({
        url: '../../php/controller/admin/product-controller.php?action=fetch', //TODO: nhớ sửa lại nếu đổi thành post
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            data.forEach(function (row) {
                var imageUrl = 'data:image/png;base64,' + row.image;

                // Build the HTML for the table row
                $('.admin-table table').append( `
                    <tr>
                        <td>${row.product_id}</td>
                        <td><div class="table-img" style="background-image: url(${imageUrl})"></div></td>
                        <td>${row.product_name}</td>
                        <td>${row.price}</td>
                        <td>xl</td>
                        <td>${row.category_name}</td>
                        <td>${row.color}</td>
                        <td>${row.gender}</td>
                        <td>${row.description}</td>
                        <td class="action">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" class="btn-delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                `);
            });
        },
        error: function () {
            console.error('Failed to fetch data from the server.');
        }
    });
});

// insert a product
// $.ajax({
//     url: 'product-controller.php?action=insert',
//     type: 'POST',
//     data: {
//         product_name: 'New product'
//     },
//     dataType: 'json',
//     success: function (response) {
//         // Handle the insertion response
//     },
//     error: function () {
//         console.error('Failed to insert product.');
//     }
// });



// update a product



// delete a product
document.addEventListener('DOMContentLoaded', function() {
const deleteButtons = document.querySelectorAll('.btn-delete');

// Add a click event listener to each delete button
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        if (confirm('Xác nhận xóa ' + $('.section_heading').text() + ' ?')) {
            // Get the parent row of the clicked delete button
            const row = this.closest('tr'); 

            // Remove the parent row from the table
            row.remove(); // TODO: check điều kiện tự server xem có xóa được ko
        } else {
        
        }
        
    });
  });
});
    
// pagination??

// search bar??


// export file
// Converting HTML table to EXCEL File



