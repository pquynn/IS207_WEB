/** @format */
// Chỉ cần sử dụng user_id (Nếu chưa đăng nhập thì null)
console.log(user_id);

// test
// user_id = "KH0036";
// console.log(user_id);
const userIdJson = { user_id: `${user_id}` };
console.log(JSON.stringify(userIdJson));

$(document).ready(function () {
  displayCheckout(user_id);
});

// DISPLAY CUSTOMER INFOR: START
async function getLoginCheckout(user_id) {
  return $.ajax({
    type: "GET",
    url: "../../../../Project/php/store/checkout/checkoutDisplay.php?action=fetch",
    dataType: "json",
    data: { user_id: user_id },
    success: function (response) {},
    error: function (xhr, textStatus, err) {
      console.log("readyState: " + xhr.readyState);
      console.log("responseText: " + xhr.responseText);
      console.log("status: " + xhr.status);
      console.log("text status: " + textStatus);
      console.log("error: " + err);
    },
  });
}

function displayCustomerData(customerData) {
  //DISPLAY CUSTOMER INFOR: START
  // gender
  const gender = document.getElementById(`${customerData.GENDER}`);
  gender.checked = true;

  // personal infor
  $(".customer-name").val(customerData.NAME);
  $(".customer-phone").val(customerData.TELEPHONE);

  // address
  // get address
  var addressString = customerData.USER_ADDRESS;
  var myString = addressString.split(",");
  for (var i = 0; i < myString.length; i++) {
    myString[i] = myString[i].trim();
  }

  var address = {
    tinhThanh: "",
    quanHuyen: "",
    xaPhuong: "",
    duongAp: "",
  };
  address.duongAp = myString[0];
  if (myString.length == 4) {
    address.xaPhuong = myString[1];
    address.quanHuyen = myString[2];
    address.tinhThanh = myString[3];
  } else {
    address.quanHuyen = myString[1];
    address.tinhThanh = myString[2];
  }
  if (address.tinhThanh == "TP.HCM") {
    address.tinhThanh = "Thành phố Hồ Chí Minh";
  }

  // display address
  $("#city").val(address.tinhThanh);
  $("#district").val(address.quanHuyen);
  $("#ward").val(address.xaPhuong);
  $("#street").val(address.duongAp);
  //DISPLAY CUSTOMER INFOR: END
}

function displayProductData(productData) {
  // DISPLAY PRODUCT: START
  var subTotal = 0;
  const tbProduct = $(".product-list--checkout");
  productData.forEach(function (row) {
    subTotal += row.PRICE * row.QUANTITY;
    var imageUrl = "data:image/png;base64," + row.FIRST_PICTURE;
    tbProduct.append(`<tr class="product-checkout">
        <td class="product-infor">
          <img
            alt="${row.PRODUCT_NAME}"
            class="product-img"
            src="${imageUrl}" />
          <div class="product-descr">
            <a href="#">${row.PRODUCT_NAME}</a>
            <small class="gray-text">Size ${row.SIZE}</small>
            <small>X${row.QUANTITY}</small>
          </div>
        </td>

        <td>${(row.PRICE * row.QUANTITY).toLocaleString("vi")}</td>
      </tr>`);
  });
  // DISPLAY PRODUCT: END

  // DISPLAY ORDER TOTAL: START
  // sub total
  const divSubTotal = $(".sub-total");
  divSubTotal.append(`<p>Tạm tính (${productData.length} sản phẩm)</p>
      <p>${subTotal.toLocaleString("vi")} đ</p>`);

  // total
  const divTotal = $(".total");
  divTotal.append(`<p>${(subTotal * 1.05).toLocaleString("vi")} đ</p>`);
  // DISPLAY ORDER TOTAL: END
}

async function displayCheckout(user_id) {
  if (user_id !== null) {
    displayCustomerData((await getLoginCheckout(user_id)).customerData);
  }

  var productData =
    user_id !== null
      ? (await getLoginCheckout(user_id)).tableProductData
      : localCart;

  displayProductData(productData);
}
// DISPLAY CUSTOMER INFOR: END

// CLICK BUY BTN: START
const btnBuy = document
  .querySelector(".buy-btn")
  .addEventListener("click", function (e) {
    // Ten, sdt
    const name = $(".customer-name").val();
    const phone = $(".customer-phone").val();

    // gioi tinh
    const gender = $(".gender-radio")[0].checked === true ? "Nam" : "Nữ";

    // Dia chi
    const address = {
      tinhThanh: "",
      quanHuyen: "",
      xaPhuong: "",
      duongAp: "",
    };
    address.tinhThanh = $("#city").val();
    address.quanHuyen = $("#district").val();
    address.xaPhuong = $("#ward").val();
    address.duongAp = $("#street").val();

    e.preventDefault();
    buy(name, phone, gender, address, user_id);
  });

function buy(name, phone, gender, address, user_id) {
  $.ajax({
    url: "../../../../Project/php/store/checkout/checkoutBuy.php?action=fetch",
    // dataType: "json",
    data: {
      user_id: user_id,
      name: name,
      phone: phone,
      gender: gender,
      tinhThanh: address.tinhThanh,
      quanHuyen: address.quanHuyen,
      xaPhuong: address.xaPhuong,
      duongAp: address.duongAp,
    },
    type: "GET",
    success: function (response) {
      console.log(response);
    },
    error: function () {
      console.log(0);
    },
  });
}
// CLICK BUY BTN: END

// GET DATA FROM BD: END

// SELECT ADDRESS: START
// var citis = document.getElementById("city");
// var districts = document.getElementById("district");
// var wards = document.getElementById("ward");
// var Parameter = {
//   url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
//   method: "GET",
//   responseType: "application/json",
// };
// var promise = axios(Parameter);
// promise.then(function (result) {
//   renderCity(result.data);
// });

// function renderCity(data) {
//   for (const x of data) {
//     citis.options[citis.options.length] = new Option(x.Name, x.Id);
//   }
//   citis.onchange = function () {
//     districts.length = 1;
//     wards.length = 1;
//     if (this.value != "") {
//       const result = data.filter((n) => n.Id === this.value);

//       for (const k of result[0].Districts) {
//         districts.options[districts.options.length] = new Option(k.Name, k.Id);
//       }
//     }
//   };
//   districts.onchange = function () {
//     wards.length = 1;
//     const dataCity = data.filter((n) => n.Id === citis.value);
//     if (this.value != "") {
//       const dataWards = dataCity[0].Districts.filter(
//         (n) => n.Id === this.value
//       )[0].Wards;

//       for (const w of dataWards) {
//         wards.options[wards.options.length] = new Option(w.Name, w.Id);
//       }
//     }
//   };
// }
// SELECT ADDRESS: END
