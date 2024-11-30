<?php

class QuanLyMauSacController {
    public $modelMauSac;
     public function __construct()
    {
        $this->modelMauSac = new adminMauSac();
    }
    // Load danh sách danh mục sản phẩm
    public function danhSachMauSac() {
        $listMauSac = $this->modelMauSac->getAllMauSac();
        require_once "./views/mausac/ListMauSac.php";
    }
     // Form thêm danh mục sản phẩm
    public function formAddMauSac() {
        require_once './views/mausac/AddMauSac.php';
        deleteSessionError();
    }
    // Thêm danh mục sản phẩm
    public function postAddMauSac()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_mau = $_POST['ten_mau'];
           
           

            // Validate 
            $errors = [];
            if (empty($ten_mau)) {
                $errors['ten_mau'] = 'Tên màu sắc  không được để trống';
            }
           
            

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modelMauSac->postAddMauSac($ten_mau);

                 // Thêm thông báo thành công vào session
                 $_SESSION['success'] = 'Thêm màu sắc thành công!';

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-mau-sac');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Trả vẻ form và lỗi
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-mau-sac');
                exit();
            }
        }
    }
    public function deleteMauSac() {
        $id = $_GET['id'];
        $mauSac = $this->modelMauSac->deleteMauSac($id);
       
        if (isset($kichCo)) {
            $this->modelMauSac->deleteMauSac($id);
        }
        header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-mau-sac');
        exit();
    }
}
?>