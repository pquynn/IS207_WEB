<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính lương</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="#" method="GET">
        <table>
            <tr>
                <td>Mã nhân viên</td>
                <td><input type="input" name="manv"></td>
            </tr>
            <tr>
                <td>Tên nhân viên</td>
                <td><input type="input" name="tennv"></td>
            </tr>
            <tr>
                <td>Số ngày làm việc</td>
                <td><input type="input" name="songay"></td>
            </tr>
            <tr>
                <td>Lương ngày</td>
                <td><input type="input" name="luongngay"></td>
            </tr>
            <tr>
                <td>Nhân viên quản lý</td>
                <td><input type="checkbox" name="checkNVQL"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="Submit" value="Lương tháng" name="Submit"></td>
            </tr>
        </table>
    </form> 
</body>
</html>

<?php
        include("nhanvien.php");

        if(isset($_GET["Submit"]) && $_GET["Submit"] == "Lương tháng") {
            $manv = $_GET["manv"];
            $ten = $_GET["tennv"];
            $songaylv = $_GET["songay"];
            $luongngay = $_GET["luongngay"];

            if(isset($_GET["checkNVQL"])) 
                $nv = new nhanvienQL();
            else 
                $nv = new nhanvien();
               
            $nv->Gan($manv, $ten, $songaylv, $luongngay);
            $nv->TinhLuong();
        
            echo "<table>";
            echo "<tr>";
            echo    "<td>";
            echo $nv->InNhanVien();
            echo    "</td>";
            echo "</tr>";
        }
    ?>  