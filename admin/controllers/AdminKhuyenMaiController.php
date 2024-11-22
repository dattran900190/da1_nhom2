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
            $so_luong = $_POST['so_luong'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $trang_thai = $_POST['trang_thai'];
            $loai_khuyen_mai = $_POST['loai_khuyen_mai'];

            // var_dump($_POST);die;

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
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng khuyến mãi không được để trống';
            }
            if (empty($ngay_bat_dau)) {
                $errors['ngay_bat_dau'] = 'Ngày bắt đầu khuyến mãi khuyến mãi không được để trống';
            }
            if (empty($ngay_ket_thuc)) {
                $errors['ngay_ket_thuc'] = 'Ngày kết thúc khuyến mãi không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái khuyến mãi phải chọn';
            }
            if (empty($loai_khuyen_mai)) {
                $errors['loai_khuyen_mai'] = 'Loại khuyến mãi phải chọn';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modleKhuyenMai->insertKhuyenMai($ten_khuyen_mai, $ma_khuyen_mai, $muc_giam_gia, $so_luong, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai, $loai_khuyen_mai);

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
        $so_luong = $_POST['so_luong'];
        $ngay_bat_dau = $_POST['ngay_bat_dau'];
        $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
        $trang_thai = $_POST['trang_thai'];
        $loai_khuyen_mai = $_POST['loai_khuyen_mai'];
        $id = $_POST['id'];

        // var_dump($_POST);die;

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
        if (empty($so_luong)) {
            $errors['so_luong'] = 'Số lượng khuyến mãi không được để trống';
        }
        if (empty($ngay_bat_dau)) {
            $errors['ngay_bat_dau'] = 'Ngày bắt đầu khuyến mãi không được để trống';
        }
        if (empty($ngay_ket_thuc)) {
            $errors['ngay_ket_thuc'] = 'Ngày kết thúc khuyến mãi không được để trống';
        }
        if (empty($trang_thai)) {
            $errors['trang_thai'] = 'Trạng thái khuyến mãi phải chọn';
        }
        if (empty($loai_khuyen_mai)) {
            $errors['loai_khuyen_mai'] = 'Loại khuyến mãi phải chọn';
        }

        $_SESSION['errors'] = $errors;

        if (empty($errors)) {
            // Nếu không có lỗi thì tiến hành update khuyến mãi
             $this->modleKhuyenMai->updateKhuyenMai($id, $ten_khuyen_mai, $ma_khuyen_mai, $muc_giam_gia, $so_luong, 
                $ngay_bat_dau, $ngay_ket_thuc, $trang_thai, $loai_khuyen_mai
            );

            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-khuyen-mai');
                exit();
        } 

        // Trả về form và lỗi
        header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-khuyen-mai&id=' . $id);
        exit();
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
