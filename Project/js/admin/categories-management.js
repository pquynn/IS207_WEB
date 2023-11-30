var tbl_category_id;
var tbl_category_name;

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

        Array.from(modal.querySelectorAll('.was-validated')).forEach((element) => {
            element.classList.remove('was-validated'); // Clear Bootstrap form validation classes
        });
    })

    // when submit #modal-form
    $('#modal-form').submit(function (event) { //TODO: có nên tách thành function ko
        event.preventDefault();
    
        var form = $(this);
        var btn_name = $('#modal-form .btn-confirm').text();
        var categoryName = $('#category-name').val();
    
        if(btn_name.localeCompare("Thêm mới") == 0){
            //insert 
            Array.from(form).forEach(form_element => {
            
                if (form_element.checkValidity() === false) {
                    $('.invalid-feedback').html('Yêu cầu nhập tên danh mục');
                    event.stopPropagation();
                } else 
                    insertCategory(categoryName);
                
                form.addClass('was-validated');
            })
        }
        else{
            //update
            Array.from(form).forEach(form_element => {
            
                if (form_element.checkValidity() === false) {
                    $('.invalid-feedback').html('Yêu cầu nhập tên danh mục!');
                    event.stopPropagation();
                } 
                else 
                    updateCategory(categoryName);
        
                form.addClass('was-validated');
            })
        }

        
    });

    //delete
    //TODO: nên check điều kiên xóa ở csdl nữa
    // Event listener for the "Delete" button
    $('.admin-table').on('click', '.btn-delete', function (e) {
        e.preventDefault();

        // Show a confirmation dialog
        if (confirm('Xác nhận xóa ' + namePage + ' ?')) {
            // Get the category_id from the first column of the row
            var categoryId = $(this).closest('tr').find('td:first').text();
            // User confirmed, proceed with deletion
            deleteCategory(categoryId);

            $(this).closest('tr').remove();
        }
    });


    // Event listener for the "Edit" button
    $('.admin-table').on('click', '.btn-edit',function (e) {
        e.preventDefault();

        // Get the closest row to the clicked button
        var closest_row = $(this).closest('tr');
        // Get the datas from the row
        tbl_category_id = closest_row.find('td:first').text();
        tbl_category_name = closest_row.find('td:eq(1)').text();

        // Remove the is-invalid class in form-controls
        var modal = document.getElementById('add-new');
        Array.from(modal.querySelectorAll('.is-invalid')).forEach((element) => {
            element.classList.remove('is-invalid'); // Clear Bootstrap form validation classes
        });
        
        $('#category-name').val(tbl_category_name);
        // Populate the modal form with the fetched category_name
        $('h1.modal-title').text('Thông tin ' + namePage);
        $('.btn-confirm').text('Thay đổi');

        

        // Fetch the current category_name for the selected category_id
        // $.ajax({
        //     url: 'get_category.php',
        //     type: 'POST',
        //     data: { category_id: category_id },
        //     dataType: 'json',
        //     success: function (response) {
        //         // Populate the modal form with the fetched category_name
        //         $('#category-name').val(response.category_name);

        //         // Show the modal
        //         $('#add-new').modal('show');
        //     },
        //     error: function () {
        //         console.error('Failed to fetch category data.');
        //     }
        // });

    });

    //  // Event listener for the "Search" button
    //  $('.btn-search').on('click', function () {
    //     var searchTerm = $('#search').val();

    //     // Fetch data based on the search term
    //     if(searchTerm.localeCompare('') != 0)
    //         fetchSearchData(searchTerm, currentPage);
    // });

    // Event listener for the "Search" button
    $('#search').on('keyup', function () {
        var searchTerm = $('#search').val();

        // Fetch data based on the search term
        if(searchTerm.localeCompare('') != 0)
            fetchSearchData(searchTerm, currentPage);
        else
            fetchData(currentPage);
    });

})

//function to fetch data in database to table
function fetchData(page){
    $.ajax({
        url: '../../php/controller/admin/category-controller.php?action=fetch', //TODO: nhớ sửa lại nếu đổi thành post
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
                table_body.append(`
                    <tr>
                        <td>${row.category_id}</td>
                        <td>${row.category_name}</td>
                        <td class="action">
                            <a href="#" class="btn-edit" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" class="btn-delete"><i class="fa-solid fa-trash"></i></a>
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


// Function to insert category into the database
function insertCategory(categoryName) {
    $.ajax({
        url: '../../php/controller/admin/category-controller.php?action=insert',
        type: 'GET',
        data: { category_name: categoryName },
        dataType: 'json',
        success: function (result) {
        if (result === true) {
            //TODO: THÔNG BÁO THÊM THÀNH CÔNG
            // Category inserted successfully, close the modal and perform any other necessary actions
            $('#add-new').modal('hide');

            var current_page = parseInt($('.pagination a.active').data('page'));
            fetchData(current_page); //TODO: lúc reload thì hiện trang của sp đc thêm hay reload trang hiện tại thoi?
        } 
        else {
            // Category name exists, show an error message
            $('#category-name').addClass('is-invalid');//TODO: border-color of form-control is not change into red
            $('.invalid-feedback').html('Danh mục đã có trong hệ thống!');
            $('#modal-form').addClass('was-validated');
        }
        },
        error: function () {
            console.error('Failed to insert category.');
        }
    });
}

// function to update a category
function updateCategory(categoryName){
    // check if the new category name is the old category name
    console.log(categoryName);
    console.log(tbl_category_name);
    console.log(categoryName.localeCompare(tbl_category_name));
    if(categoryName.localeCompare(tbl_category_name) != 0){
        // Check if the category name already exists
        $.ajax({
            url: '../../php/controller/admin/category-controller.php?action=update',
            type: 'GET',
            data: { category_name: categoryName, category_id: tbl_category_id },
            dataType: 'json',
            success: function (result) {
                if (result == true) {
                    //TODO: THÔNG BÁO cập nhật THÀNH CÔNG
                    // Category inserted successfully, close the modal and perform any other necessary actions
                    $('#add-new').modal('hide');
        
                    var current_page = parseInt($('.pagination a.active').data('page'));
                    fetchData(current_page); //TODO: lúc reload thì hiện trang của sp đc thêm hay reload trang hiện tại thoi?
                } 
                else {
                    // Category name exists, show an error message
                    $('#category-name').addClass('is-invalid');//TODO: border-color of form-control is not change into red
                    $('.invalid-feedback').html('Danh mục đã có trong hệ thống!');
                    $('#modal-form').addClass('was-validated');
                }
                },
                error: function () {
                    console.error('Failed to insert category.');
                }
        });
    }
    else{
        //TODO: THÔNG BÁO cập nhật THÀNH CÔNG
        // Category inserted successfully, close the modal and perform any other necessary actions
        // Clear the data and reset the form validation in the modal
        $('#add-new').modal('hide');
    }
}

// Function to delete category by category_id
function deleteCategory(categoryId) {
    $.ajax({
        url: '../../php/controller/admin/category-controller.php?action=delete',
        type: 'GET',
        data: { category_id: categoryId },
        success: function () {
            //TODO: hiện thông báo xóa thành công
        },
        error: function () {
            console.error('Failed to delete category.');
        }
    });
}


// Function to fetch data based on search term (category name)
function fetchSearchData(searchTerm, page) {
    $.ajax({
        url: '../../php/controller/admin/category-controller.php?action=search',
        type: 'GET',
        data: { searchTerm: searchTerm, page: page },
        dataType: 'json',
        success: function (response) {
            console.log(data);
            console.log(totalPages);
            var data = response.data;
            var totalPages = response.totalPages;

            var table_body = $('.admin-table table tbody');
            table_body.empty();

            data.forEach(function (row) {
                // Append rows to the table
                table_body.append(`
                    <tr>
                        <td>${row.category_id}</td>
                        <td>${row.category_name}</td>
                        <td class="action">
                            <a href="#" class="btn-edit" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" class="btn-delete"><i class="fa-solid fa-trash"></i></a>
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





