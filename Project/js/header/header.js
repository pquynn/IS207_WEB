/** @format */
console.log(user_id);

$(document).ready(function () {
  // hien tuy chon tai khoan doi voi nguoi dung: bat dau
  const account = $(".account");
  function getRoleId(user_id) {
    if (user_id === null) {
      return 1;
    }

    $.ajax({
      type: "GET",
      url: "../../../../Project/php/store/header-footer-nav/headerGetRoleId.php?action=fetch",
      dataType: "json",
      data: { user_id: user_id },
      success: function (response) {
        console.log(Number(response.ROLE_ID));

        const account = $(".account");
        const accountHTML = `<a>
        <span class="material-symbols-outlined"> account_circle </span>
      </a>
      <ul class="sub-nav">
        <li class="sub-nav--item hover-underline">
          <a href="../account-management/account-profile.php">TÀI KHOẢN</a>
        </li>
        ${
          Number(response.ROLE_ID) !== 3
            ? `<li class="sub-nav--item hover-underline">
                    <a href="../../admin/Dashboard.php">QUẢN LÝ</a>
              </li>`
            : ""
        }
        <li class="sub-nav--item hover-underline">
          <a href="#">LOG OUT</a>
        </li>
      </ul>`;

        account.append(accountHTML);
      },
      error: function () {
        console.error("Failed to fetch data from the server.");
      },
    });
  }
  getRoleId(user_id);
  // hien tuy chon tai khoan doi voi nguoi dung: bat dau

  // Mở giỏ hàng
  $("#cartIcon").click(function () {
    // Tạo URL mới với tham số truyền vào là tên sản phẩm
    var url = "../../store/cart-checkout/cart.php";

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
        var url =
          "../../store/homepage-shopping/product_list.php?searchName=" +
          encodeURIComponent(searchProduct);

        // Chuyển hướng đến trang mới
        window.location.href = url;
      }
    }
  });
});
