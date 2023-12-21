<?php
include('../cart/connect.php');

function buy(){
    global $conn;

    // GET INPUT: START
    $user_id=$_GET['user_id'];

    $name=$_GET['name'];
    $phone=$_GET['phone'];
    $gender=$_GET['gender'];

    $city=$_GET['tinhThanh'];
    $district=$_GET['quanHuyen'];
    $ward=$_GET['xaPhuong'];
    $street=$_GET['duongAp'];
    // echo $user_id;
    // echo $name;
    // echo $phone;
    // echo $gender;
    // echo $city;
    // GET INPUT: END 
    // $city="";
    // $district="";
    // $ward="";
    // $street="";

    // $name=$_GET['name'];
    // $phone=$_GET['phone'];
    // $city=$_GET['city'];
    // $district=$_GET['district'];
    // $ward=$_GET['ward'];
    // $street=$_GET['street'];
    // GET INPUT: END

    // GET ADDRESS, AVOID SQP INJECTION: START
    $address=$street.", ".$district.", ".$ward.", ".$city;
    $fixedAddress = $conn -> real_escape_string($address);
    $fixedName=$conn -> real_escape_string($name);
    $fixedPhone=$conn -> real_escape_string($phone);

    $sqlUpdateOrderLogin="UPDATE ORDERS SET ADDRESS='$fixedAddress', STATUS='Đang chuẩn bị hàng', NAME='$fixedName', TELEPHONE='$fixedPhone' WHERE USER_ID='$user_id' AND STATUS='Đang mua hàng'";
    // echo $sqlUpdateOrderLogin;

    // TOTAL_PRODUCT, TOTAL_PRICE, PAY
    $sqlUpdateOrderLocal="INSERT INTO orders (ADDRESS, NAME, TELEPHONE, STATUS ) VALUES ('$fixedAddress', '$fixedName', '$fixedPhone', 'Đang chuẩn bị hàng')";
    echo $sqlUpdateOrderLocal;

    // $orderId=1;
    // GET ADDRESS, AVOID SQP INJECTION: END

    // UPDATE TO DATA BASE: START
    if($user_id!==null){
        // $buySql=$conn->prepare($sqlUpdateOrderLogin);
        // $buySql->bind_param("sssi", $fixedAddress, $fixedName, $fixedPhone, $user_id);
        $buySqlLocal=$conn->query($sqlUpdateOrderLogin);
    }else{
        $buySqlLocal=$conn->query($sqlUpdateOrderLocal);
    }
    
    // if($buySql->execute()){
    //     echo "Buy Succesfully";
    // }
    // UPDATE TO DATA BASE: end

    // go to success announcement page
    // header("Location:./buySuccess.php");
}

buy();
?>