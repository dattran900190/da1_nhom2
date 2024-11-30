<?php
class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;
    public $modelLienHe;
    public $modelBanner;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new taiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
        $this->modelLienHe = new LienHe();
        $this->modelBanner = new Banner();
    }
    public function trangChu()
    {
        
        $listSanPham = $this->modelSanPham->getAllProduct();
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();

        
        $tongDonHang = $this->FunctionTongDonHang();

      
        require_once './views/Home.php';
    }
    public function sanPham()
    {
        // Get all categories
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();

        // Check if a category ID is passed via GET
        if (isset($_GET['danh-muc'])) {
            $danhMucId = $_GET['danh-muc'];
            // Get products by category ID
            $listSanPham = $this->modelSanPham->getSanPhamDanhMuc($danhMucId);
        } else {
            // Get all products if no category is selected
            $listSanPham = $this->modelSanPham->getAllProduct();
        }
        
        $tongDonHang = $this->FunctionTongDonHang();
        require_once './views/SanPham.php';
    }
    // public function locSanPham()
    // {
    //     // Get all categories
    //     $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
    //     $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
    //     // $listMauSanPham = $this->modelSanPham->getMauSacSanPham($mauSacId);

    //     // Check if a category ID is passed via GET
    //     // if (isset($_GET['danh-muc'])) {
    //     //     $danhMucId = $_GET['danh-muc'];
    //     //     // Get products by category ID
    //     //     $listSanPham = $this->modelSanPham->getSanPhamDanhMuc($danhMucId);
    //     // } else {
    //     //     // Get all products if no category is selected
    //     //     $listSanPham = $this->modelSanPham->getAllProduct();
    //     // }

    //     if (isset($_GET['mau-sac'])) {
    //         var_dump($_GET['mau-sac']);
    //         die();
    //         $mauSacId = $_GET['mau-sac'];
    //         $listMauSanPham = $this->modelSanPham->getMauSacSanPham($mauSacId);
    //     } else

    //         require_once './views/LocSanPham.php';
    // }
    public function boSuuTap()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
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
        $tongDonHang = $this->FunctionTongDonHang();
        require_once './views/BoSuuTap.php';
    }
    public function gioiThieu()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $tongDonHang = $this->FunctionTongDonHang();
        require_once './views/GioiThieu.php';
    }

    public function tinTuc()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $listBanner = $this->modelBanner->getAllBanner();

        $tongDonHang = $this->FunctionTongDonHang();
        require_once './views/TinTuc.php';
    }

    public function timKiem()
    {
        // Lấy danh mục và bộ sưu tập
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();

        // Lấy từ khóa tìm kiếm
        $keyword = isset($_GET['query']) ? trim($_GET['query']) : '';

        // Gọi phương thức tìm kiếm từ Model
        $sanPham = new SanPham();
        $results = $sanPham->searchSanPham($keyword);

        // Truyền kết quả qua View
        $this->renderView('TimKiemSanPham', [
            'listSanPham' => $results, // Đổi 'results' thành 'listSanPham'
            'listDanhMuc' => $listDanhMuc, // Truyền danh mục vào view
            'listBoSuuTap' => $listBoSuuTap, // Truyền bộ sưu tập vào view
            'keyword' => $keyword
        ]);
    }

    private function renderView($view, $data)
    {
        $tongDonHang = $this->FunctionTongDonHang();
        extract($data); // Chuyển các biến trong mảng $data thành các biến riêng biệt
        require_once "./views/{$view}.php"; // Load view
    }

    public function chiTietKhachHang(){

        require_once './views/ChiTietKhachHang.php';
    }

    public function doiMatKhauKhachHang(){

        require_once './views/SuaMatKhauKhachHang.php';
    }

    public function xoaTaiKhoanKhachHang(){

        require_once './views/XoaTaiKhoanKhachHang.php';
    }

    public function dangKy()
    {

        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }

    public function chiTietSanPham()
    {
        $id = $_GET['id'];
        $listSanPham = $this->modelSanPham->getAllProduct();
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $detailSanPham = $this->modelSanPham->getDetailSanPham($id);
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $listKichCo = $this->modelSanPham->getAllKichCo();

        $tongDonHang = $this->FunctionTongDonHang();
        require_once './views/ChiTietSanPham.php';
    }
    public function chiTietTinTuc()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $listSanPham = $this->modelSanPham->getAllProduct();

        $tongDonHang = $this->FunctionTongDonHang();
        require_once './views/ChiTietTinTuc.php';
    }
    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }

    public function lienHe()
    {
        $id = $_GET['id'];
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $taiKhoanId = $this->modelLienHe->getTaiKhoanUser($id);
        $tongDonHang = $this->FunctionTongDonHang();

        require_once './views/LienHe.php';
    }

    public function postAddLienHe()
    {
        if (isset($_SESSION['user_client'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Lấy dữ liệu từ form
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $chu_de_lien_he = $_POST['chu_de_lien_he'];
                $noi_dung = $_POST['noi_dung'];

                // Lấy ID tài khoản từ session
                $id_tai_khoan = $_POST['tai_khoan_id'] ?? null;


                // var_dump($id_tai_khoan);die;
                // var_dump($_SESSION['user_client']);die();
                // var_dump($_POST);die;
                // Kiểm tra dữ liệu đầu vào
                $errors = [];
                if (empty($ho_ten)) {
                    $errors['ho_ten'] = 'Họ tên không được để trống';
                }
                if (empty($email)) {
                    $errors['email'] = 'Email không được để trống';
                }
                if (empty($so_dien_thoai)) {
                    $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
                }
                if (empty($chu_de_lien_he)) {
                    $errors['chu_de_lien_he'] = 'Chủ đề liên hệ không được để trống';
                }
                if (empty($noi_dung)) {
                    $errors['noi_dung'] = 'Nội dung không được để trống';
                }
                //    var_dump($errors);die();
                // Lưu lỗi vào session (nếu có)
                $_SESSION['errors'] = $errors;

                if (empty($errors) && $id_tai_khoan !== null) {
                    // Nếu không có lỗi và có ID tài khoản
                    $result = $this->modelLienHe->insertLienHe(
                        $id_tai_khoan,  // ID of the logged-in user
                        $ho_ten,
                        $email,
                        $so_dien_thoai,
                        $chu_de_lien_he,
                        $noi_dung
                    );

                    // var_dump($result);die();

                    if ($result) {
                        // Thành công, chuyển hướng
                        // $_SESSION['flash'] = true;
                        header('Location: ' . BASE_URL . '?act=lien-he');
                        exit();
                    } else {
                        // $_SESSION['flash'];

                    }
                }
            }
        } else {
            $_SESSION['flash'] = 'Vui lòng đăng nhập trước khi gửi liên hệ!';
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];


            // Xử lý kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            // var_dump($user);die;
            if ($user && $user == $email) { // Trường hợp đăng nhập thành công
                // Lưu thông tin vào session
                // var_dump($user['email']);die();
                $_SESSION['user_client'] = $user;
                // $_SESSION['user_client_id'] = $user['id'];
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

    public function postDangKy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];


            // Kiểm tra nếu email đã tồn tại
            $existingUser = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
            if ($existingUser) {
                echo "<script>alert('Email đã tồn tại! Vui lòng thử lại.');</script>";
                header("Location: " . BASE_URL . "?act=dang-ky");
                exit();
            }


            // Thêm tài khoản mới
            $userId = $this->modelTaiKhoan->addTaiKhoan($ho_ten, $email, $mat_khau);
            if ($userId) {
                echo "<script>alert('Đăng ký thành công! Vui lòng đăng nhập.');</script>";
                header("Location: " . BASE_URL . "?act=login");
            } else {
                echo "<script>alert('Có lỗi xảy ra. Vui lòng thử lại sau.');</script>";
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_client'])) {

            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                // Lấy dữ liệu từ giỏ hàng người dùng
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

                // tạo một giỏ hàng mới nếu nó không tồn tại
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];  // gán lại id giỏ hàng
                }

                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];
                $kich_co = $_POST['kich_co'];
                $mua_ngay = $_POST['san_pham_id'];
                // var_dump($mua_ngay);die;

                $checkSP = false;

                foreach ($chiTietGioHang as $detail) {
                    // check khớp sản phẩm theo cả id và kích thước
                    if ($detail['san_pham_id'] == $san_pham_id && $detail['kich_co'] == $kich_co) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong, $kich_co);
                        $checkSP = true;
                        break;
                    }
                }


                // check = false trường hợp không thêm số lượng cho đơn hàng
                if (!$checkSP) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong, $kich_co);
                }

                header('Location: ' . BASE_URL . '?act=gio-hang');
                die();
            }
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

            header('Location: ' . BASE_URL . '?act=login');
            die();
        }
    }
    // public function capNhatSoLuong()
    // {
    //     if (isset($_SESSION['user_client'])) {
    //         $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    //         $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

    //         if ($gioHang) {
    //             $gioHangId = $gioHang['id'];
    //             $sanPhamId = $_POST['san_pham_id'];
    //             $newSoLuong = $_POST['new_so_luong'];
    //             // $newTongTien = $_POST['new_tong_tien'];
    //             // var_dump($newTongTien);die();

    //             if ($newSoLuong > 0) {
    //                 $this->modelGioHang->updateSoLuong($gioHangId, $sanPhamId, $newSoLuong);

    //                 // Save updated quantity to session
    //                 $_SESSION['cart'] = $newSoLuong;
    //             } else {
    //                 echo "<script>alert('Số lượng không được để là 0.');</script>";
    //                 header('Location: ' . BASE_URL . '?act=gio-hang');
    //                 die();
    //             }

    //             // $soLuong = $_SESSION['new_so_luong'];
    //             // var_dump($soLuong);die();

    //             // Redirect to refresh the data
    //             header('Location: ' . BASE_URL . '?act=thanh-toan');
    //             die();
    //         } else {
    //             echo "<script>alert('Cart not found.');</script>";
    //             header('Location: ' . BASE_URL . '?act=gio-hang');
    //             die();
    //         }
    //     } else {
    //         echo "<script>alert('You are not logged in. Please log in to update your cart.');</script>";
    //         header('Location: ' . BASE_URL . '?act=login');
    //         die();
    //     }
    // }

    public function gioHang()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $listSanPham = $this->modelSanPham->getAllProduct();

        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            // Lấy dữ liệu từ giỏ hàng người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId]; // gán lại id giỏ hàng
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            $tongDonHang = count($chiTietGioHang);

            require_once './views/GioHang.php';
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

            header('Location: ' . BASE_URL . '?act=login');
            die();
        }
    }

    public function deleteGioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $gioHangID = $_GET['id'];

            $chiTietGH = $this->modelGioHang->getProductGioHang($gioHangID);

            if ($chiTietGH) {
                $this->modelGioHang->deleteProductGioHang($gioHangID);
            }

            header('Location: ' . BASE_URL . '?act=gio-hang');
            die();
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

            header('Location: ' . BASE_URL . '?act=login');
            die();
        }
    }

    public function thanhToan()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        $listSanPham = $this->modelSanPham->getAllProduct();

        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            // Lấy dữ liệu từ giỏ hàng người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId]; // gán lại id giỏ hàng
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/ThanhToan.php';
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

            header('Location: ' . BASE_URL . '?act=login');
            die();
        }
    }

    // public function postThanhToan()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // var_dump($_POST);die;
    //         $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
    //         $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
    //         $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
    //         $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
    //         $ghi_chu = $_POST['ghi_chu'];
    //         $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
    //         $tong_tien = $_POST['tong_tien'];
    //         $ma_don_hang = 'DH-' . rand(1000, 9999);

    //         $ngay_dat = date('Y-m-d');
    //         $trang_thai_id = 1;

    //         // lấy tài khoản người đặt
    //         $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    //         $tai_khoan_id = $user['id'];



    //         // thêm thông tin vào dbase

    //         $donHang = $this->modelDonHang->addDonHang(
    //             $tai_khoan_id,
    //             $ten_nguoi_nhan,
    //             $email_nguoi_nhan,
    //             $sdt_nguoi_nhan,
    //             $dia_chi_nguoi_nhan,
    //             $ghi_chu,
    //             $tong_tien,
    //             $phuong_thuc_thanh_toan_id,
    //             $ngay_dat,
    //             $ma_don_hang,
    //             $trang_thai_id
    //         );


    //         // Lấy thông tin giỏ hàng của người dùng 
    //         $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);

    //         // Lưu sản phẩm vào chi tiết đơn hàng
    //         if ($donHang) {
    //             // Lấy ra toàn bộ sản phẩm trong giỏ hàng từ 
    //             $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

    //             // Thêm từng sản phẩm từ giỏ hàng vào bảng chi tiết đơn hàng
    //             foreach ($chiTietGioHang as $sanpham) {
    //                 $donGia = $sanpham['gia_khuyen_mai'] ?? $sanpham['gia_san_pham']; // Ưu tiên đơn giá sẽ lấy giá khuyến mãi

    //                 $this->modelDonHang->addChiTietDonHang(
    //                     $donHang, // $donHang trả ra id khi return lastInsertId 
    //                     $sanpham['id'],
    //                     $donGia,
    //                     $sanpham['so_luong'],
    //                     $donGia * $sanpham['so_luong']
    //                 );
    //             }

    //             // Sau khi thêm xong phải xoá sản phẩm trong giỏ hàng đi
    //             // Xoá toàn bộ sản phẩm trong chi tiết giỏ hàng
    //             $this->modelGioHang->deleteDetailGioHang($gioHang['id']);

    //             // Xoá thông tin giỏ hàng người dùng
    //             $this->modelGioHang->deleteGioHang($tai_khoan_id);

    //             // Chuyển hướng lịch sử mua hàng
    //             header('Location: ' . BASE_URL . '?act=lich-su-mua-hang');
    //             exit();
    //         } else {
    //             var_dump('lỗi'); // làm trang thông báo lỗi giỏ hàng
    //             die;
    //         }
    //     }
    // }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST["ten_nguoi_nhan"];
            $email_nguoi_nhan = $_POST["email_nguoi_nhan"];
            $sdt_nguoi_nhan = $_POST["sdt_nguoi_nhan"];
            $dia_chi_nguoi_nhan = $_POST["dia_chi_nguoi_nhan"];
            $ghi_chu = $_POST["ghi_chu"];
            $tong_tien = $_POST["tong_tien"];
            $phuong_thuc_thanh_toan_id = $_POST["phuong_thuc_thanh_toan_id"];

            $ngay_dat =  date('Y-m-d');
            $trang_thai_id = 1;
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = 'DH-' . rand(1000, 9999);

            // Thêm thông tin vào db

            $donHang = $this->modelDonHang->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );
            // Lấy thông tin giỏ hàng của người dùng
            $gioHang = $this->modelGioHang->getGiohangFromUser($tai_khoan_id);

            // Lưu sản phẩm vào chi tiết đơn hàng
            if ($donHang) {
                $chiTietGioHang = $this->modelGioHang->getDetailGiohang($gioHang['id']);
                // Thêm từng sản phẩm từ giỏ hàng vào bảng chi tiết đơn hàng
                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];

                    $this->modelDonHang->addChiTietDonHang(
                        $donHang, //ID Đơn hàng vừa tạo
                        $item['san_pham_id'], // ID sản phẩm
                        $donGia, // Đơn giá láy được từ sản phẩm
                        $item['so_luong'], // Số lượng 
                        $donGia * $item['so_luong'] // Thành tiền

                    );
                }

                // Sau khi thêm xong phải xoá sản phẩm trong giỏ hàng đi
                // Xoá toàn bộ sản phẩm trong chi tiết giỏ hàng
                $this->modelGioHang->deleteDetailGioHang($gioHang['id']);

                // Xoá thông tin giỏ hàng người dùng
                $this->modelGioHang->deleteGioHang($tai_khoan_id);

                // chuyển hướng về trang lịch sử mua hàng
                header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
                exit;
            } else {
                var_dump("Lỗi đặt hàng. Vui lòng thử lại sau");
                die;
            }
        }
    }

    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
            $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
            // Lấy ra thông tin đăng nhập để lấy ra id tài khoản để lọc ra được đơn hàng theo id đó
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            // Lấy ra danh sách trạng thái đơn hàng
            $allTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
            $trangThaiDonHang = array_column($allTrangThaiDonHang, 'ten_trang_thai', 'id'); //array_column hàm tìm trong mảng liên hợp lấy ra all giá trị của các trường 

            // Lấy ra danh sách trạng thái thanh toán
            $allPhuongThucThanhToan = $this->modelDonHang->getAllPhuongThucThanhToanDonHang();
            $phuongThucThanhToan = array_column($allPhuongThucThanhToan, 'ten_phuong_thuc', 'id'); //array_column hàm tìm trong mảng liên hợp lấy ra all giá trị của các trường 

            // Lấy ra danh sách tất cả đơn hàng của tài khoản
            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            // echo '<pre>';
            // print_r($trangThaiDonHang);die();


            require_once './views/LichSuMuaHang.php';
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

            header('Location: ' . BASE_URL . '?act=login');
            die();
        }
    }
    // public function chiTietMuaHang()
    // {
    //     if (isset($_SESSION['user_client'])) {
    //         // Lấy ra thông tin đăng nhập để lấy ra id tài khoản để lọc ra được đơn hàng theo id đó
    //         $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    //         $tai_khoan_id = $user['id'];

    //         // Lấy id đơn hàng trên url 
    //         $donHangID = $_GET['id'];

    //         // Lấy ra danh sách trạng thái đơn hàng
    //         $allTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
    //         $trangThaiDonHang = array_column($allTrangThaiDonHang, 'ten_trang_thai', 'id'); //array_column hàm tìm trong mảng liên hợp lấy ra all giá trị của các trường 

    //         // Lấy ra danh sách trạng thái thanh toán
    //         $allPhuongThucThanhToan = $this->modelDonHang->getAllPhuongThucThanhToanDonHang();
    //         $phuongThucThanhToan = array_column($allPhuongThucThanhToan, 'ten_phuong_thuc', 'id'); //array_column hàm tìm trong mảng liên hợp lấy ra all giá trị của các trường 

    //         // Lấy ra thông tin đơn hàng theo id
    //         $donHang = $this->modelDonHang->getDonHangId($donHangID);

    //         // Lấy thông tin sản phẩm cảu đơn hàng trong bảng chi tiết đơn hàng
    //         $chiTietDonHang = $this->modelDonHang->getChiTietDonHangById($donHangID);
    //         // var_dump($chiTietDonHang);die();

    //         // check trường hợp điển id trên url 
    //         if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
    //             echo 'Bạn không có quyền truy cập đơn hàng này';
    //             exit();
    //         }

    //         require_once './views/ChiTietMuaHang.php';
    //     } else {
    //         $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

    //         header('Location: ' . BASE_URL . '?act=login');
    //         die();
    //     }
    // }

    public function chiTietMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
            $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
            // Lấy thông tin tài khoảng đăng nhập
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];
            // Lấy id đơn truyền từ URL
            $donHangId = $_GET['id'];

            // Lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
            // Lấy ra danh sách phương thức thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan  = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // Lấy ra thông tin đơn hàng theo ID
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            // Lấy thông tin sản phẩm của đơn hàng trong bảng chi tiết đơn hàng
            $chiTietDonHang =  $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);
            // echo "<pre>";
            // print_r($donHang);
            // print_r($chiTietDonHang);

            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền hủy đơn hàng này";
                exit;
            }
            require_once "./views/chiTietMuaHang.php";
        } else {
            var_dump('Bạn chưa đăng nhập');
            die;
        }
    }
    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            // Lấy ra thông tin đăng nhập để lấy ra id tài khoản để lọc ra được đơn hàng theo id đó
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            // Lấy id đơn hàng trên url 
            $donHangID = $_GET['id'];

            // Kiểm tra đơn hàng
            $donHang = $this->modelDonHang->getDonHangId($donHangID);
            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo 'Bạn không có quyền huỷ đơn hàng này';
                exit();
            }
            if ($donHang['trang_thai_id'] != 1) {
                echo 'Chỉ đơn hàng ở trạng thái "Chưa xác nhận" mới có thể huỷ';
                exit();
            }

            // Huỷ đơn hàng
            $this->modelDonHang->updateTrangThaiDonHang($donHangID, 11);

            header('Location: ' . BASE_URL . '?act=lich-su-mua-hang');
            exit();
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

            header('Location: ' . BASE_URL . '?act=login');
            die();
        }
    }

    public function FunctionTongDonHang() {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            // Get the user's cart data
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId]; // Assign new cart ID
            }

            // Get the details of the cart (list of products)
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            // Return the total number of orders (distinct items in the cart)
            return count($chiTietGioHang);
        }
    }
}
