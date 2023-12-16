

$(document).ready(function() {
    var currentpage = 1;
    
    fetchData(BLOG_ID, currentpage);

   
    
});

function fetchData(blog_id, page) {
    $.ajax({
        url: "../../../php/controller/Blog/blog-controller.php?action=fetch",
        type: 'POST',
        data: {blog_id: BLOG_ID, page: page},
        dataType: 'json',
        success: function (response) {
            var data = response.data;
            var totalPages = response.totalPages;
            
            if(!response.data) console.log("du lieu rong");
            
            var blog_body = $('.blog');
            blog_body.empty();

            
            data.forEach(function (row) {
                blog_body.append(`
                
                <a class="blog-link" href="#">
                <div class="blog-img--container zoom-img--container">
                    <img class="blog-img zoom-img" src="${row.BLOG_IMG}" alt="" />
                </div>
                <p class="blog-title">${row.BLOG_TITLE}</p>
                <p class="preview-content">${row.CONTENT}</p>
            </a>
                    
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

