<?php
    class nhanvien{
        protected $maNV;
        protected $tenNV;
        protected $soNgay;
        protected $luongNgay;

        public function Gan($ma, $ten, $songay, $luongngay) {
            $this->maNV = $ma;
            $this->tenNV = $ten;
            $this->soNgay = $songay;
            $this->luongNgay = $luongngay;
        }
        
        public function InNhanVien(){
            echo "Mã nhân viên: ".$this->maNV."<br/>";
            echo "Tên nhân viên: ".$this->tenNV."<br/>";
            echo "Số ngày: ".$this->soNgay."<br/>";
            echo "Lương ngày: ".$this->luongNgay."<br/>";
        }

        public function TinhLuong(){
            return $this->soNgay * $this->luongNgay;
        }
    }

    class nhanvienQL extends nhanvien{
        private $phuCap = 2000;
        
        public function InNhanVien(){
            parent::InNhanVien();
            echo "Phụ cấp: ".$this->phuCap."<br/>";
        }

        public function TinhLuong(){
            return parent::TinhLuong() + $this->phuCap;
        }
    }
?>