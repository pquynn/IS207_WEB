<?php
// DISPLAY PRODUCT: START
include "./connect.php";
function fetchProducts() {
  global $conn;

  //   SELECT TABLE: START
  // order's detail
  $sql = "SELECT PRODUCT_NAME, SIZE, QUANTITY, PRICE, FIRST_PICTURE, ORDER_DETAIL_ID, STATUS
          FROM orders 
                INNER JOIN order_detail 
                ON order_detail.ORDER_ID = orders.ORDER_ID
                INNER JOIN product_pictures
                ON order_detail.product_id = product_pictures.product_id
          -- WHERE orders.ORDER_ID=4";
  
  $orderDetailList = $conn->query($sql);
  //   SELECT TABLE: END
  //   connect to sever: end

    $data = [];
    $index=0;
    // get data: START
    while ($orderDetail = $orderDetailList -> fetch_assoc()) {
      // get img
      $data[$index]=$orderDetail['FIRST_PICTURE'] = base64_encode($orderDetail['FIRST_PICTURE']);
      $data[$index]=$orderDetail;
      $index++;
    }
    // get data: END

    // Create an associative array with multiple values
    $response = array(
        'data'=> $data
    );

    // CLOSE CONNECTION
    // $conn -> close();
    return json_encode($response);
}
echo fetchProducts();
// DISPLAY PRODUCT: end
?>