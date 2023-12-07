// Fetch data using AJAX
$(document).ready(function () {

  // Lấy giá trị của tham số 'product' từ URL
  //var productName = getParameterByName('product');

  //alert(productName);

  $.ajax({
    url: '../../controller/homepage-shopping/product_detail-controller.php',
    type: 'GET',
    dataType: 'json',
    data: { product: getParameterByName('product') },
    success: function (data) {
      if (data) {
        let imageUrlFirst = 'data:FIRST_PICTURE/png;base64,' + data.productInfo.FIRST_PICTURE;
        let imageUrlSecond = 'data:SECOND_PICTURE/png;base64,' + data.productInfo.SECOND_PICTURE;
        let imageUrlThird = 'data:THIRD_PICTURE/png;base64,' + data.productInfo.THIRD_PICTURE;
        $('.product-main-img img').attr('src', imageUrlFirst);
        $('.product-info .product-name h2').text(data.productInfo.PRODUCT_NAME);
        $('.product-info .product-price h3').text(formatNumber(data.productInfo.PRICE) + ' VND');
        $('.product-category p').text(data.productInfo.CATEGORY_NAME);

        $('.tab-pane p').text(data.productInfo.DESCRIPTION);
        $('.tab-pane #second_img').attr('src', imageUrlSecond);
        $('.tab-pane #third_img').attr('src', imageUrlThird);

        data.tableProductSize.forEach(function (row){
          $('.size').append(`
            <button class="btn-size">${row.SIZE}</button>
          `);
        });

        let countComment = data.tableComment.length;
        let avgScore = 0;
        $('.people-rate-num').text(countComment + " lượt đánh giá");
        
        if (countComment > 0){
          data.tableComment.forEach(function (row){
            avgScore = row.SCORE;
            $('.review-list').append(`
              <div class="person-review">
                <!-- star: start -->
                <div class="review-star">
                  <span>Điếm số: ${row.SCORE}/5.</span>
                </div>
                <!-- star: end -->

                <!-- comment: start -->
                <div class="review-text">
                  <p>${row.CONTENT}</p>
                </div>
                <!-- comment: end -->

                <!-- img: start -->
                <div class="review-img">
                  <div class="name-date">
                    <div class="name">
                      <p>${row.USER_NAME}</p>
                    </div>
                    <div class="date">
                      <p>${row.CMT_DAY}</p>
                    </div>
                  </div>
                </div>
                <!-- img: end -->
              </div>
            `);
          });
          avgScore = Math.round(avgScore / countComment);
          $('.rating-score h5').text(avgScore);
          $.each(Array(avgScore), function(index) {
            $('.rating-icon').append(`
            <ion-icon name="star"></ion-icon>
            `);
          });
        }
        else {
          $('.rating-score h5').text(0);
        }

      }
      else {
        console.error('Empty data received from the server.');
      }
    },
    error: function () {
      console.error('Failed to fetch data from the server.');
    }
  });

  function formatNumber(input) {
    let strNumber = String(input);

    // Split the string into groups of 3 characters from the right
    let chunks = [];
    while (strNumber.length > 0) {
      chunks.push(strNumber.slice(-3));
      strNumber = strNumber.slice(0, -3);
    }

    // Reverse the chunks and join them with dots
    let formattedStr = chunks.reverse().join('.');

    return formattedStr;
  }

  // Lấy tên sản phẩm từ URL
  function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }

});