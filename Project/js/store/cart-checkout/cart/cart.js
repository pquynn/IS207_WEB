/** @format */
// Render cart row: start
$(document).ready(function () {
  fetchData();
  // CHANGE PRODUCT'S AMOUNT-BTN: START
  function changeAmountBtn(btnType, id) {
    // var id = $(btn).attr("id").slice(4);
    var value = Number($(`#${id}`).val()) + btnType;
    if (value >= 1 || btnType != -1) {
      // const input = $(`#${id}`);
      $(`#${id}`).val(value).trigger("change");
    }
  }
  // minus
  $(".product-list--body").on("click", ".minus", function () {
    var id = $(this).attr("id").slice(10);
    changeAmountBtn(-1, id);
  });
  // plus
  $(".product-list--body").on("click", ".plus", function () {
    var id = $(this).attr("id").slice(9);
    changeAmountBtn(1, id);
  });
  // CHANGE PRODUCT'S AMOUNT-BTN: END
});

function fetchData() {
  // get cart form client
  const cart = JSON.parse(localStorage.getItem("myCart"));
  var mergedCart = [];

  // DINH DANG JSON CHO GIO HANG && GOP SAN PHAM TRUNG
  // kiem tra xem gio hang dax co san pham chua
  function isInclude(arrayObj, value) {
    arrayObj.forEach((obj, i) => {
      if (obj.name == value.name && obj.size == value.size) {
        console.log(1);
        return i;
      }
    });
    return false;
  }

  // dinh dang san pham
  cart.forEach((product, i) => {
    // chuyen thanh object
    var row = {
      name: product[0],
      price: product[1],
      size: Number(product[2]),
      amount: Number(product[3]),
      img: product[4],
    };

    // dua vao day san pham (cart)
    var varIsInclude = isInclude(mergedCart, row);
    if (varIsInclude === false) {
      mergedCart.push(row);
    } else {
      mergedCart[varIsInclude].amount += row.amount;
    }
  });
  // console.log(mergedCart, mergedCart[0]);
  // console.log(isInclude(mergedCart, mergedCart[0]));

  // for (let i = 0; i < cart.length; i++) {
  //   let product = cart[i];
  //   if (mergedCart.includes(product) === false) {
  //     mergedCart[i] = product;
  //   } else {
  //     mergedCart[mergedCart.indexOf[product]][3] += product[3];
  //     console.log(1);
  //   }
  // }

  var total = 0;
  $.ajax({
    url: "../../../../Project/php/store/cart/cartDisplayProduct.php",
    dataType: "json",
    type: "GET",
    success: function (response) {
      var data = response.data;

      // check if cart is empty
      if (data[0].STATUS !== "Đang mua hàng") {
        emptyCart();
        return 1;
      }
      // Populate the table with fetched data
      const tbCart = $(".product-list--body");
      data.forEach(function (row) {
        getRowAmount(data.length);

        var imageUrl = "data:image/png;base64," + row.FIRST_PICTURE;
        tbCart.append(`
        <tr 
          class="product" 
          id="product-${row.ORDER_DETAIL_ID}">
        <!-- infor -->
        <td class="product-infor">
          <img
            src="${imageUrl}"
            class="product-img"
            alt="${row.PRODUCT_NAME}" />
          <div class="product-descr">
            <a href="#">${row.PRODUCT_NAME}</a>
            <small class="gray-text">Size ${row.SIZE}</small>
          </div>
        </td>

        <!-- price -->
        <td class="price">${row.PRICE * 1}</td>

        <!-- amount -->
        <td class="product-amount">
          <div class="flex amount">
            <button
            class="amount-btn pointer minus"
            id="btn-minus-${row.ORDER_DETAIL_ID}">
            -</button>
            <input
              class="amount-feld"
              type="number"
              min="1"
              value="${row.QUANTITY}"
              id="${row.ORDER_DETAIL_ID}"
              onChange="changeAmountInpt(${row.ORDER_DETAIL_ID}, ${row.PRICE})">
            <button
            class="amount-btn pointer plus"
            id="btn-plus-${row.ORDER_DETAIL_ID}">
            +</button>
          </div>
        </td>

        <!-- total -->
        <td 
          id="pro-total-${row.ORDER_DETAIL_ID}"
          class="product-total">
          ${row.PRICE * row.QUANTITY}
        </td>

        <!-- remove from cart -->
        <td>
          <button 
            class="remove-btn pointer"
            id="btn-remove-${row.ORDER_DETAIL_ID}"
            onClick="removeProduct(${row.ORDER_DETAIL_ID})">
            <span class="material-symbols-outlined"> delete </span>
          </button>
        </td>
      </tr>`);
        total += row.QUANTITY * row.PRICE;
      });

      // display sub-total
      document.querySelector(".sub-total--amount").textContent = total;

      // display total
      document.querySelector(".total-amount").textContent = total * 1.05;
    },
    error: function () {
      console.error("Failed to fetch data from the server.");
    },
  });
}
// Render cart row: end

// CHANGE PRODUCT AMOUNT: START
function changeAmountInpt(inputId, productPrice) {
  // check amount input
  var inputVal = $(`#${inputId}`).val();
  if (inputVal < 1) {
    $(`#${inputId}`).val(1);
    inputVal = 1;
  }

  // change product's total
  $(`#pro-total-${inputId}`).text(Number(inputVal) * productPrice);

  // change order's total
  const productRow = $(".product-total").toArray();
  var total = 0;
  for (i = 0; i < productRow.length; i++) {
    total += Number(productRow[i].textContent);
  }

  document.querySelector(".sub-total--amount").textContent = total;
  document.querySelector(".total-amount").textContent = total * 1.05;

  $.ajax({
    type: "GET",
    url: "cartChangeAmount.php",
    data: { inputId: inputId, inputVal: inputVal },
    success: function () {
      // console.log(response);
    },
  });
}
// CHANGE PRODUCT AMOUNT: END

// REMOVE PRODUCT: START
function emptyCart() {
  document.querySelector(".empty-cart").classList.toggle("hidden");
  document.querySelector(".cart-body").classList.toggle("hidden");
}

var rowAmount;
function getRowAmount(amount) {
  rowAmount = amount;
}
function removeProduct(id) {
  const confirmResult = confirm("Xác nhận xóa sản phẩm?");
  if (confirmResult == true) {
    rowAmount--;
    $(`#product-${id}`).addClass("hidden");
    if (rowAmount === 0) {
      emtyCart();
    }

    $.ajax({
      type: "GET",
      url: "cartRemoveProduct.php",
      data: { id: id },
      success: function (response) {
        console.log(response);
      },
      error: function () {
        console.log("error");
      },
    });
  }
}
// REMOVE PRODUCT: END
