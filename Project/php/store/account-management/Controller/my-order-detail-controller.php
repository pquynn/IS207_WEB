<?php
    include "../Connect_MySQL.php";

    function fetchDetail() {
        global $conn;
    
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['orderId'];
        }

            $sql1 = "SELECT order_id, order_date, telephone, orders.name,
            orders.address, orders.pay, orders.status, orders.total_products,
            total_price 
                    FROM orders
                    WHERE order_id = $id";
            $result1 = mysqli_query($conn, $sql1);
    
    
            $sql2 ="SELECT order_detail.product_id, order_detail.product_name, order_detail.size,
            order_detail.quantity, order_detail.price, order_detail.order_id, first_picture
                    FROM order_detail, product_pictures
                    WHERE order_detail.product_id = product_pictures.product_id
                    AND order_detail.order_id = $id;";
            $result2 = $conn->query($sql2);        
            $data1 = [];
            $data2 =[];
    
            if($result1 ->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {
                    $data1[] = $row;
                }
            }
            if($result2 ->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result2)) {
                    $row['first_picture'] = base64_encode($row['first_picture']);
                    $data2[] = $row;
                }
            }
    
            $response = array(
                'data1' => $data1, //dữ liệu khách hàng
                'data2' => $data2 //dữ liệu sản phẩm
            );
    
            return $response;      
    }

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    
        // Execute the corresponding function based on the action
        switch ($action) {
            case 'detail':
                echo json_encode(fetchDetail());
                break;
            default:
                echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not specified']);
    }
    
    $conn->close();
?>