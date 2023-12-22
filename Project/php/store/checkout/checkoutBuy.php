<?php  
include('../cart/connect.php');
// function execPostRequest($url, $data)
// {
//     $ch = curl_init($url);
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//             'Content-Type: application/json',
//             'Content-Length: ' . strlen($data))
//     );
//     curl_setopt($ch, CURLOPT_TIMEOUT, 5);
//     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
//     //execute post
//     $result = curl_exec($ch);
//     // Check for cURL errors
//     if (curl_errno($ch)) {
//         // echo 'Curl error: ' . curl_error($ch);
//     }
//     //close connection
//     curl_close($ch);
//     return $result;
// }

function buy(){
    global $conn;
    if(isset($_POST['user_id'])){

    
    // GET INPUT: START
    $user_id=$_POST['user_id'];

    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];

    $city=$_POST['tinhThanh'];
    $district=$_POST['quanHuyen'];
    $ward=$_POST['xaPhuong'];
    $street=$_POST['duongAp'];

    $date=$_POST['date'];
    // $date = date('Y-m-d H:i:s');
    
    $paymentMethod=$_POST['paymentMethod'];

    if(isset($_POST['localCart'])){
        $localCart=json_decode(json_encode($_POST['localCart']), true);
    }
    
    // GET ADDRESS, AVOID SQP INJECTION: START
    $address=$street.", ".$district.", ".$ward.", ".$city;
    $fixedAddress = $conn -> real_escape_string($address);
    $fixedName=$conn -> real_escape_string($name);
    $fixedPhone=$conn -> real_escape_string($phone);


    // cap nhat len db TH nguoi dung dang nhap
    $sqlUpdateOrderLogin="UPDATE ORDERS SET ADDRESS='$fixedAddress', 
    ORDER_DATE = '$date',
    STATUS='Đang chuẩn bị hàng', 
    NAME='$fixedName', 
    TELEPHONE='$fixedPhone',
    PAY='$paymentMethod' 
    WHERE USER_ID='$user_id' 
        AND STATUS='Đang mua hàng'";


    // TOTAL_PRODUCT, TOTAL_PRICE, PAY
    $sqlUpdateOrderLocal="INSERT INTO ORDERS (ADDRESS, NAME, TELEPHONE, STATUS , ORDER_DATE, PAY) VALUES ('$fixedAddress', '$fixedName', '$fixedPhone', 'Đang chuẩn bị hàng', '$date', '$paymentMethod')";

    // $orderId=1;
    // GET ADDRESS, AVOID SQP INJECTION: END

    // UPDATE TO DATA BASE: START
    // IF USER LOGIN
    if($user_id!==''){
        // $buySql=$conn->prepare($sqlUpdateOrderLogin);
        // $buySql->bind_param("sssi", $fixedAddress, $fixedName, $fixedPhone, $user_id);
        $buySqlLocal=$conn->query($sqlUpdateOrderLogin);
    }else{
        // IF USER NOT LOGIN
        // update to order table
        $buySqlLocal=$conn->query($sqlUpdateOrderLocal);

        // update to order_detail
        $sqlOrderId_Local="SELECT DISTINCT ORDER_ID FROM orders
                        WHERE USER_ID IS NULL
                        AND TELEPHONE='$phone'
                        AND NAME='$name'
                        AND ADDRESS='$address'
                        AND STATUS = 'Đang chuẩn bị hàng'
                        AND ORDER_DATE='$date'
                        LIMIT 1";
                        // echo $sqlOrderId_Local;

        $OrderId_NotFecth=$conn->query($sqlOrderId_Local);
        $localOrderId = intval(implode($OrderId_NotFecth->fetch_assoc()));
        // echo implode($localOrderId);

        // $localCart_array=array_values($localCart);
        foreach($localCart as $row){
            $product_name=$row["PRODUCT_NAME"];
            $size=intval($row["SIZE"]);
            $quantity=intval($row["QUANTITY"]);

            $sqlUpdate_OrderDetail_Local="INSERT INTO order_detail (order_id, product_name, size, quantity) VALUES ($localOrderId, '$product_name', $size, $quantity)";
            // echo $sqlUpdate_OrderDetail_Local;

            $add=$conn->query($sqlUpdate_OrderDetail_Local);
        }
    }
}
    
}

buy();
?>