<?php

class QuanLyBinhLuanController
{
    public $modleBinhLuan;
    public function __construct()
    {
        $this->modleBinhLuan = new adminBinhLuan();
    }

    public function danhSachBinhLuan()
    {
        $listBinhLuan = $this->modleBinhLuan->getAllBinhLuan();
        require_once "./views/binhLuan/ListBinhLuan.php";
    }

    public function formAddBinhLuan()
    {
        require_once './views/binhLuan/AddBinhLuan.php';
        deleteSessionError();
    }

    public function postAddBinhLuan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $id = $_POST['id'];
            $san_pham_id = $_POST['san_pham_id'];
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $noi_dung = $_POST['noi_dung'];
            $ngay_dang = $_POST['ngay_dang'];
            $trang_thai = $_POST['trang_thai'];

            // Validate 
            $errors = [];
            
            if (empty($san_pham_id)) {
                $errors['san_pham_id'] = 'Mã Sản Phẩm không được để trống';
            }
            if (empty($tai_khoan_id)) {
                $errors['tai_khoan_id'] = 'mã tài khoản không được để trống';
            }
            if (empty($ngay_dang)) {
                $errors['ngay_dang'] = 'Ngày đăng bình luận không được để trống';
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Nội dung bình luận không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái bình luận phải chọn';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modleBinhLuan->insertBinhLuan($ten_binh_luan, $ma_binh_luan, $muc_giam_gia, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai);

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-binh-luan');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Trả vẻ form và lỗi
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-binh-luan');
                exit();
            }
        }
    }

    public function formEditBinhLuan()
    {
        $id = $_GET['id'];
        $BinhLuan = $this->modleBinhLuan->getIdBinhLuan($id);
        if ($BinhLuan) {
            # code...
            require_once './views/binhLuan/EditBinhLuan.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-binh-luan');
        }
    }

    public function postEditBinhLuan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $id = $_POST['id'];
            $san_pham_id = $_POST['san_pham_id'];
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $noi_dung = $_POST['noi_dung'];
            $ngay_dang = $_POST['ngay_dang'];
            $trang_thai = $_POST['trang_thai'];

            // Validate 
            $errors = [];
            
            if (empty($san_pham_id)) {
                $errors['san_pham_id'] = 'Mã Sản Phẩm không được để trống';
            }
            if (empty($tai_khoan_id)) {
                $errors['tai_khoan_id'] = 'mã tài khoản không được để trống';
            }
            if (empty($ngay_dang)) {
                $errors['ngay_dang'] = 'Ngày đăng bình luận không được để trống';
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Nội dung bình luận không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái bình luận phải chọn';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modleBinhLuan->updateBinhLuan($id, $san_pham_id, $tai_khoan_id, $ngay_dang, $noi_dung, $trang_thai);

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-binh-luan');
                exit();
            } else {
                // Trả vẻ form và lỗi
                $binhluan = [
                    ':id' => $id,
                'san_pham_id' => $san_pham_id,
                'tai_khoan_id' => $tai_khoan_id,
                'ngay_dang' => $ngay_dang,
                'noi_dung' => $noi_dung,
                'trang_thai' => $trang_thai
                ];
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-binh-luan');
                exit();
            }
        }
    }

    public function deleteBinhLuan(){
        $id = $_GET['id'];
        $binhLuan = $this->modleBinhLuan->getIdBinhLuan($id);
       
        if (isset($binhLuan)) {
            $this->modleBinhLuan->deleteBinhLuan($id);
        }
        header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-binh-luan');
        exit();
        
    }
}
