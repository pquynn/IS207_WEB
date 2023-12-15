<?php
    $conn=new mysqli('localhost', 'root', '', 'shoe_shop_db');
    mysqli_set_charset($conn, 'UTF8');
    // check connection
    if(!$conn){
    die("Kết nối thất bại: ". mysqli_connect_error());
    }
    else{
    // echo "Kết nối thành công";
    }
?>