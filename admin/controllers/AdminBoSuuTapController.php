<?php

class QuanLyBoSuuTapController {
    public $modleBoSuuTap;
     public function __construct()
    {
        $this->modleBoSuuTap = new adminBoSuuTap();
    }

    public function danhsachBoSuuTap() {
        $listBoSuuTap = $this->modleBoSuuTap->getAllBoSuuTap();
        require_once "./views/bosuutap/ListBoSuuTap.php";
    }

    public function formAddBoSuuTap() {
        require_once './views/bosuutap/AddBoSuuTap.php';
        deleteSessionError();
    }
    public function postAddBoSuuTap() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_bo_suu_tap = $_POST['ten_bo_suu_tap'];
            $mo_ta = $_POST['mo_ta'];
    
            // Validate 
            $errors = [];
            if (empty($ten_bo_suu_tap)) {
                $errors['ten_bo_suu_tap'] = 'Tên bộ sưu tập không thể để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả bộ sưu tập không được để trống';
            }
    
            $_SESSION['errors'] = $errors;
    
            if (empty($errors)) {
                // Nếu không có lỗi, thêm danh mục
                $this->modleBoSuuTap->postAddBoSuuTap($ten_bo_suu_tap, $mo_ta);
    
                // Thêm thông báo thành công vào session
                $_SESSION['success'] = 'Thêm bộ sưu tập thành công!';
    
                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-bo-suu-tap');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Trả về form và lỗi
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-bo-suu-tap');
                exit();
            }
        }
    }
    
    public function formEditBoSuuTap() {
        $id = $_GET['id'];
        $boSuuTap = $this->modleBoSuuTap->formEditBoSuuTap($id);
        if ($boSuuTap) {
            # code...
            require_once './views/bosuutap/EditBoSuuTap.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-bo-suu-tap');
        }
    }

    public function postEditBoSuuTap() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_bo_suu_tap = $_POST['ten_bo_suu_tap'];
            $mo_ta = $_POST['mo_ta'];
            
            $id = $_POST['id'];

            // Validate 
            $errors = [];
            if (empty($ten_bo_suu_tap)) {
                $errors['ten_bo_suu_tap'] = 'Tên bộ sưu tập không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả bộ sưu tập không được để trống';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modleBoSuuTap->updateBoSuuTap($id, $ten_bo_suu_tap, $mo_ta);

                $_SESSION['success'] = 'Đã cập nhật bộ sưu tập  thành công!';

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-bo-suu-tap');
                exit();
            } else {
                // Trả vẻ form và lỗi
                $boSuuTap = [
                    'id' => $id,
                    'ten_bo_suu_tap' => $ten_bo_suu_tap,    
                    'mo_ta' => $mo_ta
                    
                ];
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-bo-suu-tap');
                exit();
            }
        }
    }

    public function deleteBoSuuTap() {
        $id = $_GET['id'];
        $boSuuTap = $this->modleBoSuuTap->deleteBoSuuTap($id);
       
        if (isset($boSuuTap)) {
            $this->modleBoSuuTap->deleteBoSuuTap($id);
        }
        header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-bo-suu-tap');
        exit();
    }
}