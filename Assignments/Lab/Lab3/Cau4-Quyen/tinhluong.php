<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tính lương</title>
</head>
<body>
    <form action="#" method="GET">
        <table>
            <tr>
                <td>Mã nhân viên</td>
                <td>
                    <input type="text" name="ma">
                </td>
            </tr>
            <tr>
                <td>Tên nhân viên</td>
                <td>
                    <input type="text" name="ten">
                </td>
            </tr>
            <tr>
                <td>Số ngày làm việc</td>
                <td>
                    <input type="text" name="songay">
                </td>
            </tr>
            <tr>
                <td>Lương ngày</td>
                <td>
                    <input type="text" name="luongngay">
                </td>
            </tr>
            <tr>
                <td>Nhân viên quản lý</td>
                <td>
                    <input type="checkbox" name="nvql">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Lương tháng" name="Submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    if(isset($_GET['Submit'])&&($_GET['Submit']=="Lương tháng"))
    {
        $ma= $_GET['ma'];
        $ten= $_GET['ten'];
        $songay= (int)$_GET['songay'];
        $luongngay= (int)$_GET['luongngay'];

        include "nhanvien.php";

        if(isset($_GET['nvql']))
            $nv = new nhanvienQL();
        else
            $nv = new nhanvien();
        
        $nv->Gan($ma, $ten, $songay, $luongngay);
        $luongthang = $nv->TinhLuong();
        $nv->InNhanVien();
        echo "Lương tháng: ".$luongthang;
    }
?>