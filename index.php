<?php 
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/GioHang.php';
require_once './models/TaiKhoan.php';
require_once './models/DonHang.php';
require_once './models/LienHe.php';
require_once './models/Banner.php';

// Route
$act = $_GET['act'] ?? '/';

// if ($act !== 'login' && $act !== 'check-login' && $act !== 'logout' && $act !== '/') {
//     checkLoginAdmin();
//  }
 // Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
 

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'=>(new HomeController())->trangChu(),
    'san-pham'=>(new HomeController())->sanPham(),
    'bo-suu-tap'=>(new HomeController())->boSuuTap(),
    'gioi-thieu'=>(new HomeController())->gioiThieu(),
    'lien-he' =>(new HomeController())->lienHe(),
    'them-lien-he'=>(new HomeController())->postAddlienHe(),
    'tin-tuc'=>(new HomeController())->tinTuc(),
    'chi-tiet-san-pham'=>(new HomeController())->chiTietSanPham(),
    // 'mua-ngay'=>(new HomeController())->muaNgay(),
    'chi-tiet-tin-tuc'=>(new HomeController())->chiTietTinTuc(),
    'tim-kiem' => (new HomeController())->timKiem(),
    'gui-binh-luan' => (new HomeController())->guiBinhLuan(),
    'sua-khach-hang' => (new HomeController())->suaKhachHang(),
    
    // 'loc-san-pham' => (new HomeController())->locSanPham(),
    'chi-tiet-khach-hang'=>(new HomeController())->chiTietKhachHang(),
    'doi-mat-khau-khach-hang'=>(new HomeController())->doiMatKhauKhachHang(),
    'xoa-tai-khoan-khach-hang'=>(new HomeController())->xoaTaiKhoanKhachHang(),
    'thong-bao-tai-khoan-da-xoa'=>(new HomeController())->xoaTaiKhoanKhachHangThongBao(),
    

    // -------- giỏ hàng -------
    'gio-hang'=>(new HomeController())->gioHang(),
    'them-gio-hang'=>(new HomeController())->addGioHang(),
    // 'cap-nhat-so-luong'=>(new HomeController())->capNhatSoLuong(),
    'xoa-gio-hang'=>(new HomeController())->deleteGioHang(),
    // -------- end giỏ hàng -------

    // -------- thanh toán ---------
    'thanh-toan'=>(new HomeController())->thanhToan(),
    // 'thanh-toan-mua-ngay'=>(new HomeController())->thanhToanMuaNgay(),
    'xu-ly-thanh-toan'=>(new HomeController())->postThanhToan(),
    'lich-su-mua-hang'=>(new HomeController())->lichSuMuaHang(),
    'chi-tiet-mua-hang'=>(new HomeController())->chiTietMuaHang(),
    'huy-don-hang'=>(new HomeController())->huyDonHang(),



    // // ----- login  -----
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    'logout' => (new HomeController())->logout(),
    // // ------ end login & logout -----

    'dang-ky' => (new HomeController())->dangKy(),
    'check-dang-ky' => (new HomeController())->postDangKy(),


};