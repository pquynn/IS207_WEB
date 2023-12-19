<?php include 'nhanvien.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bài 4 BT Nhóm</title>
</head>

<body>
    <form action="#" method="GET">
        <table>
            <tr>
                <td>Mã nhân viên</td>
                <td><input type="input" name="MaNhanVien"></td>
            </tr>
            <tr>
                <td>Tên nhân viên</td>
                <td><input type="input" name="TenNhanVien"></td>
            </tr>
            <tr>
                <td>Số ngày làm việc</td>
                <td><input type="input" name="SoNgay"></td>
            </tr>
            <tr>
                <td>Lương ngày</td>
                <td><input type="input" name="LuongNgay"></td>
            </tr>
            <tr>
                <td>Nhân viên quản lý</td>
                <td><input type="checkbox" name="NhanVienQL"></td>
            </tr>
            <tr>
                <td colspan="2"><button name="Luong" value="Lương tháng">Lương tháng</button></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_GET['Luong']) && $_GET['Luong'] == "Lương tháng") {
        $ma = $_GET['MaNhanVien'];
        $ten = $_GET['TenNhanVien'];
        $songay = $_GET['SoNgay'];
        $luongngay = $_GET['LuongNgay'];

        if (isset($_GET['NhanVienQL'])) {
            $nhanVien = new nhanvienQL();
            $nhanVien->Gan($ma, $ten, $songay, $luongngay);
            echo "Lương: {$nhanVien->TinhLuong()}<br>";
            $nhanVien->InNhanVien();
        } else {
            $nhanVien = new nhanvien();
            $nhanVien->Gan($ma, $ten, $songay, $luongngay);
            echo "Lương: {$nhanVien->TinhLuong()}<br>";
            $nhanVien->InNhanVien();
        }
    }
    ?>
</body>

</html>