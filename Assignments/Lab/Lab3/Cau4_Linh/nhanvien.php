<?php
class nhanvien {
    private $maNV;
    private $tenNV;
    private $soNgayLV;
    private $luongNgay;

    public function Gan($ma, $ten, $songay, $luongngay) {
        $this->maNV = $ma;
        $this->tenNV = $ten;
        $this->soNgayLV = $songay;
        $this->luongNgay = $luongngay;
    }

    public function Tinhluong() {
        return $this->luongNgay * $this->soNgayLV;
    }

    public function InNhanVien() {
        echo "Mã nhân viên: " . $this->maNV."<br>";
        echo "Tên nhân viên: " .$this->tenNV."<br>";
        echo "Số ngày làm việc: ".$this->soNgayLV."<br>";
        echo "Lương ngày: ".$this->luongNgay."<br>";
        
    }
}

class nhanvienQL extends nhanvien {
    private $phuCap = 2000;
    public function TinhLuong() {
        return parent::TinhLuong() + $this->phuCap;
    }

    public function InNhanVien() {
        parent::InNhanVien();
        echo "Phụ Cấp: ".$this->phuCap."<br>";
    }
}
?>