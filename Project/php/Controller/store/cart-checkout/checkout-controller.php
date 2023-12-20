<?php
include('../../connect.php');
global $conn;

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
        echo 'Curl error: ' . curl_error($ch);
    }
    //close connection
    curl_close($ch);
    return $result;
}

//Kiểm tra phương thức thanh toán
if (isset($_POST['submit'])) {
    // GET INPUT: START
    $name="";
    $phone="";
    $city="";
    $district="";
    $ward="";
    $street="";

    $order_id = 3;//THAY BẰNG SESSION HAY J ĐÓ
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $district=$_POST['district'];
    $ward=$_POST['ward'];
    $street=$_POST['street'];
    // GET INPUT: END

    // GET ADDRESS, AVOID SQP INJECTION: START
    $address=$street.", ".$district.", ".$ward.", ".$city;
    $fixedAddress = $conn -> real_escape_string($address);
    $fixedName=$conn -> real_escape_string($name);
    $fixedPhone=$conn -> real_escape_string($phone);

    if (isset($_POST['payment'])) {
        $selectedPayment = $_POST['payment'];

        if ($selectedPayment === 'cod') {
        
            // $sqlUpdateOrder='UPDATE ORDERS SET ADDRESS="'.$fixedAddress.'", STATUS="Đang chuẩn bị hàng" WHERE ORDER_ID='.$orderId;
            $sqlUpdateOrder='UPDATE ORDERS SET ADDRESS=?, STATUS="Đang chuẩn bị hàng", NAME=?, TELEPHONE=? WHERE ORDER_ID=?';
           

            // UPDATE TO DATA BASE: START
            $buySql=$conn->prepare($sqlUpdateOrder);
            $buySql->bind_param("sssi", $fixedAddress, $fixedName, $fixedPhone, $order_id);
            if($buySql->execute()){
                echo "Buy Succesfully";
            }
            // $updateOrder=$conn -> query($sqlUpdateOrder);
            // UPDATE TO DATA BASE: START

            // go to success announcement page
            header("Location:./buySuccess.php");

        } 
        //Thanh toán bằng ATM MOMO
        elseif ($selectedPayment === 'payUrl') {
            //Cập nhật thông tin đơn hàng
            $sqlUpdateOrder='UPDATE ORDERS SET ADDRESS=?, NAME=?, TELEPHONE=? WHERE ORDER_ID=?';
           
            $buySql=$conn->prepare($sqlUpdateOrder);
            $buySql->bind_param("sssi", $fixedAddress, $fixedName, $fixedPhone, $order_id);
            if($buySql->execute()){
              
                //Lấy số tiền cần thanh toán 
                $sql = "SELECT total_price FROM orders WHERE order_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $order_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $total = $row['total_price'];

                    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                    $partnerCode = 'MOMOBKUN20180529';
                    $accessKey = 'klm05TvNBzhg7h7j';
                    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                    $orderInfo = "Thanh toán qua MoMo";
                    $amount = $total;
                    $orderId = time() ."";
                    $redirectUrl = "http://localhost/IS207_WEB/IS207_WEB/Project/php/store/checkout/buySuccess.php?id=" . $order_id;
                    $ipnUrl = "http://localhost/IS207_WEB/IS207_WEB/Project/php/store/checkout/buySuccess.php?id=" . $order_id;
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
                    // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                    //before sign HMAC SHA256 signature
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
        //Thanh toán bằng VÍ MOMO - QUÉT MÃ QR
        elseif ($selectedPayment === 'momo-wallet') {
            //Cập nhật thông tin đơn hàng
            $sqlUpdateOrder='UPDATE ORDERS SET ADDRESS=?, NAME=?, TELEPHONE=? WHERE ORDER_ID=?';
           
            $buySql=$conn->prepare($sqlUpdateOrder);
            $buySql->bind_param("sssi", $fixedAddress, $fixedName, $fixedPhone, $order_id);
            if($buySql->execute()){
              
                //Lấy số tiền cần thanh toán 
                $sql = "SELECT total_price FROM orders WHERE order_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $order_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $total = $row['total_price'];

                    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                    $partnerCode = 'MOMOBKUN20180529';
                    $accessKey = 'klm05TvNBzhg7h7j';
                    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                    $orderInfo = "Thanh toán qua MoMo";
                    $amount = $total;
                    $orderId = time() ."";
                    $redirectUrl = "http://localhost/IS207_WEB/IS207_WEB/Project/php/store/checkout/buySuccess.php?id=" . $order_id;
                    $ipnUrl = "http://localhost/IS207_WEB/IS207_WEB/Project/php/store/checkout/buySuccess.php?id=" . $order_id;
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
                    $requestType = "captureWallet";
                    // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                    //before sign HMAC SHA256 signature
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

    } else {
        echo 'Unexpected payment method';
    }
} 

$conn->close();
?>
