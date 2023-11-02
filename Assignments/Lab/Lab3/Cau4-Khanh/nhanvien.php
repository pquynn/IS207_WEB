<!-- @format -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form methob="GET" action="#">
      <table>
        <tr>
          <td>
            <label for="maNhanVien">Mã nhân viên</label>
          </td>
          <td><input type="text" name="maNhanVien" id="maNhanVien" /><br /></td>
        </tr>

        <tr>
          <td>
            <label for="tenNhanVien">Tên nhân viên</label>
          </td>
          <td>
            <input type="text" name="tenNhanVien" id="tenNhanVien" /><br />
          </td>
        </tr>

        <tr>
          <td>
            <label for="soNgayLam">Số ngày làm</label>
          </td>
          <td><input type="number" name="soNgayLam" id="soNgayLam" /><br /></td>
        </tr>

        <tr>
          <td>
            <label for="luongNgay">Lương ngày</label>
          </td>
          <td><input type="number" name="luongNgay" id="luongNgay" /><br /></td>
        </tr>

        <tr>
          <td>
            <label for="laQuanLy">Nhân viên quản lý</label>
          </td>
          <td><input type="checkbox" name="laQuanLy" id="laQuanLy"/><br /></td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="tinhLuong" value="Tính lương" />
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>

<?php
class NhanVien{
  private $MaNV, $TenNV, $SoNgay, $LuongNgay;

  public function Gan($MaNV, $TenNV, $SoNgay, $LuongNgay){
    $this->MaNV = $MaNV;
    $this->TenNV = $TenNV;
    $this->SoNgay = $SoNgay;
    $this->LuongNgay = $LuongNgay;
  }

  public function InNhanVien(){
    echo "<table class=\"thong-tin\">
          <tr>
            <td>Mã nhân viên</td>
            <td>".$this->MaNV."</td>
          </tr>
          <tr>
            <td>Tên nhân viên</td>
            <td>".$this->TenNV."</td>
          </tr>
          <tr>
            <td>Số ngày làm</td>
            <td>".$this->SoNgay."</td>
          </tr>
          <tr>
            <td>Lương ngày</td>
            <td>".$this->SoNgay."</td>
          </tr>
          <tr>
            <td>Lương tháng</td>
            <td>".$this->TinhLuong()."</td>
          </tr>
          </table>";
  }

  public function TinhLuong(){
    return $this->SoNgay * $this->LuongNgay;
  }
}

class NhanVienQL extends NhanVien{
  private $PhuCap;

  public function Gan($MaNV, $TenNV, $SoNgay, $LuongNgay){
    parent::Gan($MaNV, $TenNV, $SoNgay, $LuongNgay);
    $this->PhuCap = 2000;
  }

  public function InNhanVien(){
    parent::InNhanVien();
    echo "<tr>
            <td>Phụ cấp</td>
            <td>".$this->PhuCap."</td>
          </tr>";
  }

  public function TinhLuong(){
    return parent::TinhLuong() + $this->PhuCap;
  }
}

// bam nut tinh luong
if(isset($_GET['tinhLuong']) && $_GET['tinhLuong']=='Tính lương'){
  $MaNV = $_GET['maNhanVien'];
  $TenNV = $_GET['tenNhanVien'];
  $SoNgay = $_GET['soNgayLam'];
  $LuongNgay = $_GET['luongNgay'];

  if(isset($_GET['laQuanLy'])){
    $nhanVien = new NhanVienQL();
  }else{
    $nhanVien = new NhanVien();
  }
  $nhanVien->Gan($MaNV, $TenNV, $SoNgay, $LuongNgay);
  $nhanVien->InNhanVien();
}
?>
