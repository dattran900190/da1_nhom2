<?php

class QuanLyTrangThaiDonHangController {
    public $modelTrangThaiDonHang;
     public function __construct()
    {
        $this->modelTrangThaiDonHang = new adminTrangThaiDonHang();
    }
    // Load danh sách danh mục sản phẩm
    public function danhsachTrangThaiDonHang() {
        $listTrangThaiDonHang = $this->modelTrangThaiDonHang->getAllTrangThaiDonHang();
        require_once "./views/trangThaiDonHang/ListTrangThaiDonHang.php";
    }
     // Form thêm danh mục sản phẩm
    public function formAddTrangThaiDonHang() {
        require_once './views/trangThaiDonHang/AddTrangThaiDonHang.php';
        deleteSessionError();
    }
    // Thêm danh mục sản phẩm
    public function postAddTrangThaiDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_trang_thai = $_POST['ten_trang_thai'];
            $mo_ta = $_POST['mo_ta'];
        //    var_dump($ten_trang_thai);die;

            // Validate 
            $errors = [];
            if (empty($ten_trang_thai)) {
                $errors['ten_trang_thai'] = 'Tên danh mục sản phẩm không được để trống';
            }
           
            

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modelTrangThaiDonHang->postAddTrangThaiDonHang($ten_trang_thai, $mo_ta);

                 // Thêm thông báo thành công vào session
                 $_SESSION['success'] = 'Thêm danh mục sản phẩm  thành công!';

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-trang-thai-don-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Trả vẻ form và lỗi
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-trang-thai-don-hang');
                exit();
            }
        }
    }
     // Form sửa danh mục sản phẩm
    public function formEditTrangThaiDonHang() {
        $id = $_GET['id'];
        $trangThaiDonHang = $this->modelTrangThaiDonHang->formEditTrangThaiDonHang($id);
        if ($trangThaiDonHang) {
            # code...
            require_once './views/trangThaiDonHang/EditTrangThaiDonHang.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-trang-thai-don-hang');
        }
    }
     // Update danh mục sản phẩm khi đã sửa
    public function postEditTrangThaiDonHang() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_trang_thai = $_POST['ten_trang_thai'];
            $mo_ta = $_POST['mo_ta'];
            
            $id = $_POST['id'];

            // Validate 
            $errors = [];
            if (empty($ten_trang_thai)) {
                $errors['ten_trang_thai'] = 'Tên danh mục sản phẩm không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả danh mục sản phẩm không được để trống';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modelTrangThaiDonHang->updateTrangThaiDonHang($id, $ten_trang_thai, $mo_ta);

                $_SESSION['success'] = 'Đã cập nhật danh mục sản phẩm thành công!';

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-trang-thai-don-hang');
                exit();
            } else {
                // Trả vẻ form và lỗi
                $trangThaiDonHang = [
                    'id' => $id,
                    'ten_trang_thai' => $ten_trang_thai,    
                    'mo_ta' => $mo_ta
                    
                ];
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-trang-thai-don-hang');
                exit();
            }
        }
    }
    // Xóa danh mục sản phẩm
    public function deleteTrangThaiDonHang() {
        $id = $_GET['id'];
        $trangThaiDonHang = $this->modelTrangThaiDonHang->deleteTrangThaiDonHang($id);
       
        if (isset($trangThaiDonHang)) {
            $this->modelTrangThaiDonHang->deleteTrangThaiDonHang($id);
        }
        header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-trang-thai-don-hang');
        exit();
    }
}