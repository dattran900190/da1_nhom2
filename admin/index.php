<?php
// session_start();
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

if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout') {
  checkLoginAdmin();
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
  // Dashboards

  '/'                                     => (new DashboardController())->index(),
  
  // -------------khuyến mãi ------------------
  'quan-ly-khuyen-mai'                            => (new QuanLyKhuyenMaiController())->danhSachKhuyenMai(),
  'form-them-khuyen-mai'                            => (new QuanLyKhuyenMaiController())->formAddKhuyenMai(),
  'them-khuyen-mai'                            => (new QuanLyKhuyenMaiController())->postAddKhuyenMai(),
  'form-sua-khuyen-mai'                            => (new QuanLyKhuyenMaiController())->formEditKhuyenMai(),
  'sua-khuyen-mai'                            => (new QuanLyKhuyenMaiController())->postEditKhuyenMai(),
  'xoa-khuyen-mai'                            => (new QuanLyKhuyenMaiController())->deleteKhuyenMai(),
  // ------------- end khuyến mãi ------------------


  // -------------san pham ------------------
  'quan-ly-san-pham'                            => (new AdminSanPhamController())->danhSachSanPham(),
  'form-them-san-pham'                            => (new AdminSanPhamController())->formAddSanPham(),
  'them-san-pham'                            => (new AdminSanPhamController())->postAddSanPham(),
  // 'sua-san-pham'                            => (new AdminSanPhamController())->postEditSanPham(),
  'form-sua-san-pham'                            => (new AdminSanPhamController())->formEditSanPham(),
  'xoa-san-pham'                              => (new AdminSanPhamController())->deleteSanPham($_GET['id'] ?? null),
  'chi-tiet-san-pham'                            => (new AdminSanPhamController())->detailSanPham(),
  // 'sua-album-san-pham'                        => (new adminSanPhamController())->postEditAnhSanPham(),
  'sua-san-pham-va-album' => (new AdminSanPhamController())->postEditSanPhamAndAlbum(),

  // ------------- end san pham ------------------

  // liên hệ
  'quan-ly-lien-he'                            => (new QuanLyLienHeController())->danhSachLienHe(),
  'xoa-lien-he'                            => (new QuanLyLienHeController())->deleteLienHe(),


  // ------------- đơn hàng --------------------
  'quan-ly-don-hang'                            => (new QuanLyDonHangController())->danhSachDonHang(),
  'form-sua-don-hang'                            => (new QuanLyDonHangController())->formEditDonHang(),
  'sua-don-hang'                            => (new QuanLyDonHangController())->postEditDonHang(),
  'chi-tiet-don-hang'                            => (new QuanLyDonHangController())->detailDonHang(),
  // ------------- end đơn hàng --------------------

  // -------------danh mục sản phẩm ------------------
  'quan-ly-danh-muc-san-pham'                    => (new QuanLyDanhMucSanPhamController())->danhsachDanhMucSanPham(),
  'form-them-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController())->formAddDanhMucSanPham(),
  'them-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController())->postAddDanhMucSanPham(),
  'form-sua-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController())->formEditDanhMucSanPham(),
  'sua-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController())->postEditDanhMucSanPham(),
  'xoa-danh-muc-san-pham'                            => (new QuanLyDanhMucSanPhamController())->deleteDanhMucSanPham(),
  // ------------- end danh mục sản phẩm ------------------

  // -------------Bộ sưu tập ------------------
  'quan-ly-bo-suu-tap'                            => (new QuanLyBoSuuTapController())->danhsachBoSuuTap(),
  'form-them-bo-suu-tap'                            => (new QuanLyBoSuuTapController())->formAddBoSuuTap(),
  'them-bo-suu-tap'                            => (new QuanLyBoSuuTapController())->postAddBoSuuTap(),
  'form-sua-bo-suu-tap'                            => (new QuanLyBoSuuTapController())->formEditBoSuuTap(),
  'sua-bo-suu-tap'                            => (new QuanLyBoSuuTapController())->postEditBoSuuTap(),
  'xoa-bo-suu-tap'                            => (new QuanLyBoSuuTapController())->deleteBoSuuTap(),
  // ------------- end Bộ sưu tập ------------------

  // -------------Trạng thái đơn hàng ------------------
  'quan-ly-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController())->danhsachTrangThaiDonHang(),
  'form-them-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController())->formAddTrangThaiDonHang(),
  'them-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController())->postAddTrangThaiDonHang(),
  'form-sua-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController())->formEditTrangThaiDonHang(),
  'sua-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController())->postEditTrangThaiDonHang(),
  'xoa-trang-thai-don-hang'                            => (new QuanLyTrangThaiDonHangController())->deleteTrangThaiDonHang(),
  // ------------- end Trạng thái đơn hàng ------------------


  // -------------Quản lý tài khoản ------------------
  // QUản lý tài khoản quản trị viên
  'quan-ly-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController())->danhSachTaiKhoanQuanTri(),
  'form-them-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController())->formAddTaiKhoanQuanTri(),
  'them-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController())->postAddTaiKhoanQuanTri(),
  'form-sua-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController())->formEditTaiKhoanQuanTri(),
  'sua-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController())->postEditTaiKhoanQuanTri(),
  'xoa-tai-khoan-quan-tri-vien'                            => (new QuanLyTaiKhoanController())->deleteTaiKhoanQuanTri(),
  
  'form-sua-tai-khoan-ca-nhan'                              => (new QuanLyTaiKhoanController()) -> formEditTaiKhoanCaNhan(),
  'sua-mat-khau-tai-khoan-ca-nhan'                              => (new QuanLyTaiKhoanController()) -> postEditMatKhauTaiKhoanCaNhan(),
  'sua-mat-khau-ca-nhan'                              => (new QuanLyTaiKhoanController()) -> postEditMatKhauCaNhan(),


  'reset-password'                            => (new QuanLyTaiKhoanController())->resetPassword(),
  // Quản lý tài khoản khách hàng
  'quan-ly-tai-khoan-khach-hang'                            => (new QuanLyTaiKhoanController())->danhSachTaiKhoanKhachHang(),
  'form-sua-tai-khoan-khach-hang'                            => (new QuanLyTaiKhoanController())->formEditTaiKhoanKhachHang(),
  'sua-tai-khoan-quan-khach-hang'                            => (new QuanLyTaiKhoanController())->postEditTaiKhoanKhachHang(),
  'chi-tiet-tai-khoan-khach-hang'                            => (new QuanLyTaiKhoanController())->viewsTaiKhoanKhachHang(),

  // -------------Bình Luận ------------------
  'quan-ly-binh-luan'                            => (new QuanLyBinhLuanController())->danhSachBinhLuan(),
  'danh-sach-binh-luan'                            => (new QuanLyBinhLuanController())->danhSachDetailBinhLuan(),
  'xoa-binh-luan'                            => (new QuanLyBinhLuanController())->deleteBinhLuan(),
  // ------------- end bình luận ------------------


  // -------------Tin tức------------------
  'quan-ly-tin-tuc'                            => (new QuanLyTinTucController())->danhSachTinTuc(),
  'form-them-tin-tuc'                            => (new QuanLyTinTucController())->formAddTinTuc(),
  'them-tin-tuc'                            => (new QuanLyTinTucController())->postAddTinTuc(),
  'form-sua-tin-tuc'                            => (new QuanLyTinTucController())->formEditTinTuc(),
  'sua-tin-tuc'                            => (new QuanLyTinTucController())->postEditTinTuc(),
  'xoa-tin-tuc'                            => (new QuanLyTinTucController())->deleteTinTuc(),
  'chi-tiet-tin-tuc'                            => (new QuanLyTinTucController())->showTinTuc($_GET['id']),
  // ------------- end tin tức ------------------


  // -------------Banner------------------
  'quan-ly-banner'                            => (new QuanLyBannerController())->danhSachBanner(),
  'form-them-banner'                            => (new QuanLyBannerController())->formAddBanner(),
  'them-banner'                            => (new QuanLyBannerController())->postAddBanner(),
  'form-sua-banner'                            => (new QuanLyBannerController())->formEditBanner(),
  'sua-banner'                            => (new QuanLyBannerController())->postEditBanner(),
  'xoa-banner'                            => (new QuanLyBannerController())->deleteBanner(),
  // ------------- end banner ------------------

  // -------------------liên hệ---------------
  'quan-ly-lien-he'                            => (new QuanLyLienHeController())->danhSachLienHe(),
  'form-sua-lien-he'                            => (new QuanLyLienHeController())->formEditLienHe(),
  'sua-lien-he'                            => (new QuanLyLienHeController())->postEditLienHe(),
  'xoa-lien-he'                            => (new QuanLyLienHeController())->deleteLienHe(),
  // ------------------- end liên hệ ---------------

  // ------------- Quản lý size ------------------
  'quan-ly-kich-co'                            => (new QuanLyKichCoController())->danhSachKichCo(),
  'form-them-kich-co'                            => (new QuanLyKichCoController())->formAddKichCo(),
  'them-kich-co'                            => (new QuanLyKichCoController())->postAddKichCo(),
  'xoa-kich-co'                            => (new QuanLyKichCoController())->deleteKichCo(),
  // ------------- end size ------------------

  // ------------- Quản lý màu sắc ------------------
  'quan-ly-mau-sac'                            => (new QuanLyMauSacController())->danhSachMauSac(),
  'form-them-mau-sac'                            => (new QuanLyMauSacController())->formAddMauSac(),
  'them-mau-sac'                            => (new QuanLyMauSacController())->postAddMauSac(),
  'xoa-mau-sac'                            => (new QuanLyMauSacController())->deleteMauSac(),
  // ------------- end màu sắc -----------------

  'login-admin' => (new QuanLyTaiKhoanController())->formLogin(),
  'check-login-admin' => (new QuanLyTaiKhoanController())->login(),
  'logout' => (new QuanLyTaiKhoanController())->logout(),
};
