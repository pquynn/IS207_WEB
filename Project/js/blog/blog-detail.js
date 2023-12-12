$(document).ready(function() {
    var currentpage = 1;
    
    fetchData(BLOG_TITLE, currentpage);

    //SEARCH ORDER
    $('#search').on('keyup', function () {
        var searchTerm = $('#search').val();

        // Fetch data based on the search term
        if(searchTerm.localeCompare('') != 0)
            fetchSearchData(searchTerm, 1, BLOG_TITLE);
        else
            fetchData(BLOG_TITLE, 1);
    });
});

function fetchData(blog_title, page) {
    $.ajax({
        url: "../../../php/controller/Blog/blog-controller.php?action=fetch",
        type: 'GET',
        data: {blog_title: BLOG_TITLE, page: page},
        dataType: 'json',
        success: function (response) {
            var data = response.data;
            var totalPages = response.totalPages;
            
            if(!response.data) console.log("du lieu rong");
            
            var blog_body = $('.blog blog-content');
            blog_body.empty();

            
            data.forEach(function (row) {
                blog_body.append(`
                
                    <img src="${row.BLOG_IMG}" />
                    <p>${row.BLOG_TITLE}</p>
                    <p>${row.CONTENT}</p>
                    
                `);
            });

            updatePagination(page, totalPages);
        },
        error: function() {
            console.error("Loi ket noi");
        }
    });
}

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

function fetchSearchData(searchTerm, page, blog_title) {
    $.ajax({
        url: '../../../php/controller/Blog/blog-controller.php?action=fetch',
        type: 'GET',
        data: {searchTerm: searchTerm, page: page, blog_title: BLOG_TITLE},
        dataType: 'json',
        success: function (response) {
            var data = response.data;
            var totalPages = response.totalPages;
            
            console.log(response.totalPages);
            if(!response.data) console.log("du lieu rong");
            
            var blog_body = $('.blog blog-content');
            blog_body.empty();

            
            data.forEach(function (row) {
                blog_body.append(`
                <img src="${row.BLOG_IMG}" />
                <p>${row.BLOG_TITLE}</p>
                <p>${row.CONTENT}</p>
                `);
            });

            updatePagination(page, totalPages);            
        },
        error: function() {
            console.error('Failed to fetch data from the server.');
        }
    });
}