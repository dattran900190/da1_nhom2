<?php

class QuanLyDanhMucSanPhamController {
    public $modelDanhMucSanPham;
     public function __construct()
    {
        $this->modelDanhMucSanPham = new adminDanhMucSanPham();
    }
    // Load danh sách danh mục sản phẩm
    public function danhsachDanhMucSanPham() {
        $listDanhMucSanPham = $this->modelDanhMucSanPham->getAllDanhMucSanPham();
        require_once "./views/danhmuc/ListDanhMuc.php";
    }
     // Form thêm danh mục sản phẩm
    public function formAddDanhMucSanPham() {
        require_once './views/danhmuc/AddDanhMuc.php';
        deleteSessionError();
    }
    // Thêm danh mục sản phẩm
    public function postAddDanhMucSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
           

            // Validate 
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục sản phẩm không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả danh mục sản phẩm không được để trống';
            }
            

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modelDanhMucSanPham->postAddDanhMucSanPham($ten_danh_muc, $mo_ta);

                 // Thêm thông báo thành công vào session
                 $_SESSION['success'] = 'Thêm danh mục sản phẩm  thành công!';

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-danh-muc-san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Trả vẻ form và lỗi
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-danh-muc-san-pham');
                exit();
            }
        }
    }
     // Form sửa danh mục sản phẩm
    public function formEditDanhMucSanPham() {
        $id = $_GET['id'];
        $danhMucSanPham = $this->modelDanhMucSanPham->formEditDanhMucSanPham($id);
        if ($danhMucSanPham) {
            # code...
            require_once './views/danhmuc/EditDanhMuc.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-danh-muc-san-pham');
        }
    }
     // Update danh mục sản phẩm khi đã sửa
    public function postEditDanhMucSanPham() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            
            $id = $_POST['id'];

            // Validate 
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục sản phẩm không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả danh mục sản phẩm không được để trống';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modelDanhMucSanPham->updateDanhMucSanPham($id, $ten_danh_muc, $mo_ta);

                $_SESSION['success'] = 'Đã cập nhật danh mục sản phẩm  thành công!';

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-danh-muc-san-pham');
                exit();
            } else {
                // Trả vẻ form và lỗi
                $danhMucSanPham = [
                    'id' => $id,
                    'ten_danh_muc' => $ten_danh_muc,    
                    'mo_ta' => $mo_ta
                    
                ];
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-danh-muc-san-pham');
                exit();
            }
        }
    }
    // Xóa danh mục sản phẩm
    public function deleteDanhMucSanPham() {
        $id = $_GET['id'];
        $danhMucSanPham = $this->modelDanhMucSanPham->deleteDanhMucSanPham($id);
       
        if (isset($danhMucSanPham)) {
            $this->modelDanhMucSanPham->deleteDanhMucSanPham($id);
        }
        header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-danh-muc-san-pham');
        exit();
    }
}