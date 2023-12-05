<?php
include '../connect.php';

// if (isset($_GET['product'])) {
//     echo $_GET['product'];
// }

// function getProductName(){
//     $product = getProduct();
//     echo $product['product_name'];
// }

// function getProductPrice(){
//     $product = getProduct();
//     echo $product['price'];
// }

// Check the product name parameter in the request
if (isset($_GET['product'])) {

    $productName = $_GET['product'];

    $productName = mysqli_real_escape_string($conn, $productName);

    $sql = "SELECT PRODUCT_NAME, PRICE
            FROM PRODUCTS
            WHERE PRODUCTS.PRODUCT_NAME='$productName'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // In JSON hoặc trả về cho client tùy vào yêu cầu
        echo json_encode($data);

        // Đóng kết nối CSDL (nếu bạn không sử dụng Persistent Connections)
        $conn->close();
    } else {
        // Không tìm thấy dữ liệu, có thể thực hiện các xử lý khác tùy thuộc vào yêu cầu của bạn
        echo json_encode(['error' => 'Không tìm thấy dữ liệu']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Action not specified']);
}
?>