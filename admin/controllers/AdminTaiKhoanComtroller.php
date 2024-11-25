<?php

class QuanLyTaiKhoanController {

    public $modelTaiKhoan;
    public $modelDonHang;
    public $modleBinhLuan;
    public function __construct()
    {
        $this->modelTaiKhoan = new adminTaiKhoan();
        $this->modelDonHang = new adminDonHang();
        $this->modleBinhLuan = new adminBinhLuan();
    }
    public function danhSachTaiKhoanQuanTri() {
        $listTaiKhoanQuanTri = $this->modelTaiKhoan->getAllTaiKhoanQuanTri(1);
        require_once "./views/taikhoan/quantri/ListQuanTri.php";
    }
    public function formAddTaiKhoanQuanTri() {
        require_once "./views/taikhoan/quantri/AddQuanTri.php";
        deleteSessionError();
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

                // đặt pass mặc định 
                $password = password_hash('123456', PASSWORD_BCRYPT); // mã hoá password_hash

                // Khai báo chức vụ
                $chuc_vu_id = 1;
                //Đặt password mặc định cho quản trị viên
              
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
    public function formEditTaiKhoanQuanTri() {
        $id = $_GET['id'];
        $taiKhoanQuanTri = $this->modelTaiKhoan->formEditTaiKhoanQuanTri($id);
        if ($taiKhoanQuanTri) {
            require_once './views/taikhoan/quantri/EditQuanTri.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-danh-muc-san-pham');
        }
    }
    public function postEditTaiKhoanQuanTri(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $trang_thai = $_POST['trang_thai'];
            
            $id = $_POST['id'];

            // Validate 
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên tài khoản quản trịkhông được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email tài khoản quản trị  không được để trống';
            }
          
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trang thái tài khoản quản trị  không được để trống';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modelTaiKhoan->updateTaiKhoanQuanTri($id, $ho_ten, $email, $so_dien_thoai,$trang_thai);

                $_SESSION['success'] = 'Đã cập nhật tài khoản khách hàng thành công!';

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-tai-khoan-quan-tri-vien');
                exit();
            } else {
                // Trả vẻ form và lỗi
                $taiKhoanQuanTri = [
                    'id' => $id,
                    'ho_ten' => $ho_ten,
                    'email' => $email,
                    'so_dien_thoai' => $so_dien_thoai,
                    'trang_thai' => $trang_thai
                    
                ];
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-tai-khoan-quan-tri-vien&id=' . $id);
                exit();
            }
        }
    }
    public function deleteTaiKhoanQuanTri() {
        $id = $_GET['id'];
        $taiKhoanQuanTri = $this->modelTaiKhoan->deleteTaiKhoanQuanTri($id);
       
        if (isset($taiKhoanQuanTri)) {
            $this->modelTaiKhoan->deleteTaiKhoanQuanTri($id);
        }
        header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-tai-khoan-quan-tri-vien');
        exit();
    }
    public function resetPassword(){
        $mat_khau_reset = '';
        $id = $_GET['id'];
        $tai_khoan = $this->modelTaiKhoan->formEditTaiKhoanQuanTri($id);
        $status=$this->modelTaiKhoan->resetPassword($id,$mat_khau_reset);
        if($status && $tai_khoan['chuc_vu_id'] == 1){
            header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-tai-khoan-quan-tri-vien');
        }else if($status && $tai_khoan['chuc_vu_id'] == 2){
            header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-tai-khoan-khach-hang');
        }
        else{
            var_dump('Lỗi khi reset tài khoản '); die;
        }
    }
    public function danhSachTaiKhoanKhachHang(){
        $listTaiKhoanKhachHang = $this->modelTaiKhoan->getAllTaiKhoanKhachHang(2);
        require_once "./views/taikhoan/khachhang/ListKhachHang.php";
    }
    public function formEditTaiKhoanKhachHang() {
        $id = $_GET['id'];
        $taiKhoanKhachHang = $this->modelTaiKhoan->formEditTaiKhoanKhachHang($id);
        if ($taiKhoanKhachHang) {
            
            require_once './views/taikhoan/khachhang/EditKhachHang.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-tai-khoan-khach-hang');
        }
    }
    public function postEditTaiKhoanKhachHang(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $trang_thai = $_POST['trang_thai'];
            
            $id = $_POST['id'];

            // Validate 
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên tài khoản quản trịkhông được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email tài khoản quản trị  không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Email tài khoản quản trị  không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Sđt tài khoản quản trị  không được seksi';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Dia chi tài khoản quản trị  không được seksi';
            }
          
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trang thái tài khoản quản trị  không được để trống';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modelTaiKhoan->updateTaiKhoanKhachHang($id, $ho_ten, $email, $ngay_sinh,$so_dien_thoai,$dia_chi,$trang_thai);

                $_SESSION['success'] = 'Đã cập nhật tài khoản quản trị thành công!';

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-tai-khoan-khach-hang');
                exit();
            } else {
                // Trả vẻ form và lỗi
                $taiKhoanKhachHang = [
                    'id' => $id,
                    'ho_ten' => $ho_ten,
                    'email' => $email,
                    'ngay_sinh' => $ngay_sinh,
                    'so_dien_thoai' => $so_dien_thoai,
                    'dia_chi' => $dia_chi,
                    'trang_thai' => $trang_thai
                    
                ];
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-tai-khoan-khach-hang&id=' . $id);
                exit();
            }
        }
    }
    public function viewsTaiKhoanKhachHang()
    {
        $id = $_GET['id'];
        $taiKhoanKhachHang = $this->modelTaiKhoan->viewsTaiKhoanKhachHang($id);


        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id);


        $listBinhLuan = $this->modleBinhLuan->getBinhLuanFromKhachHang($id);
        require_once './views/taikhoan/khachhang/ViewsKhachHang.php';
    }


    
    public function formLogin(){
        require_once './views/auth/formLogin.php';

        deleteSessionError();
        exit();
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // var_dump($email);die;

            // Xử lý kiểm tra thông tin đăng nhập

            $user = $this->modelTaiKhoan->checkLogin($email,$password);

            // var_dump($user);die;
            if ($user == $email) { // Trường hợp đăng nhập thành công
                // Lưu thông tin vào session
                $_SESSION['user_admin'] = $user;
                header("Location: ". BASE_URL_ADMIN );
                exit();
            }else{
                // Lỗi thì lưu vào session 
                $_SESSION['erorrs'] = $user;
                // var_dump($_SESSION['erorrs']);die();
                $_SESSION['flash'] = true;

                header("Location: ". BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }

    public function logout(){
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header("Location: ". BASE_URL_ADMIN . "?act=login-admin");
        }
    }
    
    
}
