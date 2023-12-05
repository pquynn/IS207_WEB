/** @format */
// Render cart row: start
function fetchData(page) {
  $.ajax({
    url: "cartFeat.php",
    type: "GET",
    data: { page: page },
    dataType: "json",
    success: function (response) {
      var data = response.data;

      // Populate the table with fetched data
      const tbCart = $(".product-list--cart tb");
      tbCart.empty();

      data.forEach(function (row) {
        var imageUrl = "data:image/png;base64," + row.first_picture;
        tbCart.append(`
        <tr class="product">
        <!-- infor -->
        <td class="product-infor">
          <img 
            src="${imageUrl}"
            class="product-img"
            alt="${orderDetail["PRODUCT_NAME"]}" />
          <div class="product-descr">
            <a href="#">${orderDetail["PRODUCT_NAME"]}</a>
            <small class="gray-text">Size ". $orderDetail["SIZE"]. "</small>
          </div>
        </td>

        <!-- price -->
        <td class="price">" .$orderDetail["PRICE"]. "</td>

        <!-- amount -->
        <td>
          <div class="flex amount">
            <button 
            class="amount-btn pointer minus" onClick="changeAmount(-1, ".$index.")">-</button >
            <input 
              type="number" onClick="updateAmount()"
              min="1" 
              value=" .$orderDetail["QUANTITY"]." 
              onChange="updateMoney(" .$index. ")"/>
            <button class="amount-btn pointer plus" onClick="changeAmount(1, ".$index.")">+</button>
          </div>
        </td>

        <!-- total -->
        <td class="product-total">199000</td>

        <!-- remove from cart -->
        <td>
          <button class="remove-btn pointer">
            <span class="material-symbols-outlined"> delete </span>
          </button>
        </td>
      </tr>`);
      });

      updatePagination(page, totalPages);
    },
    error: function () {
      console.error("Failed to fetch data from the server.");
    },
  });
}
fetchData(1);
// Render cart row: end

// UPDATE AMOUNT IN UI: START
// SELECT COMPONENTS: START
// update total money
const subTotal = document.querySelector(".sub-total--amount");
const total = document.querySelector(".total-amount");
const price = document.querySelectorAll(".price");
const productTotal = document.querySelectorAll(".product-total");

// change product amount
const productAmount = document.querySelectorAll(".amount input");
const minusBtn = document.querySelectorAll(".minus");
const plusBtn = document.querySelectorAll(".plus");

// delete product
const productList = document.querySelectorAll(".product");
const removeBtn = document.querySelectorAll(".remove-btn");

// when cart is empty
let amount = productList.length;
const cartBody = document.querySelector(".cart-body");
const cartEmpty = document.querySelector(".empty-cart");
// SELECT COMPONENTS: END

// FUNCTION: START

// UPDATE TOTAL MONEY: START
///// CALC MONEY
// calc product-total
function calcProductTotal(price, amount) {
  return Number(price.textContent.replace(/\s/g, "")) * Number(amount);
}

// cals sub-total
function calcSubTotal() {
  let total = 0;
  price.forEach((p, i) => {
    total += calcProductTotal(p, Number(productAmount[i].value));
  });
  return total;
}

// update money when change amount
function updateMoney(index) {
  // prevent <1 product quantity
  if (Number(productAmount[index].value) < 1) {
    productAmount[index].value = 1;
  } else {
    // update money amount in UI
    displayMoney(
      productTotal[index],
      calcProductTotal(price[index], productAmount[index].value)
    );
    displayMoney(subTotal, calcSubTotal());
    displayMoney(total, calcSubTotal() * 1.02);
  }
}

// DISPLAY MONEY
// default
function displayMoney(priceComponent, price) {
  priceComponent.textContent = Number(price).toLocaleString("de-AT");
}

price.forEach((p) => displayMoney(p, p.textContent));
productTotal.forEach((p, i) => {
  displayMoney(p, calcProductTotal(price[i], Number(productAmount[i].value)));
});
displayMoney(subTotal, calcSubTotal());
displayMoney(total, calcSubTotal() * 1.02);
// UPDATE TOTAL MONEY: END

// CHANGE PRODUCT AMOUNT: START
function changeAmount(operator, index) {
  const value = Number(productAmount[index].value);
  if (value === 1 && operator === -1) {
    return 0;
  }
  productAmount[index].value = operator + value;

  // update money
  updateMoney(index);
}

minusBtn.forEach((minus, i) => {
  minus.addEventListener("click", function () {
    changeAmount(-1, i);
  });
});
plusBtn.forEach((plus, i) => {
  plus.addEventListener("click", function () {
    changeAmount(1, i);
  });
});
// CHANGE PRODUCT AMOUNT: END

// DELETE PRODUCT: STARt
function removeProduct(index) {
  productList[index].classList.toggle("hidden");
}

// WHEN CART IS EMPTY: START
removeBtn.forEach((remove, i) => {
  remove.addEventListener("click", function () {
    // confirm delete product
    const agree = confirm("Xác nhận xóa sản phẩm?");
    if (agree === false) {
      return 1;
    }

    amount--;
    removeProduct(i);

    // set product amount to 0
    productAmount[i].value = 0;
    displayMoney(subTotal, calcSubTotal());
    displayMoney(total, calcSubTotal() * 1.02);

    // when cart is empty
    if (amount === 0) {
      cartBody.classList.toggle("hidden");
      cartEmpty.classList.toggle("hidden");
    }
  });
});
// WHEN CART IS EMPTY: END
// DELETE PRODUCT: END

// PREVENT SUBMIT: START
// when click enter
$(document).ready(function () {
  $(window).keydown(function (event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

// PREVENT SUBMIT: END
// FUNCTION: END
// UPDATE AMOUNT IN UI: START

// Update amount to db
function updateAmount() {
  // Khở tạo đối tượng xhr
  var xhr = new XMLHttpRequest();

  // callback funtion on onreadystatechange event
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        console.log(xhr.responseText);
      } else {
        console.log(`Có lỗi xảy ra: ${xhr.status}`);
      }
    }
  };

  xhr.open("GET", "cartFeat.php", true);
  xhr.send(null);
}
