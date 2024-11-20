<?php
class QuanLyDonHangController
{
    public $modleDonHang;
    public $modelSanPham;
    public $modleKhuyenMai;
    public function __construct()
    {
        $this->modleDonHang = new adminDonHang();
        $this->modelSanPham = new SanPham();
        $this->modleKhuyenMai = new adminKhuyenMai();
    }
    public function danhSachDonHang()
    {
        $listDonHang = $this->modleDonHang->getAllDonHang();
        require_once './views/donhang/ListDonHang.php';
    }

    public function detailDonHang()
    {
        $don_hang_id = $_GET['id_don_hang'];

        // Lấy thông tin đơn hàng từ bảng đơn hàng
        $donHang = $this->modleDonHang->getDetailDonHang($don_hang_id);

        // Láy danh sách đơn hàng đã đặt của đơn hàng từ bảng chi_tiet_don_hangs
        $sanPhamDonHang = $this->modleDonHang->getListSanPhamDonHang($don_hang_id);
        //    var_dump($sanPhamDonHang);die;
        $listTrangThaiDonHang = $this->modleDonHang->getAllTrangThaiDonHang();

         // Láy khuyến mãi từ bảng khuyen_mais
        $maKhuyenMai = $this->modleKhuyenMai->getAllKhuyenMai();
        require_once './views/donhang/detailDonHang.php';
    }

    public function formEditDonHang()
    {
        $id = $_GET['id_don_hang'] ?? null;

        $donHang = $this->modleDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modleDonHang->getAllTrangThaiDonHang();
        $sanPhamDonHang = $this->modleDonHang->getListSanPhamDonHang($id);

        if ($donHang) {
            require_once './views/donhang/editDonHang.php';
            deleteSessionError();
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-don-hang');
            exit();
        }
    }

    public function postEditDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $don_hang_id = $_POST['don_hang_id'];
            $trang_thai_id = $_POST['trang_thai_id'];

            $errors = [];
            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Trạng thái đơn hàng không được để trống';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                $this->modleDonHang->updateDonHang($don_hang_id, $trang_thai_id);
                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-don-hang');
                exit();
            } else {
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
            }
        }
    }
}
