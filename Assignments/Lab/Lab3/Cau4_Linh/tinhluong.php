<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form  action="#" method="GET">
        <table>
            <tr>
                <td>Mã nhân viên</td>
                <td><input type="input" name="maNV"></td>
            </tr>
            <tr>
                <td>Tên nhân viên</td>
                <td><input type="input" name="tenNV"></td>
            </tr>
            <tr>
                <td>Số ngày làm việc</td>
                <td><input type="input" name="soNgayLV"></td>
            </tr>
            <tr>
                <td>Lương ngày</td>
                <td><input type="input" name="luongNgay"></td>
            </tr>
            <tr>
                <td>Nhân viên quản lý</td>
                <td><input type="checkbox" name="nhanvienQL"></td>
            </tr>

            <tr>
                <td colspan="2"><input type="Submit" value="Lương tháng" name="luongThang"></td>
            </tr>
        </table>
    </form>   
    
    <?php
        include("nhanvien.php");

        if(isset($_GET["luongThang"]) && $_GET["luongThang"] == "Lương tháng") {
            $maNV = $_GET["maNV"];
            $tenNV = $_GET["tenNV"];
            $soNgayLV = $_GET["soNgayLV"];
            $luongNgay = $_GET["luongNgay"];

            if(isset($_GET["nhanvienQL"])) {
                $nhanVien = new nhanvienQL();
                $nhanVien->Gan($maNV, $tenNV, $soNgayLV, $luongNgay);
                $nhanVien->TinhLuong();
                $nhanVien->InNhanVien();
            }
            else {
                $nhanVien = new nhanvien();
                $nhanVien->Gan($maNV, $tenNV, $soNgayLV, $luongNgay);
                $nhanVien->TinhLuong();
                $nhanVien->InNhanVien();
            }
            

           
        }
    ?>




</body>
</html>