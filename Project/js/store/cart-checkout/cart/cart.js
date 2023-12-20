/** @format */

// Chỉ cần sử dụng user_id (Nếu chưa đăng nhập thì null)
console.log(user_id);

// Render cart row: start
$(document).ready(function () {
  // sessionStorage.setItem("user_id", "KH0006");
  // const user_id = sessionStorage.getItem("user_id");
  displayCart(user_id);

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

// LAY GIO HANG LUU O CLIENT NEU KHONG DANG NHAP: START
function getLocalCart(cart) {
  // get cart form client
  var mergedCart = [];

  // LAY DATA NEU NGUOI DUNG KHONG DANG NHAP: START
  // DINH DANG JSON CHO GIO HANG && GOP SAN PHAM TRUNG
  // kiem tra xem gio hang da co san pham chua
  function isInclude(arrayObj, value) {
    for (let i = 0; i < arrayObj.length; i++) {
      if (
        arrayObj[i].PRODUCT_NAME == value.PRODUCT_NAME &&
        arrayObj[i].SIZE == value.SIZE
      ) {
        return i;
      }
    }
    return false;
  }

  // dinh dang san pham
  cart.forEach((product, i) => {
    // chuyen thanh object
    var row = {
      ORDER_DETAIL_ID: i,
      PRODUCT_NAME: product[0],
      PRICE: Number(product[1].slice(0, -4).replaceAll(".", "")),
      SIZE: Number(product[2]),
      QUANTITY: Number(product[3]),
      FIRST_PICTURE: product[4].slice(30),
    };

    // dua vao day san pham (cart)
    var varIsInclude = isInclude(mergedCart, row);
    if (varIsInclude === false) {
      mergedCart.push(row);
    } else {
      mergedCart[varIsInclude].QUANTITY += row.QUANTITY;
    }
  });
  // LAY DATA NEU NHUOI DUNG KHONG DANG NHAP: END
  return mergedCart;
}
// LAY GIO HANG LUU O CLIENT NEU KHONG DANG NHAP: END

// LAY GIO HANG LUU O DB NEU  DANG NHAP: START
async function getLoginCart(user_id) {
  return $.ajax({
    type: "GET",
    url: "../../../../Project/php/store/cart/cartDisplayProduct.php?action=fetch",
    dataType: "json",
    data: { user_id: user_id },
    success: function (response) {
      // console.log(1);
    },
    error: function () {
      console.error("Failed to fetch data from the server.");
    },
  });
}
// LAY GIO HANG LUU O DB NEU  DANG NHAP: END

async function displayCart(user_id) {
  const cart = JSON.parse(localStorage.getItem("myCart"));
  var total = 0;

  var data =
    user_id !== null ? (await getLoginCart(user_id)).data : getLocalCart(cart);

  // kt xem gio hang co trong khong
  if (data.length === 0) {
    emptyCart();
  }

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
          onClick="removeProduct(${row.ORDER_DETAIL_ID}, ${user_id})"
          type="button">
          <span class="material-symbols-sharp">
delete
</span>
        </button>
      </td>
    </tr>`);
    total += row.QUANTITY * row.PRICE;
  });

  // display sub-total
  document.querySelector(".sub-total--amount").textContent = total;

  // display total
  document.querySelector(".total-amount").textContent = total * 1.05;
}
// Render cart row: end

// CHANGE PRODUCT AMOUNT: START
function changeAmountLocal(cartData, productAmount, rowId) {
  cartData[rowId].QUANTITY = productAmount;

  var cartArray = [];
  cartData.forEach((row) => {
    let rowData = [];
    rowData[0] = row.PRODUCT_NAME;
    rowData[1] = `${row.PRICE} VND`;
    rowData[2] = `${row.SIZE}`;
    rowData[3] = `${row.QUANTITY}`;
    rowData[4] = `data:FIRST_PICTURE/png;base64,${row.FIRST_PICTURE}`;
    cartArray.push(rowData);
  });
  localStorage.setItem("myCart", JSON.stringify(cartArray));
}

function changeAmountLogin() {
  $.ajax({
    type: "GET",
    url: "cartChangeAmount.php",
    data: { inputId: inputId, inputVal: inputVal },
    success: function () {
      // console.log(response);
    },
  });
}

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

  // update data
  if (sessionStorage.getItem("user_id") === null) {
    const cart = JSON.parse(localStorage.getItem("myCart"));
    changeAmountLocal(getLocalCart(cart), Number(inputVal), inputId);
  } else {
    changeAmountLogin();
  }
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

function removeProductLocal(id) {
  const updatedCart = JSON.parse(localStorage.getItem("myCart"));
  updatedCart.splice(id, 1);
  localStorage.setItem("myCart", JSON.stringify(updatedCart));
}

function removeProductLogin(id) {
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

function removeProduct(id, user_id) {
  const confirmResult = confirm("Xác nhận xóa sản phẩm?");
  if (confirmResult === true) {
    // giam so luong san pham trong gio tren giao dien
    rowAmount--;

    $(`#product-${id}`).addClass("hidden");
    if (rowAmount === 0 || typeof rowAmount === "undefined") {
      emptyCart();
    }

    if (user_id) {
      removeProductLogin(id);
    } else {
      removeProductLocal(id);
    }
  }
}
// REMOVE PRODUCT: END
