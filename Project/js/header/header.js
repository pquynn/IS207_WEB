$(document).ready(function () {
  // Mở giỏ hàng
  $('#cartIcon').click(function () {
    // Tạo URL mới với tham số truyền vào là tên sản phẩm
    var url = '../../store/cart-checkout/cart.php';

    // Chuyển hướng đến trang mới
    window.location.href = url;
  });

  // Sự kiện khi tìm kiếm sản phẩm
  $("#search-product").keypress(function (event) {
    // Kiểm tra xem phím được nhấn có phải là phím Enter không (keyCode 13)
    if (event.which === 13) {
      // Lấy giá trị từ trường nhập liệu
      var searchProduct = $(this).val();

      if (searchProduct !== "") {
        // Tạo URL mới với tham số truyền vào là tên sản phẩm
        var url = '../../store/homepage-shopping/product_list.php?searchName=' + encodeURIComponent(searchProduct);

        // Chuyển hướng đến trang mới
        window.location.href = url;
      }
    }
  })
});