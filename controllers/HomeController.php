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
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        require_once './views/Home.php';
    }
    public function sanPham()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        require_once './views/SanPham.php';
    }
    public function boSuuTap()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        require_once './views/BoSuuTap.php';
    }
    public function gioiThieu()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
       
        require_once './views/GioiThieu.php';
    }
    public function lienHe()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
       
        require_once './views/LienHe.php';
    }
    public function tinTuc()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
       
        require_once './views/TinTuc.php';
    }
    public function gioHang()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/GioHang.php';
    }
    public function thanhToan()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/ThanhToan.php';
    }
    public function dangNhap()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        require_once './views/DangNhap.php';
    }
    public function dangKy()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        require_once './views/DangKy.php';
    }
    public function chiTietSanPham()
    {
        $id = $_GET['id'];
        $listSanPham = $this->modelSanPham->getAllProduct();
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $detailSanPham = $this->modelSanPham->getDetailSanPham($id);
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        require_once './views/ChiTietSanPham.php';
    }
    public function chiTietTinTuc()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/ChiTietTinTuc.php';
    }
}