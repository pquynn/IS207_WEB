var tbl_blog_id;
var tbl_blog_title;

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
    $('#modal-form').submit(function (event) { 
        event.preventDefault();
    
        var form = $(this);
        var btn_name = $('#modal-form .btn-confirm').text();
        var blogName = $('#blog-name').val();
    
        if(btn_name.localeCompare("Thêm mới") == 0){
            //insert 
            Array.from(form).forEach(form_element => {
            
                if (form_element.checkValidity() === false) {
                    $('.invalid-feedback').html('Yêu cầu nhập tên Blog!');
                    event.stopPropagation();
                } else 
                    insertBlog(blogName);
                
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
        url: '../../php/controller/Blog/blog-controller.php?action=fetch', 
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
                        <td>${row.BLOG_ID}</td>
                        <td>${row.BLOG_IMG}</td>
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


// Function to insert blog into the database
function insertCategory(blogName) {
    $.ajax({
        url: '../../php/controller/Blog/blog-controller.php?action=insert',
        type: 'GET',
        data: { BLOG_TITLE: blogName },
        dataType: 'json',
        success: function (result) {
        if (result === true) {
            //TODO: THÔNG BÁO THÊM THÀNH CÔNG
            // Blog inserted successfully, close the modal and perform any other necessary actions
            $('#add-new').modal('hide');

            var current_page = parseInt($('.pagination a.active').data('page'));
            fetchData(current_page); 
        } 
        else {
            // Blog name exists, show an error message
            $('#blog-name').addClass('is-invalid');
            $('.invalid-feedback').html('Blog đã có trong hệ thống!');
            // $('#modal-form').addClass('was-validated');
        }
        },
        error: function () {
            console.error('Failed to insert Blog.');
        }
    });
}


// Function to fetch data based on search term (blog name)
function fetchSearchData(searchTerm, page) {
    $.ajax({
        url: '../../php/controller/Blog/Blog-controller.php?action=search',
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
                <td>${row.BLOG_ID}</td>
                <td>${row.BLOG_IMG}</td>
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