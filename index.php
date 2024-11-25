<?php 
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';

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
    'lien-he'=>(new HomeController())->lienHe(),
    'tin-tuc'=>(new HomeController())->tinTuc(),
    // 'gio-hang'=>(new HomeController())->gioHang(),
    'thanh-toan'=>(new HomeController())->thanhToan(),
    'dang-nhap'=>(new HomeController())->dangNhap(),
    'dang-ky'=>(new HomeController())->dangKy(),
    'chi-tiet-san-pham'=>(new HomeController())->chiTietSanPham(),
    'chi-tiet-tin-tuc'=>(new HomeController())->chiTietTinTuc(),

    // // ----- login  -----
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    'logout' => (new HomeController())->logout(),
    // // ------ end  -----


};