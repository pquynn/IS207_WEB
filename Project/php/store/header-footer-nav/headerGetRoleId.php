<?php
include('../../Controller/connect.php');
function getRoleId(){
    global $conn;
    $user_id=$_GET['user_id'];

    // id loai nguoi dung
    $sqlGetRoleId="SELECT ROLE_ID 
                    FROM users, login
                    WHERE users.USER_ID = '$user_id'
                    AND users.USER_LOGIN=login.USER_LOGIN";
    
    $roleId=$conn->query($sqlGetRoleId);
    // $roleId=array(
    //     "role_id" => "123",
    //     "user_id" => "456"
    // );
    echo json_encode($roleId->fetch_assoc());
}
getRoleId()
?>