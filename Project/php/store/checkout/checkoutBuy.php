<?php
include('../cart/connect.php');

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    // Check for cURL errors
    if (curl_errno($ch)) {
        // echo 'Curl error: ' . curl_error($ch);
    }
    //close connection
    curl_close($ch);
    return $result;
}

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
    $paymentMethod=$_POST['paymentMethod'];

    $localCart=json_decode(json_encode($_POST['localCart']), true);

    // GET ADDRESS, AVOID SQP INJECTION: START
    $address=$street.", ".$district.", ".$ward.", ".$city;
    $fixedAddress = $conn -> real_escape_string($address);
    $fixedName=$conn -> real_escape_string($name);
    $fixedPhone=$conn -> real_escape_string($phone);

    // cap nhat len db TH nguoi dung dang nhap
    $sqlUpdateOrderLogin="UPDATE ORDERS SET ADDRESS='$fixedAddress', 
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
                        AND ORDER_DATE='$date'
                        AND TELEPHONE='$phone'
                        AND NAME='$name'
                        AND ADDRESS='$address'";
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
    // update to orders table: end

    // update localCart to orders_detail table: start
    

    
    // update to orders_detail table: end
    // UPDATE TO DATA BASE: end

    // go to success announcement page
    // header("Location:./buySuccess.php");

    //XỬ LÝ THANH TOÁN ONLINE
    if($paymentMethod != 'cod'){
        
        // $sql="SELECT ORDER_ID, TOTAL_PRICE FROM orders
        //                 WHERE ORDER_DATE='$date'
        //                 AND TELEPHONE='$phone'
        //                 AND NAME='$name'
        //                 AND ADDRESS='$address'";

        // $result = $conn->query($sql);
        // $row = $result->fetch_assoc();
        // $total = $row['TOTAL_PRICE'];
        // $id = $row['ORDER_ID'];

        $total = '10000';
        $id = 4;

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

        $orderInfo = "Thanh toán qua MoMo";
        $amount = $total;
        $orderId = time() ."";
        $redirectUrl = "../cart/cart.php?id=" . $id;
        $ipnUrl = "../cart/cart.php?id=" . $id;
        $extraData = "";

        $partnerCode = $partnerCode;
        $accessKey = $accessKey;
        $serectkey = $secretKey;
        $orderId = $orderId; // Mã đơn hàng
        $orderInfo = $orderInfo;
        $amount = $amount;
        $ipnUrl = $ipnUrl;
        $redirectUrl = $redirectUrl;
        $extraData = $extraData;

        $requestId = time() . "";
        $requestType = "payWithATM";
        // if($paymentMethod == 'momo-atm'){
        //     $requestType = "payWithATM";
        // }
        // elseif ($paymentMethod == 'momo-wallet'){
        //     $requestType = "captureWallet";
        // }

        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there

        header('Location: ' . $jsonResult['payUrl']);
    }
}
    
}

buy();
?>