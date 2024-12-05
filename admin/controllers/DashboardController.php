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
        $listAllDonHang = $this->modelDonHang->getAllDonHang();
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
        $tongThuNhap = $this->modelDonHang->getTongThuNhap();

        // $don_hang_id = $this->modelDonHang->getAllDonHangID();
        // $ngayDatDonHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
        // var_dump($tongThuNhap);die();

        $listDetailDonHang = $this->modelDonHang->getAllDetailDonHangSanPhamBanChay();
        $listTaiKhoanKhachHang = $this->modelTaiKhoan->getTaiKhoanKhachHang(2);
        // var_dump($listDetailDonHang);die();

        $monthFilter = isset($_GET['monthFilter']) ? $_GET['monthFilter'] : 'this';


    
        require_once "./views/dashboard.php";

    }
}