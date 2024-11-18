<?php

class HomeController
{
    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }
    public function trangChu()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/Home.php';
    }
    public function sanPham()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/SanPham.php';
    }
    public function boSuuTap()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/BoSuuTap.php';
    }
    public function gioiThieu()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/GioiThieu.php';
    }
    public function lienHe()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/LienHe.php';
    }
    public function tinTuc()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/TinTuc.php';
    }
    public function gioHang()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/GioHang.php';
    }
    public function thanhToan()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/ThanhToan.php';
    }
    public function dangNhap()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/DangNhap.php';
    }
    public function dangKy()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/DangKy.php';
    }
    public function chiTietSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/ChiTietSanPham.php';
    }
}