var tbl_id, tbl_img, tbl_title, tbl_username, tbl_date, tbl_content;
var formData;

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

        Array.from(modal.querySelectorAll('.was-validated')).forEach((element) => {
            element.classList.remove('was-validated'); // Clear Bootstrap form validation classes
        });
    });
})


    // when submit #modal-form
    $('#modal-form').submit(function (event) { 
        event.preventDefault();
    
        var form = $(this);
        var btn_name = $('#modal-form .btn-confirm').text();
        var blogName = $('#blog-name').val();
        var blogContent =  $('#blog-content').val();
        var blogImg =  $('#blog-img').val();
        var userId = 'KH0001';
        var userName = "Nguyen van a";
        var blogDay = '2023-11-23';

    
        if(btn_name.localeCompare("Thêm mới") == 0){
            //insert 
            Array.from(form).forEach(form_element => {
            
                if (form_element.checkValidity() === false) {
                    $('.invalid-feedback').html('Yêu cầu nhập tên Blog');
                    event.stopPropagation();
                } else 
                    insertBlog(userId, userName, blogImg, blogDay, blogContent, blogName);
                
                form.addClass('was-validated');
            })
        }
        else{
            //update
            Array.from(form).forEach(form_element => {
            
                if (form_element.checkValidity() === false) {
                    $('.invalid-feedback').html('Yêu cầu nhập tên Blog!');
                    event.stopPropagation();
                } 
                else 
                    updateBlog(blogName);
        
                form.addClass('was-validated');
            })
        }

        
    });

    // Event listener for the "Delete" button
    $('.admin-table').on('click', '.btn-delete', function (e) {
        e.preventDefault();

        // Show a confirmation dialog
        if (confirm('Xác nhận xóa ' + namePage + ' ?')) {
            // Get the category_id from the first column of the row
            var blogId = $(this).closest('tr').find('td:first').text();
            closest_row = $(this).closest('tr');
            // User confirmed, proceed with deletion
            deleteBlog(blogId, closest_row);
        }
    });


    // Event listener for the "Edit" button
    $('.admin-table').on('click', '.btn-edit', function (e) {
        e.preventDefault();

        // Get the closest row to the clicked button
        var closest_row = $(this).closest('tr');
        // Get the datas from the row
        tbl_id = $.trim(closest_row.find('td:first').text());
        tbl_title = $.trim(closest_row.find('td:eq(3)').text());
        tbl_img = $.trim(closest_row.find('td:eq(2)').text());
       
        // Remove the is-invalid class in form-controls
        var modal = document.getElementById('add-new');
        Array.from(modal.querySelectorAll('.is-invalid')).forEach((element) => {
            element.classList.remove('is-invalid'); // Clear Bootstrap form validation classes
        });
        
        $('#blog-name').val(tbl_title);
        $('#blog-img').fetchImages(tbl_id);
        $('#blog-content').fetchContent(tbl_id);
        // Populate the modal form with the fetched category_name
        $('h1.modal-title').text('Thông tin ' + namePage);
        $('.btn-confirm').text('Thay đổi');

    });

    // Event listener for the "Search" button
    $('#search').on('keyup', function () {
        var searchTerm = $('#search').val();

        // Fetch data based on the search term
        if(searchTerm.localeCompare('') != 0)
            fetchSearchData(searchTerm, currentPage);
        else
            fetchData(currentPage);
    });

    // Event listener for the "Cancel" button of modal
    $('.btn-cancel').on('click', function () {
        if (confirm('Những thay đổi của bạn sẽ không được lưu?')) {
            // Dismiss the modal if the user clicks "OK" in the confirm box
            // Replace 'myModal' with the actual ID of your Bootstrap modal
            $('#add-new').modal('hide');
            // Clear the data and reset the form validation in the modal
            const modal = document.getElementById('add-new');
            modal.querySelector('form').reset(); // Reset the form

            Array.from(modal.querySelectorAll('.was-validated')).forEach((element) => {
            element.classList.remove('was-validated'); // Clear Bootstrap form validation classes
            });

        } else {
        // Do not dismiss the modal if the user clicks "Cancel" in the confirm box
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
            ) {
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
                    <a class = 'btn-edit' href="#" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                    <a class = 'btn-delete' href="#"><i class="fa-solid fa-trash"></i></a>
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
function insertBlog (userId, userName, blogImg, blogDay, blogContent, blogName)  {
    $.ajax({
        url: '../../php/controller/Blog/blog-controller.php',
        type: 'POST',
        data: {
            action: 'insert',
            USER_ID: userId,
            USER_NAME: userName,
            BLOG_DAY: blogDay,
            CONTENT: blogContent,
            BLOG_IMG: blogImg,
            BLOG_TITLE: blogName
        },
        dataType: 'json',
        success: function (result) {
            if (result.result === true) {
               alert('Đã thêm thành công Blog!'); 
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
            console.error('Failed to insert blog.');
        }
    });
    
}

// function to insert product images after product is inserted successfully



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



// Function to delete product by product_id
function deleteBlog(blog_id, closest_row) {
    $.ajax({
        url: '../../php/controller/Blog/blog-controller.php',
        type: 'POST',
        data: {action: 'delete', tbl_id: blog_id },
        success: function () {
            //TODO: hiện thông báo xóa thành công
            closest_row.remove();
        },
        error: function () {
            console.error('Failed to delete blog.');
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
                    <a class = 'btn-edit' href="#" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                    <a class = 'btn-delete' href="#" ><i class="fa-solid fa-trash"></i></a>
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

            imageUrls.push('data:image/png;base64,' + data.tbl_img);
          

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
            console.error('Failed to fetch Blog from the server.');
        }
    });
}
function fetchContent(id) {
    $.ajax({
        url: '../../controller/Blog/blog-controller.php',
        type: 'POST',
        dataType: 'json',
        data: {action: 'fetch-content', id: id},
        success: function (data) {
            if (data) {
                console.log(data);
             
              

                $('#blog-content').text(data.CONTENT);
               
            }
            else {
                console.error('Empty data received from the server.');
            }
        },
        error: function () {
            console.error('Failed to fetch data from the server.');
        }
    });
}
