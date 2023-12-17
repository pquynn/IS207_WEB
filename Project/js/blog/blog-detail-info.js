$(document).ready(function() {
    var currentpage = 1;
    
    fetchData(BLOG_ID, currentpage);

   
    
});

function fetchData(blog_id, page) {
    $.ajax({
        url: "../../../php/controller/Blog/blog-controller.php?action=fetch",
        type: 'POST',
        data: {blog_id: blog_id, page: page},
        dataType: 'json',
        success: function (response) {
            var data = response.data;
            var totalPages = response.totalPages;
            
            if(!response.data) console.log("du lieu rong");
            
            var blog_body = $('.blog');
            blog_body.empty();

            
            data.forEach(function (row) {
                blog_body.append(`
                
                <div class="blog-img">
               <img src="${row.BLOG_IMG}">
                </div>
                <div class="blog-container">
                <div class="blog-title">
               <h4>${row.BLOG_TITLE}</h4>
               </div>
              <div class="blog-content">
              <p>${row.CONTENT}</p>
            </div>
            <div class="blog-date">
            <p><i>${row.BLOG_DAY}</i></p>
            </div>
            <div class="blog-author">
         <p><b>${row.USER_NAME}</b></p>
         </div>
</div>
                    
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