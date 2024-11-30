<?php

class DashboardController {
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modleBinhLuan;
     public function __construct()
    {
        $this->modelTaiKhoan = new adminTaiKhoan();
        $this->modleBinhLuan = new adminBinhLuan();
        $this->modelDonHang = new adminDonHang();
    }
    public function index() {

        $listDonHang = $this->modelDonHang->getAllDetailDonHang();
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();

        $listDetailDonHang = $this->modelDonHang->getAllDetailDonHangSanPhamBanChay();
        $listTaiKhoanKhachHang = $this->modelTaiKhoan->getTaiKhoanKhachHang(2);
        // var_dump($listTaiKhoanKhachHang);die();


    
        require_once "./views/dashboard.php";

    }
}