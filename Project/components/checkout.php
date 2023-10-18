<!-- @format -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>

    <!-- css -->
    <link rel="stylesheet" href="../css/checkout.css" />
    <link rel="stylesheet" href="../css/base.css" />

    <!-- import font-family -->
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap");
    </style>

    <!-- import icon -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </head>
  <body>
    <!-- body header -->
    <?php include ("C:\wamp64\www\github\IS207_WEB\Project\components\header.php") ?>

    <!-- CHECKOUT HEADER -->
    <div class="checkout-header">
      <h2>Check Out</h2>
      <a href="#">
        <span class="material-symbols-outlined"> keyboard_backspace </span
        >Continue Shopping
      </a>
    </div>

    <!-- CHECKOUT BODY -->
    <div class="checkout-body flex">
      <!-- infor form -->
      <div class="left-col">
        <div class="infor-form flex flex-col">
          <!-- gender -->
          <div class="gender flex">
            <div>
              <input class="square-radio" type="radio" name="gender" id="mrs" />
              <label for="mrs">Mrs.</label>
            </div>

            <div>
              <input class="square-radio" type="radio" name="gender" id="mr" />
              <label for="mr">Mr.</label>
            </div>
          </div>

          <!-- name, email -->
          <input
            type="text"
            placeholder="First name*"
            required
            class="input-char" />
          <input
            type="text"
            placeholder="Last name*"
            required
            class="input-char" />

          <input type="email" placeholder="email" class="input-char" />

          <!-- address -->
          <div class="address width-50-30">
            <input
              type="text"
              placeholder="Street*"
              required
              class="input-char" />
            <input
              type="text"
              placeholder="House*"
              required
              class="input-char" />
          </div>

          <div class="address width-50-50">
            <input
              type="text"
              placeholder="PostCode*"
              required
              class="input-char" />
            <input
              type="text"
              placeholder="Location*"
              required
              class="input-char" />
          </div>
          <select required class="select">
            <option value="" disabled selected>Select Country*</option>
            <option value="country">Country 1</option>
            <option value="country">Country 2</option>
            <option value="country">Country 3</option>
            <option value="country">Country 4</option>
          </select>

          <!-- phone number -->
          <input
            type="number"
            placeholder="Phone Number*"
            required
            class="input-char" />
          <small class="gray-text">*Required field</small>

          <!-- create account -->
          <div>
            <input type="checkbox" id="create-account" />
            <label for="create-account"
              >Create a customer account now and benefit from many
              advantages.</label
            >
          </div>
          <small class="gray-text vertical-center flex"
            ><span class="material-symbols-outlined"> error </span>The password
            will be sent to you by email</small
          >

          <!-- other address -->
          <!-- <div class="flex flex-col"> -->
          <div>
            <input type="checkbox" id="other-address" />
            <label for="other-address">Shipping Address is Different</label>
          </div>

          <input
            type="text"
            placeholder="First name*"
            required
            class="input-char" />
          <input
            type="text"
            placeholder="Last name*"
            required
            class="input-char" />
          <div class="address width-50-30">
            <input
              type="text"
              placeholder="Street*"
              required
              class="input-char" />
            <input
              type="text"
              placeholder="House*"
              required
              class="input-char" />
          </div>
          <div class="address width-50-50">
            <input
              type="text"
              placeholder="PostCode*"
              required
              class="input-char" />
            <input
              type="text"
              placeholder="Location*"
              required
              class="input-char" />
          </div>
          <select required class="select">
            <option value="" disabled selected>Select Country*</option>
            <option value="country">Country 1</option>
            <option value="country">Country 2</option>
            <option value="country">Country 3</option>
            <option value="country">Country 4</option>
          </select>
        </div>
        <!-- </div> -->

        <!-- payment -->
        <div class="payment-section flex flex-col">
          <!-- paypal -->
          <div class="payment">
            <div class="payment-header flex vertical-center">
              <div class="flex vertical-center">
                <img src="../img/footer_image/paypal.png" />Pay Pal
              </div>
              <input
                type="radio"
                value="paypal"
                class="square-radio"
                name="payment" />
            </div>
          </div>

          <!-- master card -->

          <div class="payment">
            <div class="payment-header flex vertical-center">
              <div class="flex vertical-center">
                <img src="../img/footer_image/mastercard.png" />Master Card
              </div>
              <input
                type="radio"
                value="paypal"
                class="square-radio"
                name="payment" />
            </div>
          </div>

          <!-- Napas -->
          <div class="payment">
            <!-- header -->
            <div class="payment-header flex vertical-center">
              <div class="flex vertical-center">
                <img src="../img/footer_image/napas.png" />Napas
              </div>
              <input
                type="radio"
                value="paypal"
                class="square-radio"
                name="payment" />
            </div>

            <!-- body (infor) -->
            <div class="payment-body flex flex-col">
              <!-- bank -->
              <select required class="select">
                <option value="" selected disabled>Select bank*</option>
                <option value="bank">Bank 1</option>
                <option value="bank">Bank 2</option>
                <option value="bank">Bank 3</option>
                <option value="bank">Bank 4</option>
              </select>

              <!-- card number -->
              <input
                type="number"
                placeholder="Credit card number*"
                required
                class="input-char" />

              <!-- expity date & cvc/cvv -->
              <div class="width-50-50">
                <!-- date -->
                <input
                  required
                  type="text"
                  placeholder="Expity Date*"
                  onfocus="(this.type='date')"
                  class="select" />

                <!-- cvc/cvv -->
                <input
                  type="text"
                  required
                  placeholder="CVC / CVV*"
                  class="input-char" />
              </div>

              <!-- cardholder's name -->
              <input
                type="text"
                required
                class="input-char"
                placeholder="Name of Cardholder*" />
            </div>
          </div>
        </div>
      </div>

      <!-- buy column -->
      <div class="right-col">
        <!-- product list -->
        <table class="product-list">
          <!-- table col's name -->
          <tr class="col-name">
            <td>Article</td>
            <td>Total</td>
          </tr>

          <!-- product -->
          <tr class="product">
            <td class="product-infor">
              <img
                class="product-img"
                src="https://bisuth-store-demo.myshopify.com/cdn/shop/products/14.4.png?v=1657703781" />
              <div class="product-descr">
                <a href="#">Product Name</a>
                <small class="gray-text">Lorem ipsum</small>
                <small>X1</small>
              </div>
            </td>

            <td>300.000</td>
          </tr>
          <!-- product -->
          <tr class="product">
            <td class="product-infor">
              <img
                class="product-img"
                src="https://bisuth-store-demo.myshopify.com/cdn/shop/products/14.4.png?v=1657703781" />
              <div class="product-descr">
                <a href="#">Product Name</a>
                <small class="gray-text">Lorem ipsum</small>
                <small>X1</small>
              </div>
            </td>

            <td>300.000</td>
          </tr>
          <!-- product -->
          <tr class="product">
            <td class="product-infor">
              <img
                class="product-img"
                src="https://bisuth-store-demo.myshopify.com/cdn/shop/products/14.4.png?v=1657703781" />
              <div class="product-descr">
                <a href="#">Product Name</a>
                <small class="gray-text">Lorem ipsum</small>
                <small>X1</small>
              </div>
            </td>

            <td>300.000</td>
          </tr>
        </table>

        <!-- buy section -->
        <div class="buy-section">
          <!-- sub total -->
          <div class="sub-total flex">
            <p>Subtotal</p>
            <p>183.00 SAR</p>
          </div>

          <!--  -->

          <!-- shipping -->
          <div class="shipping flex">
            <small class="gray-text">shipping</small
            ><small class="gray-text">5.91 SAR</small>
          </div>

          <!-- total -->
          <div class="total flex">
            <p>Total</p>
            <p>143.91 SAR</p>
          </div>

          <!-- buy -->
          <button class="buy-btn btn">Buy</button>
          <!-- accept rule -->
          <input type="checkbox" id="accept-rule" />
          <label for="accept-rule" class="gray-text"
            ><small>
              ipsum dolor sit amet, consectetur adipisicing elit.</small
            ></label
          >
          <!-- avaliable pament method -->
        </div>
        <h4>We Aceept</h4>
        <ul class="payment-list flex">
          <li>
            <img
              class="payment-method img"
              src="../img/footer_image/visa.png" />
          </li>
          <li>
            <img
              class="payment-method img"
              src="../img/footer_image/paypal.png" />
          </li>
          <li>
            <img
              class="payment-method"
              src="../img/footer_image/mastercard.png" />
          </li>
          <li>
            <img
              class="payment-method img"
              src="../img/footer_image/momo.png" />
          </li>
          <li>
            <img
              class="payment-method img"
              src="../img/footer_image/napas.png" />
          </li>
        </ul>
      </div>
    </div>
  </body>
</html>
