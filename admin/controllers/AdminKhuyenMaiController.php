<?php

class QuanLyKhuyenMaiController
{
    public $modleKhuyenMai;
    public function __construct()
    {
        $this->modleKhuyenMai = new adminKhuyenMai();
    }

    public function danhSachKhuyenMai()
    {
        $listKhuyenMai = $this->modleKhuyenMai->getAllKhuyenMai();
        require_once "./views/khuyenmai/ListKhuyenMai.php";
    }

    public function formAddKhuyenMai()
    {
        require_once './views/khuyenmai/AddKhuyenMai.php';
        deleteSessionError();
    }

    public function postAddKhuyenMai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
            $muc_giam_gia = $_POST['muc_giam_gia'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $trang_thai = $_POST['trang_thai'];

            // Validate 
            $errors = [];
            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen_mai'] = 'Tên khuyến mãi không được để trống';
            }
            if (empty($ma_khuyen_mai)) {
                $errors['ma_khuyen_mai'] = 'Mã khuyến mãi không được để trống';
            }
            if (empty($muc_giam_gia)) {
                $errors['muc_giam_gia'] = 'Giá khuyến mãi không được để trống';
            }
            if (empty($ngay_bat_dau)) {
                $errors['ngay_bat_dau'] = 'Giá khuyến mãi khuyến mãi không được để trống';
            }
            if (empty($ngay_ket_thuc)) {
                $errors['ngay_ket_thuc'] = 'Số lượng khuyến mãi không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái khuyến mãi phải chọn';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modleKhuyenMai->insertKhuyenMai($ten_khuyen_mai, $ma_khuyen_mai, $muc_giam_gia, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai);

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-khuyen-mai');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Trả vẻ form và lỗi
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-khuyen-mai');
                exit();
            }
        }
    }

    public function formEditKhuyenMai()
    {
        $id = $_GET['id'];
        $khuyenmai = $this->modleKhuyenMai->getIdKhuyenMai($id);
        if ($khuyenmai) {
            # code...
            require_once './views/khuyenmai/EditKhuyenMai.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-khuyen-mai');
        }
    }

    public function postEditKhuyenMai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
            $muc_giam_gia = $_POST['muc_giam_gia'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $trang_thai = $_POST['trang_thai'];
            $id = $_POST['id'];

            // Validate 
            $errors = [];
            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen_mai'] = 'Tên khuyến mãi không được để trống';
            }
            if (empty($ma_khuyen_mai)) {
                $errors['ma_khuyen_mai'] = 'Mã khuyến mãi không được để trống';
            }
            if (empty($muc_giam_gia)) {
                $errors['muc_giam_gia'] = 'Giá khuyến mãi không được để trống';
            }
            if (empty($ngay_bat_dau)) {
                $errors['ngay_bat_dau'] = 'Giá khuyến mãi khuyến mãi không được để trống';
            }
            if (empty($ngay_ket_thuc)) {
                $errors['ngay_ket_thuc'] = 'Số lượng khuyến mãi không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái khuyến mãi phải chọn';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modleKhuyenMai->updateKhuyenMai($id, $ten_khuyen_mai, $ma_khuyen_mai, $muc_giam_gia, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai);

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-khuyen-mai');
                exit();
            } else {
                // Trả vẻ form và lỗi
                $khuyemai = [
                    'id' => $id,
                    'ten_khuyen_mai' => $ten_khuyen_mai,
                    'ma_khuyen_mai' => $ma_khuyen_mai,
                    'muc_giam_gia' => $muc_giam_gia,
                    'ngay_bat_dau' => $ngay_bat_dau,
                    'ngay_ket_thuc' => $ngay_ket_thuc,
                    'trang_thai' => $trang_thai
                ];
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-khuyen-mai');
                exit();
            }
        }
    }

    public function deleteKhuyenMai(){
        $id = $_GET['id'];
        $khuyenmai = $this->modleKhuyenMai->getIdKhuyenMai($id);
       
        if (isset($khuyenmai)) {
            $this->modleKhuyenMai->deleteKhuyenMai($id);
        }
        header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-khuyen-mai');
        exit();
        
    }
}
