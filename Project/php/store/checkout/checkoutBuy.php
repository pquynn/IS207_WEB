<?php
include('../cart/connect.php');

function buy(){
    global $conn;

    // GET INPUT: START
    $name="";
    $phone="";
    $city="";
    $district="";
    $ward="";
    $street="";

    $name=$_GET['name'];
    $phone=$_GET['phone'];
    $city=$_GET['city'];
    $district=$_GET['district'];
    $ward=$_GET['ward'];
    $street=$_GET['street'];
    // GET INPUT: END

    // GET ADDRESS, AVOID SQP INJECTION: START
    $address=$street.", ".$district.", ".$ward.", ".$city;
    $fixedAddress = $conn -> real_escape_string($address);
    $fixedName=$conn -> real_escape_string($name);
    $fixedPhone=$conn -> real_escape_string($phone);

    $sqlUpdateOrder='UPDATE ORDERS SET ADDRESS=?, STATUS="Đang chuẩn bị hàng", NAME=?, TELEPHONE=? WHERE ORDER_ID=?';

    $orderId=1;
    // GET ADDRESS, AVOID SQP INJECTION: END

    // UPDATE TO DATA BASE: START
    $buySql=$conn->prepare($sqlUpdateOrder);
    $buySql->bind_param("sssi", $fixedAddress, $fixedName, $fixedPhone, $orderId);
    if($buySql->execute()){
        echo "Buy Succesfully";
    }
    // UPDATE TO DATA BASE: end

    // go to success announcement page
    header("Location:./buySuccess.php");
}

buy();
?>