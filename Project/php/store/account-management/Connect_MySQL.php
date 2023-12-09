<?php
        $SERVER = "localhost";
        $USERNAME = "root";
        $PASSWORD = "";
        $DBNAME = "shoe_shop_db";
        $conn = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DBNAME);

        if(!$conn) {
            die("Connection failed");
        }
?>