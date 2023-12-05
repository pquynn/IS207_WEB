<?php
include '../connect.php';

function convertUrlEncodedToPlain($urlEncodedString) {
    $decodedString = urldecode($urlEncodedString);
    $plainString = str_replace('%20', ' ', $decodedString);
    return $plainString;
}

if (isset($_GET['product'])) {
    $productName = convertUrlEncodedToPlain($_GET['product']);

    //echo $productName;
        $sql = "SELECT product_name, price
            FROM products
            WHERE products.product_id=$productName";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();
            echo $data['product_name'];
            echo "<br>";
            echo $data['price'];
        }

}

// function getProductName(){
//     $product = getProduct();
//     echo $product['product_name'];
// }

// function getProductPrice(){
//     $product = getProduct();
//     echo $product['price'];
// }


// // function getProduct(){
//     // Check the product name parameter in the request
//     if (isset($_GET['product'])) {
//         $productName = convertUrlEncodedToPlain($_GET['product']);
        
//         //global $conn;
    
//         //Lấy dữ liệu từ biến $productName và tránh SQL injection
//         //$productName = mysqli_real_escape_string($conn, $productName);
        
//         // $sql = "SELECT product_name, price, first_picture
//         //                 FROM products, product_pictures
//         //                 WHERE products.product_id = 1
//         //                     AND products.product_id = product_pictures.product_id";
//         $sql = "SELECT product_name, price
//             FROM products
//             WHERE products.product_name='$productName'";

//         $result = $conn->query($sql);
        
//         if ($result && $result->num_rows > 0) {
//             $data = $result->fetch_assoc();

//             // In JSON hoặc trả về cho client tùy vào yêu cầu
//             echo json_encode($data);
        
//             // Đóng kết nối CSDL (nếu bạn không sử dụng Persistent Connections)
//             $conn->close();
//         } else {
//             // Không tìm thấy dữ liệu, có thể thực hiện các xử lý khác tùy thuộc vào yêu cầu của bạn
//             echo json_encode(['error' => 'Không tìm thấy dữ liệu']);
//         }
    
//     } else {
//         echo json_encode(['success' => false, 'message' => 'Action not specified']);
//     }
// }
?>