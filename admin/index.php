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
};