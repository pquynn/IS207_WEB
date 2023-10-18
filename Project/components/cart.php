<!-- @format -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>

    <!-- css -->
    <link rel="stylesheet" href="../css/cart.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/base.css" />

    <!-- import font-family -->
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap");
    </style>

    <!-- import icon -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  </head>
  <body>

<!-- page header -->
<?php include ("C:\wamp64\www\github\IS207_WEB\Project\components\header.php") ?>

    <!-- CART_HEADER -->
    <div class="cart-header">
      <h2>Shopping Cart</h2>
      <a href="#">
        <span class="material-symbols-outlined"> keyboard_backspace </span
        >Continue Shopping
      </a>
    </div>

    <!-- CART-BODY -->
    <div class="cart-body">
      <!-- PRODUCT-LIST -->
      <table class="product-list">
        <!-- header -->
        <tr class="product-list--header">
          <th><p>Product Name</p></th>
          <th><p>Price</p></th>
          <th><p>QTY</p></th>
          <th><p>Total SAR</p></th>
          <th></th>
        </tr>

        <!-- product -->
        <tr class="product">
          <!-- infor -->
          <td class="product-infor">
            <img
              class="product-img"
              src="https://bisuth-store-demo.myshopify.com/cdn/shop/products/14.4.png?v=1657703781" />
            <div class="product-descr">
              <a href="#">Product Name</a>
              <small class="gray-text">Lorem ipsum</small>
            </div>
          </td>

          <!-- price -->
          <td>199.000</td>

          <!-- amount -->
          <td>
            <div class="flex">
              <button class="amount-btn pointer">-</button>
              <input type="number" min="1" value="1" />
              <button class="amount-btn pointer">+</button>
            </div>
          </td>

          <!-- total -->
          <td>199.00</td>

          <!-- remove from cart -->
          <td>
            <button class="remove-btn pointer">
              <span class="material-symbols-outlined"> delete </span>
            </button>
          </td>
        </tr>

        <tr class="product">
          <!-- infor -->
          <td class="product-infor">
            <img
              class="product-img"
              src="https://bisuth-store-demo.myshopify.com/cdn/shop/products/14.4.png?v=1657703781" />
            <div class="product-descr">
              <a href="#">Product Name</a>
              <small class="gray-text">Lorem ipsum</small>
            </div>
          </td>

          <!-- price -->
          <td>199.000</td>

          <!-- amount -->
          <td>
            <div class="flex">
              <button class="amount-btn pointer">-</button>
              <input type="number" min="1" value="1" />
              <button class="amount-btn pointer">+</button>
            </div>
          </td>

          <!-- total -->
          <td>199.00</td>

          <!-- remove from cart -->
          <td>
            <button class="remove-btn pointer">
              <span class="material-symbols-outlined"> delete </span>
            </button>
          </td>
        </tr>

        <tr class="product">
          <!-- infor -->
          <td class="product-infor">
            <img
              class="product-img"
              src="https://bisuth-store-demo.myshopify.com/cdn/shop/products/14.4.png?v=1657703781" />
            <div class="product-descr">
              <a href="#">Product Name</a>
              <small class="gray-text">Lorem ipsum</small>
            </div>
          </td>

          <!-- price -->
          <td>199.000</td>

          <!-- amount -->
          <td>
            <div class="flex">
              <button class="amount-btn pointer">-</button>
              <input type="number" min="1" value="1" />
              <button class="amount-btn pointer">+</button>
            </div>
          </td>

          <!-- total -->
          <td>199.00</td>

          <!-- remove from cart -->
          <td>
            <button class="remove-btn pointer">
              <span class="material-symbols-outlined"> delete </span>
            </button>
          </td>
        </tr>
      </table>

      <!-- SUBMIT-SECTION -->
      <div class="submit-section flex">
        <!-- header -->
        <h4 class="flex">
          Do you have a voucher? <small class="gray-text">(Optional)</small
          ><span class="material-symbols-outlined pointer">
            keyboard_arrow_up
          </span>
        </h4>

        <!-- redeem voucher code -->
        <div class="redeem-section">
          <input class="btn-cancel" placeholder="Enter the code" type="text" />
          <button class="btn-confirm pointer">Redeem</button>
        </div>

        <!-- sub total -->
        <div>
          <div class="sub-total flex">
            <p>Subtotal</p>
            <p>183.00 SAR</p>
          </div>
          <div class="shipping flex">
            <small class="gray-text">shipping</small
            ><small class="gray-text">5.91 SAR</small>
          </div>
        </div>

        <!-- total -->
        <div class="total flex">
          <p>Total <small class="gray-text">(VAT inclued)</small></p>
          <p>143.91 SAR</p>
        </div>

        <!-- checkout btn -->
        <button class="btn checkout-bnt pointer">Safe to checkout</button>
      </div>
    </div>
  </body>
</html>
