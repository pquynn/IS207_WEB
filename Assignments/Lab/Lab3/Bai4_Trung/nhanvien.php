<?php
    class nhanvien
    {
        protected $maNV;
        protected $tenNV;
        protected $soNgay;
        protected $luongNgay;

        public function Gan($ma, $ten, $songay, $luongngay)
        {
            $this->maNV = $ma;
            $this->tenNV = $ten;
            $this->soNgay = $songay;
            $this->luongNgay = $luongngay;
        }

        public function TinhLuong()
        {
            return $this->soNgay * $this->luongNgay;
        }

        public function InNhanVien()
        {
            echo "Mã nhân viên: {$this->maNV}<br>
                Tên nhân viên: {$this->tenNV}<br>
                Số ngày làm trong tháng: {$this->soNgay}<br>
                Lương ngày: {$this->luongNgay}";
        }
    }

    class nhanvienQL extends nhanvien
    {
        private $PhuCap = 2000;

        public function TinhLuong()
        {
            return $this->soNgay * $this->luongNgay + $this->PhuCap;
        }

        public function InNhanVien()
        {
            echo "Mã nhân viên: {$this->maNV}<br>
                Tên nhân viên: {$this->tenNV}<br>
                Số ngày làm trong tháng: {$this->soNgay}<br>
                Lương ngày: {$this->luongNgay}<br>
                Phụ câp: {$this->PhuCap}";
        }
    }
?>