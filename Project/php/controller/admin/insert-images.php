<?php
include '../connect.php';
global $conn; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['product-name']) && isset($_FILES['product-images'])&& isset($_POST['action'])){
    $first_pic = $_FILES['product-images']['tmp_name'][0];
    $second_pic = $_FILES['product-images']['tmp_name'][1];
    $third_pic = $_FILES['product-images']['tmp_name'][2];

    $first_pic_blob = file_get_contents($first_pic);
    $second_pic_blob = file_get_contents($second_pic);
    $third_pic_blob = file_get_contents($third_pic);
  
    $sql = "SELECT product_id FROM products ORDER BY product_id desc LIMIT 1";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $id = (int) $row['product_id'];

        $sql = "INSERT INTO product_pictures (product_id, first_picture, second_picture, third_picture)
        VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isss', $id, $first_pic_blob, $second_pic_blob, $third_pic_blob);


        if ($stmt->execute()) 
        echo json_encode (['result' => true, 'message' => 'Thêm product_pictures thành công']);
        else  
        echo json_encode (['result' => false, 'message' => 'Thêm product_pictures không thành công']);

    }
    else
    echo json_encode (['result' => false, 'message' => 'Không tìm thấy product_id']);
   
    // echo json_encode (['result' => true, 'message' => $action]);

    }
    else echo json_encode(['result' => false, 'message' => 'Không tìm thấy files']);
    
} else {
    echo json_encode(['error' => 'Invalid request.']);
}

?>


