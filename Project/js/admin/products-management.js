var tbl_id, tbl_login, tbl_name, tbl_phone, tbl_birthday, tbl_gender,
tbl_address, tbl_dayadd, tbl_role_name;
var closest_row;

$(document).ready(function () {
    var namePage = $('.section_heading').text();
    // Fetch data using AJAX
    // Initialize the page to 1
    var currentPage = 1;
    fetchData(currentPage);

    // when btn-add button is clicked
    $('.btn-add').click(function (event){
        $('h1.modal-title').text('Thêm mới ' + namePage);
        $('.btn-confirm').text('Thêm mới');

        // Clear the data and reset the form validation in the modal
        var modal = document.getElementById('add-new');
        modal.querySelector('form').reset(); // Reset the form

        $('#employee-username').removeClass('is-invalid'); //remove class is-invalid if the form was validated before
        $('#employee-username').prop('disabled', false);
        Array.from(modal.querySelectorAll('.was-validated')).forEach((element) => {
            element.classList.remove('was-validated'); // Clear Bootstrap form validation classes
        });

        fetchCategories();
    })


    // Event listener for the "Search" button
    $('#search').on('keyup', function () {
        var searchTerm = $('#search').val();

        // Fetch data based on the search term
        if(searchTerm.localeCompare('') != 0)
            fetchSearchData(searchTerm, 1);
        else
            fetchData(1);
    });

    //delete
    //TODO: nên check điều kiên xóa ở csdl nữa
    // Event listener for the "Delete" button
    $('.admin-table').on('click', '.btn-delete.btn-table', function (e) {
        e.preventDefault();
        // Show a confirmation dialog
        if (confirm('Xác nhận xóa ' + namePage + ' ?')) {
            // Get the employee_id from the first column of the row
            closest_row = $(this).closest('tr');
            tbl_id = closest_row.find('td:first').text();
            // User confirmed, proceed with deletion
            deleteProduct(tbl_id, closest_row);
        }
    });

});


// Function to fetch categories from the server
function fetchCategories() {
    $.ajax({
        url: '../../php/controller/admin/product-controller.php',
        type: 'GET',
        data: {action: 'fetch-categories'},
        dataType: 'json',
        success: function (data) {
            var selectElement = $('#product-categories');
            selectElement.empty();
            selectElement.append(`<option value="" disabled selected hidden></option>`);
            
            console.log(data);
            data.forEach(function (row) {
                selectElement.append(
                    `<option value="${row.category_id}">${row.category_name}</option>`
            );});
        },
        error: function () {
            console.error('Failed to fetch categories from the server.');
        }
    });
}





//function to fetch data in database to table
function fetchData(page){
    $.ajax({
        url: '../../php/controller/admin/product-controller.php?action=fetch', //TODO: nhớ sửa lại nếu đổi thành post
        type: 'GET',
        data: { page: page },
        dataType: 'json',
        success: function (response) {
            var data = response.data;
            var totalPages = response.totalPages;

            // Populate the table with fetched data
            var table_body = $('.admin-table table tbody');
            table_body.empty(); 

            data.forEach(function (row) {
                var imageUrl = 'data:image/png;base64,' + row.first_picture;
                table_body.append(`
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
                            <a href="#" class="btn-delete btn-table"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                `);
            });

            updatePagination(page, totalPages);
        },
        error: function () {
            console.error('Failed to fetch data from the server.');
        }
    });
}

//function to update pagination and fetch the data based on the current page
function updatePagination(currentPage, totalPages) {

    // Clear existing pagination links
    $('.pagination').empty();
  
    // Add "Previous" link
    $('.pagination').append(`<a href="#" data-page="${currentPage - 1}">&laquo;</a>`);
  
    // Add numbered links
    for (var i = 1; i <= totalPages; i++) {
        var activeClass = (i === currentPage) ? 'active' : '';
        $('.pagination').append(`<a class="${activeClass}" href="#" data-page="${i}">${i}</a>`);
    }
  
    // Add "Next" link
    $('.pagination').append(`<a href="#" data-page="${currentPage + 1}">&raquo;</a>`);
  
    // Use event delegation for click events on pagination links
    $('.pagination').on('click', 'a', function(event) {
        event.preventDefault();
        var clickedPage = parseInt($(this).data('page'));
    
        if (!isNaN(clickedPage)) {
            fetchData(clickedPage);
        }
    });
  }

// insert a product


// update a product


// Function to delete employee by product_id
function deleteProduct(product_id, closest_row) {
    $.ajax({
        url: '../../php/controller/admin/employee-controller.php?action=delete',
        type: 'GET',
        data: { product_id: product_id },
        success: function () {
            //TODO: hiện thông báo xóa thành công
            closest_row.remove();
        },
        error: function () {
            console.error('Failed to delete employee.');
        }
    });
}
    



// Function to fetch data based on search term (product name)
function fetchSearchData(searchTerm, page) {
    $.ajax({
        url: '../../php/controller/admin/product-controller.php?action=search',
        type: 'GET',
        data: { searchTerm: searchTerm, page: page },
        dataType: 'json',
        success: function (response) {
            var data = response.data;
            var totalPages = response.totalPages;

            // Populate the table with fetched data
            var table_body = $('.admin-table table tbody');
            table_body.empty(); 

            data.forEach(function (row) {
                var imageUrl = 'data:image/png;base64,' + row.first_picture;
                table_body.append(`
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
                            <a href="#" class="btn-delete btn-table"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                `);
            });

            updatePagination(page, totalPages);
        },
        error: function () {
            console.error('Failed to fetch data from the server.');
        }
    });
}



