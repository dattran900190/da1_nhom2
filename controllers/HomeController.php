<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        // $this->modelTaiKhoan = new taiKhoan();
        // $this->modelGioHang = new GioHang();
    }
    public function trangChu()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        require_once './views/Home.php';
    }
    public function sanPham()
    {
        // Get all categories
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();

        // Check if a category ID is passed via GET
        if (isset($_GET['danh-muc'])) {
            $danhMucId = $_GET['danh-muc'];
            // Get products by category ID
            $listSanPham = $this->modelSanPham->getSanPhamDanhMuc($danhMucId);
        } else {
            // Get all products if no category is selected
            $listSanPham = $this->modelSanPham->getAllProduct();
        }

        // $listSanPham = $this->modelSanPham->getAllProduct();
        // $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        // $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        require_once './views/SanPham.php';
    }
    public function boSuuTap()
    {
        // $listSanPham = $this->modelSanPham->getAllProduct();
        // $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();

         // Check if a category ID is passed via GET
         if (isset($_GET['bo-suu-tap'])) {
            $boSuuTapId = $_GET['bo-suu-tap'];
            // Get products by category ID
            $listSanPham = $this->modelSanPham->getSanPhamBoSuuTap($boSuuTapId);
        } else {
            // Get all products if no category is selected
            $listSanPham = $this->modelSanPham->getAllProduct();
        }
        require_once './views/BoSuuTap.php';
    }
    public function gioiThieu()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();

        require_once './views/GioiThieu.php';
    }
    public function lienHe()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();

        require_once './views/LienHe.php';
    }
    public function tinTuc()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();

        require_once './views/TinTuc.php';
    }
    public function gioHang()
    {
        // $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        // $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        // $listSanPham = $this->modelSanPham->getAllProduct();
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            $gioHang = $this->modelGioHang->getGioHangFormUser($mail['id']);

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
            }
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    
            require_once './views/GioHang.php';
        }else {
            echo "<script>alert('You are not logged in. Please log in to add products to your cart.');</script>";
            
            header('Location: '. BASE_URL . '?act=login');
            die();
        }
    }
    public function thanhToan()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/ThanhToan.php';
    }
    public function dangNhap()
    {
        $id = $_GET['tai_khoan_id'];
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $listTaiKhoan = $this->modelSanPham->getAllTaiKhoan($id);
        require_once './views/DangNhap.php';
    }
    public function dangKy()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        require_once './views/DangKy.php';
    }
    public function chiTietSanPham()
    {
        $id = $_GET['id'];
        $listSanPham = $this->modelSanPham->getAllProduct();
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $detailSanPham = $this->modelSanPham->getDetailSanPham($id);
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        require_once './views/ChiTietSanPham.php';
    }
    public function chiTietTinTuc()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $listSanPham = $this->modelSanPham->getAllProduct();

        
        require_once './views/ChiTietTinTuc.php';
    }
    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];


            // Xử lý kiểm tra thông tin đăng nhập
            $user = $this->modelSanPham->checkLogin($email, $password);

            // var_dump($user);die;
            if ($user == $email) { // Trường hợp đăng nhập thành công
                // Lưu thông tin vào session
                $_SESSION['user_client'] = $user;
                header("Location: " . BASE_URL);
                exit();
            } else {
                // Lỗi thì lưu vào session 
                $_SESSION['erorrs'] = $user;
                // var_dump($_SESSION['erorrs']);die();
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }
    public function logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header("Location: " . BASE_URL);
        }
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SERVER['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SERVER['user_client']);
                $gioHang = $this->modelGioHang->getGioHangFormUser($mail['id']);

                if (!$gioHang) {
                    $gioHangID = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangID];
                }

                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;

                foreach($chiTietGioHang as $gioHangDetail){
                    if ($gioHangDetail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $gioHangDetail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateGioHang($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }

                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $newSoLuong);
                }

                header('Location: ' . BASE_URL . '?act=gio-hang');
                die();
            } else {
                header('Location: ' . BASE_URL . '?act=login');
            }
        }
    }
}
