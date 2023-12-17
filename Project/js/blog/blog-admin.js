var tbl_id, tbl_img, tbl_title, tbl_username, tbl_date;
var formData;
var has_1_images, counter;
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

        $('#blog-name').removeClass('is-invalid'); //remove class is-invalid if the form was validated before
        $('#blog-name').prop('disabled', false);
        Array.from(modal.querySelectorAll('.was-validated')).forEach((element) => {
            element.classList.remove('was-validated'); // Clear Bootstrap form validation classes
        });

        // Add the 'required' attribute
        $('#blog-img').attr('required', 'required');

       
        // Append the new row HTML to the tbody
        tbody.append(newRowHtml);

        // reset image form-control
        $('.image-box').empty();

        has_1_images = false;


       
    });
})

    // Event listener for the "Edit" button
    $('.admin-table').on('click', '.btn-edit',function (e) {
        formData = new FormData();
        // e.preventDefault();
        
        // Get the closest row to the clicked button
        closest_row = $(this).closest('tr');

        // Get the datas from the row
        tbl_id = $.trim(closest_row.find('td:first').text());
        tbl_img = $.trim(closest_row.find('td:eq(2)').text());
        // tbl_phone = $.trim(closest_row.find('td:eq(2)').text());
        tbl_title = $.trim(closest_row.find('td:eq(3)').text());
        tbl_username = $.trim(closest_row.find('td:eq(4)').text());
        tbl_date = $.trim(closest_row.find('td:eq(5)').text());
        

        // Remove the is-invalid class in form-controls
        var modal = document.getElementById('add-new');
        Array.from(modal.querySelectorAll('.is-invalid')).forEach((element) => {
            element.classList.remove('is-invalid'); // Clear Bootstrap form validation classes
        });
        $('#modal-form').removeClass('was-validated');
        // Remove the 'required' attribute
        $('#blog-img').removeAttr('required');

        //TODO:LOAD TỪ CSDL: ẢNH, CATEGORY, SIZE - QUANTITY

        // reset image form-control
        fetchImages(tbl_id);
       
       

        //fetch data from admin-table into modal
        $('#blog-name').val(tbl_title);
        // $('#product-username').prop('disabled', true);
        $('#blog_img').val(tbl_img);
       

       

          // Populate the modal form with the fetched product_name
        $('h1.modal-title').text('Thông tin ' + namePage);
        $('.btn-confirm').text('Thay đổi');
        
    });


   
    


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
            // Get the blog_id from the first column of the row
            closest_row = $(this).closest('tr');
            tbl_id = closest_row.find('td:first').text();
            // User confirmed, proceed with deletion
            deleteBlog(tbl_id, closest_row);
        }
    });


    // khi thêm file vào input
    $('#blog-img').on('change', function () {
        // Add the 'required' attribute
        $('#blog-img').attr('required', 'required');
        var fileInput = $(this);
        var imageBox = $('.image-box');
        var invalidFeedback = $('.invalid-feedback.image');
    
        // Check the number of selected files
        var numberOfFiles = fileInput.files.length;
    
        // Clear previous content
        imageBox.empty();
    
        // Check form validation and add 'is-invalid' class if needed
        if (numberOfFiles !== 1) {
            fileInput.addClass('is-invalid');
            invalidFeedback.show();
            return;
        } else {
            has_1_images = true;
            
            //check file types
            var files = fileInput.files;
            
           
                var fileName = files.name;
                var idxDot = fileName.lastIndexOf(".") + 1;
                var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                
                if (extFile !== "jpg" && extFile !== "jpeg" && extFile !== "png"){
                    fileInput.value = ''; // Clear the file input
                    fileInput.addClass('is-invalid');
                    invalidFeedback.show();
                    return;
                
            }

            fileInput.removeClass('is-invalid');
            invalidFeedback.hide();
        
    
            formData = new FormData();
    
            // Display selected images
           
                var file = fileInput.files;
                var reader = new FileReader();
                formData.append('blog-img', file);
                
    
                // Closure to capture the file information.
                reader.onload = (function (theFile) {
                    return function (e) {
                        // Create an <img> element and set its source
                        var img = $('<img>')
                            .attr('src', e.target.result)
                            .attr('max-width', '100px')
                            .attr('height', '110px')
                            .css('object-fit', 'contain');
    
                        // Append the <img> element to the imageBox
                        imageBox.append(img);
                    };
        })(file);
    
                // Read in the image file as a data URL.
                reader.readAsDataURL(file);
            }
        });
        
    

    
    // // Event listener for the "submit" button
    $('#modal-form').submit(function (event) { 
        var form = $(this);
        var btn_name = $('#modal-form .btn-confirm').text();
        // Create a temp_product object
        var title =  $.trim($('#blog-name').val());
        var content =  $.trim($('#blog-content').val());
        var img =  $.trim($('#blog-img').val());
        
        formData.append('title', title);

        

        // check form validation before call function insert or update product    
        Array.from(form).forEach(form_element => {
            if (form_element.checkValidity() === false 
            || isDuplicate === true
            || has_3_images === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            else 
            {
                if(btn_name.localeCompare("Thêm mới") === 0){
                    var action = "insert-images";
                    formData.append('action', action);

                    event.preventDefault();
                    insertBlog(title, content, img);
                    // event.stopPropagation();
                }
                else{
                    var update_images = false;

                    var files = $('#blog-img').files;
                    if (files.length > 0) {
                        update_images = true;
                            
                        var action = "update-images";
                        formData.append('action', action);
                    } 
                    event.preventDefault();
                    updateBlog(title, content, img);
                    // event.stopPropagation();
                }
            }
            form.addClass('was-validated');
        })
    });





// Function to fetch categories from the server


function fetchImages(id) {
    $.ajax({
        url: '../../php/controller/Blog/blog-controller.php',
        type: 'POST',
        data: {action: 'fetch-images', id: id},
        dataType: 'json',
        success: function (data) {
            var imageBox = $('.image-box');
            
            imageBox.empty();
            var imageUrls; // Corrected variable name

            imageUrls.push('data:image/png;base64,' + data.first_picture);
           

            // Create an <img> element and set its source
           
                var img = $('<img>')
                    .attr('src', imageUrls)
                    .attr('width', '100px')
                    .attr('height', '110px')
                    .css('object-fit', 'contain');

                // Append the <img> element to the imageBox
                imageBox.append(img);
            

        },
        error: function () {
            console.error('Failed to fetch categories from the server.');
        }
    });
}




//function to fetch data in database to table
function fetchData(page){
    $.ajax({
        url: '../../php/controller/Blog/blog-controller.php', 
        type: 'POST',
        data: {action: 'fetch', page: page },
        dataType: 'json',
        success: function (response) {
            var data = response.data;
            var totalPages = response.totalPages;

            // Populate the table with fetched data
            var table_body = $('.admin-table table tbody');
            table_body.empty(); 

            data.forEach(function (row) {
                var imageUrl = 'data:image/png;base64,' + row.BLOG_IMG;
                table_body.append(`
                <tr>
                <td>${row.BLOG_ID}</td>
                <td><div class="table-img" style="background-image: url(${imageUrl})"></div></td>
                <td>${row.BLOG_TITLE}</td>
                <td>${row.USER_NAME}</td>
                <td>${row.BLOG_DAY}</td>
                <td class="action">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#alert"><i class="fa-solid fa-trash"></i></a>
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

// Function to insert product into the database
function insertBlog (name, content, img) {
    $.ajax({
        url: '../../php/controller/Blog/blog-controller.php',
        type: 'POST',
        data: {
            action: 'insert',
            name: name,
            content: content,
            img: img
            
        },
        dataType: 'json',
        success: function (result) {
            if (result.result === true) {
                insertImages();

                //TODO: THÔNG BÁO THÊM THÀNH CÔNG
                $('#add-new').modal('hide');
                
                var current_page = parseInt($('.pagination a.active').data('page'));
                fetchData(current_page);
            }
            else{
                $('#blog-name').addClass('is-invalid');
                $('#modal-form').addClass('was-validated');
            }
        },
        error: function () {
            console.error('Failed to insert product.');
        }
    });
    
}

// function to insert product images after product is inserted successfully
function insertImages () {
    $.ajax({
        url: '../../php/controller/Blog/blog-controller.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function () {
        },
        error: function (error) {
            console.error('Error uploading files: ', error);
        }
    });
}


// update a product
function updateBlog (update_images, name, content) {
    $.ajax({
        url: '../../php/controller/Blog/blog-controller.php',
        type: 'POST',
        data: {
            action: 'update',
        
            name: name,
            content: content
           
        },
        dataType: 'json',
        success: function (result) {
            if (result.result === true) {
                if(update_images){
                    updateImages();
                    //TODO: THÔNG BÁO THÊM THÀNH CÔNG
                    $('#add-new').modal('hide');
                    var current_page = parseInt($('.pagination a.active').data('page'));
                    fetchData(current_page);
                }
                else
                {
                    $('#add-new').modal('hide');
                    //TODO: THÔNG BÁO THÊM THÀNH CÔNG
                    var current_page = parseInt($('.pagination a.active').data('page'));
                    fetchData(current_page);
                }
            }
            else{
                $('#blog-name').addClass('is-invalid');
                $('#modal-form').addClass('was-validated');
            }
        },
        error: function () {
            console.error('Failed to update Blog.');
        }
    });
    
}

function updateImages () {
    $.ajax({
        url: '../../php/controller/Blog/blog-controller.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.result === true) {
            }
        },
        error: function (error) {
            console.error('Error uploading files: ', error);
        }
    });
}

// Function to delete product by product_id
function deleteBlog(blog_id, closest_row) {
    $.ajax({
        url: '../../php/controller/Blog/blog-controller.php',
        type: 'POST',
        data: {action: 'delete', blog_id: blog_id },
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
        url: '../../php/controller/Blog/blog-controller.php',
        type: 'POST',
        data: {action: 'search', searchTerm: searchTerm, page: page },
        dataType: 'json',
        success: function (response) {
            var data = response.data;
            var totalPages = response.totalPages;

            // Populate the table with fetched data
            var blog_body = $('.blog');
            blog_body.empty(); 

            data.forEach(function (row) {
                var imageUrl = 'data:image/png;base64,' + row.first_picture;
                blog_body.append(`
                <tr>
                <td>${row.BLOG_ID}</td>
                <td><div class="table-img" style="background-image: url(${imageUrl})"></div></td>
                <td>${row.BLOG_TITLE}</td>
                <td>${row.USER_NAME}</td>
                <td>${row.BLOG_DAY}</td>
                <td class="action">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#alert"><i class="fa-solid fa-trash"></i></a>
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

