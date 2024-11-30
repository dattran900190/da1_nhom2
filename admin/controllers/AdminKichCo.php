<?php

class QuanLyKichCoController {
    public $modelKichCo;
    
     public function __construct()
    {
        $this->modelKichCo = new adminKichCo();
    }
    // Load danh sách danh mục sản phẩm
    public function danhSachKichCo() {
        $listKichCo = $this->modelKichCo->getAllKichCo();
        require_once "./views/kichco/ListKichCo.php";
    }
     // Form thêm danh mục sản phẩm
    public function formAddKichCo() {
        require_once './views/kichco/AddKichCo.php';
        deleteSessionError();
    }
    // Thêm danh mục sản phẩm
    public function postAddKichCo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_kich_co = $_POST['ten_kich_co'];
           
           

            // Validate 
            $errors = [];
            if (empty($ten_kich_co)) {
                $errors['ten_kich_co'] = 'Kích cõ sản phẩm không được để trống';
            }
           
            

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modelKichCo->postAddKichCo($ten_kich_co,);

                 // Thêm thông báo thành công vào session
                 $_SESSION['success'] = 'Thêm kích cỡ sản phẩm thành công!';

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-kich-co');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Trả vẻ form và lỗi
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-kich-co');
                exit();
            }
        }
    }
    public function deleteKichCo() {
        $id = $_GET['id'];
        $kichCo = $this->modelKichCo->deleteKichCo($id);
       
        if (isset($kichCo)) {
            $this->modelKichCo->deleteKichCo($id);
        }
        header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-kich-co');
        exit();
    }
}
?>