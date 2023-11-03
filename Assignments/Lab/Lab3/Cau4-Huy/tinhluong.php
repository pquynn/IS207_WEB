<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lab3.css">
    <title>Document</title>
</head>

<body>
    <div class="main">
        <form method="GET" acction="#">
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
                    <td><input type="input" name="songayLV"></td>
                </tr>
                <tr>
                    <td>Lương ngày</td>
                    <td><input type="input" name="luongngayLV"></td>
                </tr>
                <tr>
                    <td>Nhân viên quản lý</td>
                    <td><input type="checkbox" name="check-QL"></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="Submit" value="Lương tháng" name="calc-luong"></td>
                </tr>
            </table>
    </div>
    <br>
    <div class="result">
        <?php
        include "nhanvien.php";
        if (isset($_GET['calc-luong']) && $_GET['calc-luong'] == "Lương tháng") {
            $ma = $_GET['maNV'];
            $ten = $_GET['tenNV'];
            $songay = $_GET['songayLV'];
            $luongngay = $_GET['luongngayLV'];
            if (isset($_GET['check-ql'])) {
                $nv = new nhanvienQL();
                $nv->Gan($ma, $ten, $songay, $luongngay);
            } else {
                $nv = new nhanvien();
                $nv->Gan($ma, $ten, $songay, $luongngay);
            }
            $nv->InNhanVien();
            echo "Lương tháng: " . $nv->TinhLuong();
        }
        ?>
    </div>
</body>

</html>
