/** @format */
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
  displayMoney(
    productTotal[index],
    calcProductTotal(price[index], productAmount[index].value)
  );

  displayMoney(subTotal, calcSubTotal());
  console.log(calcSubTotal());
  displayMoney(total, calcSubTotal() * 1.02);
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

// FUNCTION: END
