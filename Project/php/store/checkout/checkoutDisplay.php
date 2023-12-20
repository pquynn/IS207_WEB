<?php
include('../cart/connect.php');
function getChekoutData(){
    global $conn;

    $sqlCustomerData="SELECT DISTINCT NAME, TELEPHONE, users.ADDRESS AS USER_ADDRESS, orders.ADDRESS AS ORDER_ADDRESS, GENDER
    FROM  orders
        INNER JOIN order_detail 
        ON order_detail.ORDER_ID = orders.ORDER_ID
        INNER JOIN users 
        ON orders.USER_ID = users.USER_ID
    WHERE orders.ORDER_ID=1";

    $sqlProductData ="SELECT PRODUCT_NAME, SIZE, QUANTITY, PRICE, FIRST_PICTURE, ORDER_DETAIL_ID
                    FROM orders 
                        INNER JOIN order_detail 
                        ON order_detail.ORDER_ID = orders.ORDER_ID
                        INNER JOIN product_pictures
                        ON order_detail.product_id = product_pictures.product_id
                    WHERE orders.ORDER_ID=1";
    $productData = $conn -> query($sqlProductData);
    $customerData = $conn -> query($sqlCustomerData);
    

    $productDataJson=[];
    // $customerDataJson;
    $index=0;
    while($customer = $customerData -> fetch_assoc()){
        $customerDataJson=$customer;
        $index++;
    }

    $index=0;
    while($product = $productData -> fetch_assoc()){
        // GET IMG
        $productDataJson[$index]=$product['FIRST_PICTURE'] = base64_encode($product['FIRST_PICTURE']);
        $productDataJson[$index]=$product;

        
        $index++;
    }

     // Create an associative array with multiple values
     $response = array(
        'customerData'=>$customerDataJson,
        'productData'=> $productDataJson
    );
    echo json_encode($response);
}

getChekoutData();
?>