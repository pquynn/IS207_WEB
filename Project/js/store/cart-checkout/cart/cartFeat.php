<!-- connect to database: start -->
<?php
  $conn=new mysqli('localhost', 'root', '', 'shoe_shop_db');

  // check connection
  if(!$conn){
    die("Kết nối thất bại: ". mysqli_connect_error());
  }
  else{
    // echo "Kết nối thành công";
  }

//   SELECT TABLE: START
// order's detail
$orderDetailList = $conn->query("SELECT DISTINCT * FROM orders INNER JOIN orders_detail ON orders_detail.ORDER_ID = orders.ORDER_ID WHERE STATUS='Đang mua hàng' AND orders.ORDER_ID=9");

// product pricture
$productPictureList = $conn->query("SELECT * FROM product_pictures INNER JOIN orders_detail ON orders_detail.product_id = product_pictures.product_id WHERE ORDER_ID=1");
// $productPicture = $productPictureList -> fetch_assoc();
//   SELECT TABLE: END
//   connect to sever: end

// DISPLAY PRODUCT: START
function fetchProducts() {
    $data = [];

    // GET PRODUCT IMG: START
    while ($productPicture = $productPictureList->fetch_assoc()) {
        $productPicture['first_picture'] = base64_encode($productPicture['first_picture']); //end code image data
        $data[] = $productPicture;
    }
    // GET PRODUCT IMG: START

    // Create an associative array with multiple values
    $response = array(
        'data' => $data,
    );
    
    //return ['data' => $data, 'totalPages' => $totalPages];
    return $response;
}
// DISPLAY PRODUCT: START
?>