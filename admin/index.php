<?php 
require_once './controllers/DashboardController.php';
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
    // -------------danh mục sản phẩm ------------------
    // 'quan-ly-danh-muc-san-pham'                    => (new QuanLyDanhMucSanPhamController()) -> danhsachDanhMucSanPham(),
    // 'form-them-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController()) -> formAddDanhMucSanPham(),
    // 'them-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController()) -> postAddDanhMucSanPham(),
    // 'form-sua-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController()) -> formEditDanhMucSanPham (),
    // 'sua-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController()) -> postEditDanhMucSanPham(),
    // 'xoa-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController()) -> deleteDanhMucSanPham(),


    // ------------- end danh mục sản phẩm ------------------
    // 'quan-ly-danh-muc-san-pham'                    => (new AdminDanhMucSanPhamController()) -> danhSachDanhMuc(),
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




    // -------------san pham ------------------
    'quan-ly-san-pham'                            => (new AdminSanPhamController()) -> danhSachSanPham(),
    'form-them-san-pham'                            => (new AdminSanPhamController()) -> AddSanPham(),
    'them-san-pham'                            => (new AdminSanPhamController()) -> postAddSanPham(),
    'form-sua-san-pham'                            => (new AdminSanPhamController()) -> formEditSanPham(),
    'sua-san-pham'                            => (new AdminSanPhamController()) -> postEditSanPham(),
    'xoa-san-pham'                            => (new AdminSanPhamController()) -> deleteSanPham(),

    // ------------- end san pham ------------------

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

     // -------------Trạng thái đơn hàng ------------------
     'quan-ly-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController()) -> danhsachTrangThaiDonHang(),
     'form-them-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController()) -> formAddTrangThaiDonHang(),
     'them-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController()) -> postAddTrangThaiDonHang(),
     'form-sua-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController()) -> formEditTrangThaiDonHang(),
     'sua-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController()) -> postEditTrangThaiDonHang(),
     'xoa-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController()) -> deleteTrangThaiDonHang(),
     // ------------- end Trạng thái đơn hàng ------------------


     // -------------Quản lý tài khoản ------------------
       // QUản lý tài khoản quản trị viên
       'quan-ly-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> danhSachTaiKhoanQuanTri(),
       'form-them-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> formAddTaiKhoanQuanTri(),
       'them-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> postAddTaiKhoanQuanTri(),
    //    'form-sua-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> formEditTaiKhoanQuanTri(),
    //    'sua-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> postEditTaiKhoanQuanTri(),
    //    'xoa-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController()) -> deleteTaiKhoanQuanTri(),

    // -------------Bình Luận ------------------
    'quan-ly-binh-luan'                            => (new QuanLyBinhLuanController()) -> danhSachBinhLuan(),
    // ------------- end bình luận ------------------

    
    // -------------Tin tức------------------
    'quan-ly-tin-tuc'                            => (new QuanLyTinTucController()) -> danhSachTinTuc(),
    'form-them-tin-tuc'                            => (new QuanLyTinTucController()) -> formAddTinTuc(),
    'them-tin-tuc'                            => (new QuanLyTinTucController()) -> postAddTinTuc(),
    'form-sua-tin-tuc'                            => (new QuanLyTinTucController()) -> formEditTinTuc(),
    'sua-tin-tuc'                            => (new QuanLyTinTucController()) -> postEditTinTuc(),
    'xoa-tin-tuc'                            => (new QuanLyTinTucController()) -> deleteTinTuc(),
    // ------------- end tin tức ------------------


    // -------------Banner------------------
    'quan-ly-banner'                            => (new QuanLyBannerController()) -> danhSachBanner(),
    'form-them-banner'                            => (new QuanLyBannerController()) -> formAddBanner(),
    'them-banner'                            => (new QuanLyBannerController()) -> postAddBanner(),
    'form-sua-banner'                            => (new QuanLyBannerController()) -> formEditBanner(),
    'sua-banner'                            => (new QuanLyBannerController()) -> postEditBanner(),
    'xoa-banner'                            => (new QuanLyBannerController()) -> deleteBanner(),
    // ------------- end banner ------------------

};




