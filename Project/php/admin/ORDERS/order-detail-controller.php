<?php
    include "../Connect_MySQL.php";

    function detailOrder() {
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

    function UpdateInfoCus() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $CusName = $_GET['name'];
            $CusTel = $_GET['tel'];
            $orderID = $_GET['id'];
            $sql = "UPDATE orders 
                    SET name = '$CusName', telephone = '$CusTel'
                    WHERE order_id = '$orderID'";
            $result = $conn->query($sql);
            return $result;
        }
        else
            return false;
    }

    function updateCusAddress() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $CusAddress = $_GET['address'];
            $orderID = $_GET['id'];
            $sql = "UPDATE orders 
                    SET address = '$CusAddress'
                    WHERE order_id = '$orderID'";
            $result = $conn->query($sql);
            return $result;
        }
        else
            return false;        
    }

    function updateCusPay() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $CusPay = $_GET['pay'];
            $orderID = $_GET['id'];
            $sql = "UPDATE orders 
                    SET pay = '$CusPay'
                    WHERE order_id = '$orderID'";
            $result = $conn->query($sql);
            return $result;
        }
        else
            return false;       
    }

    function updateStatus() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $status_get = $_GET['order_status'];
            $orderID = $_GET['id'];
            switch($status_get) {
                case 'prepare':
                    $status = 'Đang chuẩn bị hàng';
                    break;
                case 'shipping':
                    $status = 'Đang giao hàng';
                    break;
                case 'order-success':
                    $status = 'Giao thành công';
                    break;
                case 'order-cancel':
                    $status = 'Đã hủy';
                    break;
                default:
                    $status='';

            }
            $sql = "UPDATE orders 
                    SET orders.status = '$status'
                    WHERE order_id = '$orderID'";
            $result = $conn->query($sql);
            return $result;
        }
        else
            return false;          
    }
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    
        // Execute the corresponding function based on the action
        switch ($action) {
            case 'detail':
                echo json_encode(detailOrder());
                break;
            case 'updateInfoCus':
                echo json_encode(UpdateInfoCus());
                break;
            case 'updateCusAddress':
                echo json_encode(updateCusAddress());
                break;
            case 'updateCusPay':
                echo json_encode(updateCusPay());
                break;
            case 'updateStatus':
                echo json_encode(updateStatus());
                break;
            default:
                echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not specified']);
    }
    
    $conn->close();
?>