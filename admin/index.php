<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ
require_once '../commons/helper.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_file(PATH_CONTROLLER_ADMIN);

// Require toàn bộ file Models
require_file(PATH_MODEL_ADMIN);



// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'                                     => (new DashboardController())->index(),
    // 'quan-ly-danh-muc-san-pham'                    => (new DanhMucSanPhamController()) -> danhMucSP(),
    // 'quan-ly-nguoi-dung'                            => (new QuanLyNguoiDungController()) -> quanLyNguoiDung(),
    // 'quan-ly-san-pham'                            => (new QuanLySanPhanController()) -> quanLySanPham(),
    // 'quan-ly-banner'                            => (new QuanLyBannerController()) -> quanLyBanner(),
    // 'quan-ly-binh-luan'                            => (new QuanLyBinhLuanController()) -> quanLyBinhLuan(),
    // 'quan-ly-bo-suu-tap'                            => (new QuanLyBoSuuTapController()) -> quanLyBoSuuTap(),
    // 'quan-ly-danh-gia-trang-thai-don-hang'      => (new QuanLyDanhGiaTrangThaiDonHangController()) -> quanLyDanhGiaTrangThaiDonHang(),
    // 'quan-ly-don-hang'                            => (new QuanLyDonHangController()) -> quanLyDonHang(),
    // 'quan-ly-lien-he'                            => (new QuanLyLienHeController()) -> quanLyLienHe(),
    // 'quan-ly-tin-tuc'                            => (new QuanLyTinTucController()) -> quanLyTinTuc(),

    // -------------khuyến mãi ------------------
    'quan-ly-khuyen-mai'                            => (new QuanLyKhuyenMaiController()) -> danhSachKhuyenMai(),
    'form-them-khuyen-mai'                            => (new QuanLyKhuyenMaiController()) -> formAddKhuyenMai(),
    'them-khuyen-mai'                            => (new QuanLyKhuyenMaiController()) -> postAddKhuyenMai(),
    'form-sua-khuyen-mai'                            => (new QuanLyKhuyenMaiController()) -> formEditKhuyenMai(),
    'sua-khuyen-mai'                            => (new QuanLyKhuyenMaiController()) -> postEditKhuyenMai(),
    'xoa-khuyen-mai'                            => (new QuanLyKhuyenMaiController()) -> deleteKhuyenMai(),
    // ------------- end khuyến mãi ------------------

    // ------------- đơn hàng --------------------
    'quan-ly-don-hang'                            => (new QuanLyDonHangController()) -> danhSachDonHang(),
    'form-sua-don-hang'                            => (new QuanLyDonHangController()) -> formEditDonHang(),
    'sua-don-hang'                            => (new QuanLyDonHangController()) -> postEditDonHang(),
    'chi-tiet-don-hang'                            => (new QuanLyDonHangController()) -> detailDonHang(),
    // ------------- end đơn hàng --------------------
     // -------------danh mục sản phẩm ------------------
     'quan-ly-danh-muc-san-pham'                    => (new QuanLyDanhMucSanPhamController()) -> danhsachDanhMucSanPham(),
     'form-them-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController()) -> formAddDanhMucSanPham(),
     'them-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController()) -> postAddDanhMucSanPham(),
     'form-sua-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController()) -> formEditDanhMucSanPham (),
     'sua-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController()) -> postEditDanhMucSanPham(),
     'xoa-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController()) -> deleteDanhMucSanPham(),
     // ------------- end danh mục sản phẩm ------------------
 
     // -------------Bộ sưu tập ------------------
     'quan-ly-bo-suu-tap'                            => (new QuanLyBoSuuTapController()) -> danhsachBoSuuTap(),
     'form-them-bo-suu-tap'                            => (new QuanLyBoSuuTapController()) -> formAddBoSuuTap(),
     'them-bo-suu-tap'                            => (new QuanLyBoSuuTapController()) -> postAddBoSuuTap(),
     'form-sua-bo-suu-tap'                            => (new QuanLyBoSuuTapController()) -> formEditBoSuuTap(),
     'sua-bo-suu-tap'                            => (new QuanLyBoSuuTapController()) -> postEditBoSuuTap(),
     'xoa-bo-suu-tap'                            => (new QuanLyBoSuuTapController()) -> deleteBoSuuTap(),
     // ------------- end Bộ sưu tập ------------------

     // -------------Quản lý tài khoản ------------------
       // QUản lý tài khoản quản trị viên
       'quan-ly-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> danhSachTaiKhoanQuanTri(),
       'form-them-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> formAddTaiKhoanQuanTri(),
       'them-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> postAddTaiKhoanQuanTri(),
       'form-sua-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> formEditTaiKhoanQuanTri(),
       'sua-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> postEditTaiKhoanQuanTri(),
       'xoa-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> deleteTaiKhoanQuanTri(),

       'reset-password'                            => (new QuanLyTaiKhoanController()) -> resetPassword(),
      // Quản lý tài khoản khách hàng
       'quan-ly-tai-khoan-khach-hang'                            => (new QuanLyTaiKhoanController()) -> danhSachTaiKhoanKhachHang(),
       'form-sua-tai-khoan-khach-hang'                            => (new QuanLyTaiKhoanController()) -> formEditTaiKhoanKhachHang(),
       'sua-tai-khoan-quan-khach-hang'                            => (new QuanLyTaiKhoanController()) -> postEditTaiKhoanKhachHang(),
      //  'chi-tiet-tai-khoan-khach-hang'                            => (new QuanLyTaiKhoanController()) -> viewsTaiKhoanKhachHang(),
                                   
       // Quản lý liên hệ
      
       
     // ------------- end Quản lý tài khoản ------------------

     // -------------san pham ------------------
    'quan-ly-san-pham'                            => (new AdminSanPhamController()) -> danhSachSanPham(),
    'form-them-san-pham'                            => (new AdminSanPhamController()) -> AddSanPham(),
    'them-san-pham'                            => (new AdminSanPhamController()) -> postAddSanPham(),
    'sua-san-pham'                            => (new AdminSanPhamController()) -> postEditSanPham(),
    'form-sua-san-pham'                            => (new AdminSanPhamController()) -> formEditSanPham(),
    'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham($_GET['id'] ?? null),
    'chi-tiet-san-pham'                            => (new AdminSanPhamController()) -> detailSanPham(),

    // ------------- end san pham ------------------
};