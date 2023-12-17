<?php
    include "../connect.php";

    function fetchFeedback() {
        global $conn;
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_POST['orderId'];
        }


        $sql1 ="SELECT order_detail.product_id, order_detail.product_name, order_detail.size,
            order_detail.quantity, order_detail.price, order_detail.order_id, first_picture
                    FROM order_detail, product_pictures
                    WHERE order_detail.product_id = product_pictures.product_id
                    AND order_detail.order_id = ?;";
        //sql injection
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param('i', $id);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        $stmt1->close();

        /*$sql = "SELECT ORDERS.USER_ID
                FROM ORDERS
                WHERE ORDER_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $get_UserID = $stmt->get_result();
        $stmt1->close();

        $sql2 = "SELECT comment.score, comment.content
                    FROM comment
                    WHERE comment.user_id = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param('s', $get_UserID, );
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $stmt2->close();*/
        
        $data1 = []; //product
        $data2 = []; //cmt
        
        if($result1 ->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $row['first_picture'] = base64_encode($row['first_picture']);
                $data1[] = $row;
            }
        }

        /*if($result2 ->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $row['first_picture'] = base64_encode($row['first_picture']);
                $data2[] = $row;
            }
        }*/

        $response = array(
            'data1' => $data1,
            'data2' => $data2
        );

        return $response;   
    }

    function addFeedback() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $orderId = $_POST['orderId'];
            $productId = $_POST['productId'];
            $fb_content = $_POST['fb_content'];
            $fb_score = $_POST['fb_score'];  
        }

        //get user_id
        $sql1 = "SELECT ORDERS.USER_ID, ORDERS.NAME FROM ORDERS WHERE ORDERS.ORDER_ID = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param('i', $orderId);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        $stmt1->close();

        if($result1 ->num_rows > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $userID = strval($row1['USER_ID']);
                $userName = strval($row1['NAME']);
            }
        }
        

        //get product name
        $sql2 = "SELECT PRODUCT_NAME FROM PRODUCTS WHERE PRODUCT_ID = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param('i', $productId);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $stmt2->close();

        if($result2 ->num_rows === 1) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $productName = strval($row['PRODUCT_NAME']);
            }
        }

        $cmtDay = strval(date("Y-m-d"));
        $sql = "INSERT INTO comment (PRODUCT_ID, USER_ID, PRODUCT_NAME, USER_NAME, CONTENT, CMT_DAY, SCORE) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isssssi', $productId, $userID, $productName, $userName, $fb_content, $cmtDay ,$fb_score);
        $result = $stmt->execute();
        $stmt->close();

        if($result) {
            return ['result' => true, 'message' => 'Thêm thành công'];
        } else {
            return ['result' => false, 'message' => 'Thêm không thành công'];
        }
        // 
    }
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    
        // Execute the corresponding function based on the action
        switch ($action) {
            case 'fetch':
                // Return the fetched data as JSON response
                echo json_encode(fetchFeedback());
                break;
            case 'feedback':
                echo json_encode(addFeedback());
                break;
            default:
                echo json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Action not specified']);
    }
$conn->close();    
?>