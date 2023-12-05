<?php
include '../connect.php';

// Check the product name parameter in the request
if (isset($_GET['name'])) {
    $productName = $_GET['name'];
       
    global $conn;

    // Lấy dữ liệu từ biến $productName và tránh SQL injection
    $productName = mysqli_real_escape_string($conn, $productName);
    
    $sql = "SELECT product_name, price, first_picture
                    FROM products
                    INNER JOIN product_pictures ON products.product_id = product_pictures.product_id
                    WHERE product_name = $productName";
    $result = $conn->query($sql);

    $data = array();

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
    
        // Chuyển đổi thành JSON
        $json_data = json_encode($data);
    
        // In JSON hoặc trả về cho client tùy vào yêu cầu
        echo $json_data;
    
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