<?php
    class nhanvien {
        private $manv;
        private $tennv;
        private $songaylv;
        private $luongngay;
        
        public function Gan($ma, $ten, $songay, $luongngay) {
            $this->manv = $ma;
            $this->tennv = $ten;
            $this->songaylv = $songay;
            $this->luongngay = $luongngay;
        }
        public function TinhLuong() {
            return $this->luongngay * $this->songaylv;
        }

        public function InNhanVien() {
            echo "Mã nhân viên: " . $this->manv."<br>";
            echo "Tên nhân viên: " .$this->tennv."<br>";
            echo "Số ngày làm việc: ".$this->songaylv."<br>";
            echo "Lương ngày: ".$this->luongngay."<br>";
            echo "Lương tháng: ".$this->TinhLuong()."<br>";
        }
    }

    class nhanvienQL extends nhanvien{
        private $phucap = 2000;

        public function TinhLuong(){
            return parent::TinhLuong() + $this->phucap;
        }

        public function InNhanvien() {
            parent::InNhanVien();
            echo "Phụ cấp: ". $this->phucap ."<br>";
        }
    }
?>