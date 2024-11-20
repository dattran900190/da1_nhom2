<?php

class QuanLyTaiKhoanController {

    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new adminTaiKhoan();
    }
    public function danhSachTaiKhoanQuanTri() {
        $listTaiKhoanQuanTri = $this->modelTaiKhoan->getAllTaiKhoanQuanTri(1);
        require_once "./views/taikhoan/quantri/ListQuanTri.php";
    }
    public function formAddTaiKhoanQuanTri() {
        require_once "./views/taikhoan/quantri/AddQuanTri.php";
    }
    public function postAddTaiKhoanQuanTri(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            
           

            // Validate 
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ và tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Emailkhông được để trống';
            }
            

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                // Khai báo chức vụ
                $chuc_vu_id = 1;
                //Đặt password mặc định cho quản trị viên
                 $password = password_hash('thanhviennhom2@123', PASSWORD_BCRYPT);
                 
                $this->modelTaiKhoan->postAddTaiKhoanQuanTri($ho_ten, $email, $password, $chuc_vu_id);
                 // Thêm thông báo thành công vào session
                 $_SESSION['success'] = 'Thêm tài khoản quản trị thành công!';

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-tai-khoan-quan-tri-vien');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Trả vẻ form và lỗi
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-tai-khoan-quan-tri-vien');
                exit();
            }
        }
    }
}