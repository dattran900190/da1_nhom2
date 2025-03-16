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
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();

        if (isset($_GET['danh-muc'])) {
            $danhMucId = $_GET['danh-muc'];
            $listSanPham = $this->modelSanPham->getSanPhamDanhMuc($danhMucId);
        } else {
            $listSanPham = $this->modelSanPham->getAllProduct();
        }

        $tongDonHang = $this->FunctionTongDonHang();
        require_once './views/SanPham.php';
    }

    public function boSuuTap()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();

        if (isset($_GET['bo-suu-tap'])) {
            $boSuuTapId = $_GET['bo-suu-tap'];
            $listSanPham = $this->modelSanPham->getSanPhamBoSuuTap($boSuuTapId);
        } else {
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

    public function chiTietKhachHang()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();

        $email = $_SESSION['user_client'];
        $listTaiKhoan = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
        // var_dump($listTaiKhoan);die();
        require_once './views/ChiTietKhachHang.php';
    }
    public function doiMatKhauKhachHang()
    {

        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();

        $email = $_SESSION['user_client'];
        $listTaiKhoan = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_client'])) {
            $mat_khau = $_POST['mat_khau'];
            $mat_khau_moi = $_POST['mat_khau_moi'];
            $nhap_lai_mat_khau = $_POST['nhap_lai_mat_khau'];
            $id = $_POST['id'];

            $errors = [];
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu cũ không được để trống';
            } elseif (!password_verify($mat_khau, $listTaiKhoan['mat_khau'])) { // Kiểm tra mật khẩu cũ
                $errors['mat_khau'] = 'Mật khẩu cũ không chính xác';
            }
            if (empty($mat_khau_moi)) {
                $errors['mat_khau_moi'] = 'Mật khẩu mới không được để trống';
            } elseif ($mat_khau_moi != $nhap_lai_mat_khau) {
                $errors['nhap_lai_mat_khau'] = 'Nhập lại mật khẩu không khớp';
            }
            $_SESSION['errors'] = $errors;
            if (empty($errors)) {
                // Nếu không có lỗi, cập nhật mật khẩu mới
                $this->modelTaiKhoan->updateMatKhau($id, $mat_khau_moi);

                $_SESSION['success'] = 'Đổi mật khẩu thành công.';
                header('Location: ' . BASE_URL . '?act=doi-mat-khau-khach-hang');
                exit();
            }
        }
        require_once './views/SuaMatKhauKhachHang.php';
    }


    public function xoaTaiKhoanKhachHang()
    {

        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();


        $email = $_SESSION['user_client'];
        $listTaiKhoan = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_client'])) {
            $id = $_POST['id'];

            // Xóa tài khoản
            $success = $this->modelTaiKhoan->deleteTaiKhoan($id);
            if ($success) {
                // Xóa session và chuyển hướng
                unset($_SESSION['user_client']);
                session_destroy();

                header('Location: ' . BASE_URL . '?act=thong-bao-tai-khoan-da-xoa'); // Chuyển hướng
                exit();
            } else {
                echo "Có lỗi xảy ra khi xóa tài khoản.";
            }
        }

        require_once './views/XoaTaiKhoanKhachHang.php';
    }
    public function xoaTaiKhoanKhachHangThongBao()
    {

        require_once './views/XoaTaiKhoanKhachHangThongBao.php';
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
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

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


    public function guiBinhLuan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_SESSION['user_client'])) {
            // Lấy ra dl
            // var_dump($_SESSION['user_client']);die();
            // var_dump($_POST);die();

            $tai_khoan_id = $_SESSION['user_client_id'];
            $noi_dung = $_POST['noi_dung'] ?? '';
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // var_dump($san_pham_id);die();
            $ngay_dang = date('Y-m-d H:i:s');
            $status = $this->modelTaiKhoan->binhLuan($tai_khoan_id, $san_pham_id, $noi_dung, $ngay_dang);
            if ($status) {
                // Gửi bình luận thành công
                $_SESSION['success_message'] = 'Bình luận của bạn đã được gửi thành công!';
            } else {
                // Gửi bình luận thất bại
                $_SESSION['error_message'] = 'Có lỗi xảy ra. Vui lòng thử lại.';
            }
            // var_dump($status);die();
            // var_dump($status);die();
            header('Location:' . BASE_URL . '?act=chi-tiet-san-pham&id=' . $san_pham_id);
            exit();
        }
    }

    public function suaKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_SESSION['user_client'])) {
            // Lấy dữ liệu
            $id = $_POST['id'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;

            // var_dump($_POST);die;


            // Validate 
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh không được để trống';
            }
            // if ($anh_dai_dien['error'] !== 0) {
            //     $errors['anh_dai_dien'] = 'Ảnh phải chọn';
            // }

            $_SESSION['errors'] = $errors;

            $taiKhoanOld = $this->modelTaiKhoan->getIdTaiKhoan($id);
            $old_file = $taiKhoanOld['anh_dai_dien'];

            if (isset($anh_dai_dien) && $anh_dai_dien['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($anh_dai_dien, './uploads/anhkhachhang/');
                // var_dump($new_file);die;
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục

                $this->modelTaiKhoan->updatekhachHang($id, $ho_ten, $email, $so_dien_thoai, $gioi_tinh, $ngay_sinh, $new_file);

                $_SESSION['success'] = 'Cập nhật thông tin thành công.';

                header('Location: ' . BASE_URL . '?act=chi-tiet-khach-hang');
                exit();
            } else {
                // Trả vẻ form và lỗi
                $boSuuTap = [
                    'id' => $id,
                    'ho_ten' => $ho_ten,
                    'email' => $email,
                    'so_dien_thoai' => $so_dien_thoai,
                    'gioi_tinh' => $gioi_tinh,
                    'ngay_sinh' => $ngay_sinh,
                    'anh_dai_dien' => $anh_dai_dien

                ];
                header('Location: ' . BASE_URL . '?act=chi-tiet-khach-hang');
                exit();
            }
        }
    }

    public function lienHe()
    {
        // $id = $_GET['id'];
        $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
        $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
        // $taiKhoanId = $this->modelLienHe->getTaiKhoanUser($id);
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
                $tai_khoan_id = $_SESSION['user_client_id'];
                // var_dump($tai_khoan_id);die;
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

                // Lưu lỗi vào session (nếu có)
                $_SESSION['errors'] = $errors;

                if (empty($errors) && $tai_khoan_id !== null) {
                    // Nếu không có lỗi và có ID tài khoản
                    $result = $this->modelLienHe->insertLienHe(
                        $tai_khoan_id,
                        $ho_ten,
                        $email,
                        $so_dien_thoai,
                        $chu_de_lien_he,
                        $noi_dung
                    );

                    if ($result) {
                        // Thành công, chuyển hướng
                        // $_SESSION['flash'] = 'Thêm liên hệ thành công!';
                        $_SESSION['success_message'] = 'Gửi liên hệ thành công!';
                        header('Location: ' . BASE_URL . '?act=lien-he');
                        exit();
                    } else {
                        // $_SESSION['flash'];
                        header('Location: ' . BASE_URL . '?act=lien-he');
                        exit();
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

            if (is_array($user)) { // Đăng nhập thành công
                // Lưu riêng email và ID vào session
                $_SESSION['user_client'] = $user['email'];
                $_SESSION['user_client_id'] = $user['id'];

                // var_dump($_SESSION['user_client'], $_SESSION['user_client_id']); 
                // die;

                header("Location: " . BASE_URL);
                exit();
            } else {
                // Lỗi thì lưu vào session
                $_SESSION['errors'] = $user;
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }


        public function dangKy()
    {

        require_once './views/auth/formRegister.php';
        deleteSessionError();
        exit();
    }

    public function postDangKy()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];


            $existingUser = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
            if ($existingUser) {
                echo "<script>
                alert('Email đã tồn tại! Vui lòng thử lại.');
                window.history.back();
            </script>";
                exit();
            }



            $userId = $this->modelTaiKhoan->addTaiKhoan($ho_ten, $email, $mat_khau);
            if ($userId) {

                $_SESSION['user_client'] = true;
                $_SESSION['user_client_id'] = $userId;

                echo "<script>alert('Đăng ký thành công! Vui lòng đăng nhập.');</script>";
                header("Location: " . BASE_URL . "?act=login");
                exit();
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

                header('Location: ' . BASE_URL . '?act=chi-tiet-san-pham&id=' . $san_pham_id);
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

            if (empty($chiTietGioHang)) {
                // Nếu giỏ hàng không có sản phẩm, hiển thị thông báo alert và dừng tiếp tục
                echo '<script type="text/javascript">
                    alert("Giỏ hàng của bạn hiện tại không có sản phẩm nào. Vui lòng thêm sản phẩm vào giỏ hàng để thanh toán.");
                    window.location.href = " ./"; 
                  </script>';
                die;
            }

            require_once './views/ThanhToan.php';
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhâp.';

            header('Location: ' . BASE_URL . '?act=login');
            die();
        }
    }


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
    
            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
    
            $ma_don_hang = 'DH-' . rand(1000, 9999);
    
            // Thanh toán online (Redirect flow for VNPay)
            if ($phuong_thuc_thanh_toan_id == 2) {
                // Cấu hình VNPay
                $vnp_TmnCode = '84OESO6O'; // Mã Terminal từ VNPay Sandbox
                $vnp_HashSecret = '6G3CEOJP0X8B7IVVEHH13OSX7YHKHRG9'; // Chuỗi bí mật
                $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html'; // URL thanh toán Sandbox
                $vnp_ReturnUrl = BASE_URL . '?act=vnpay-return';
    
                $vnp_TxnRef = time(); // Mã đơn hàng (duy nhất)
                $vnp_OrderInfo = "Thanh toán đơn hàng";
                $vnp_OrderType = "billpayment";
                $vnp_Amount = $tong_tien * 100; // Số tiền (VNĐ, nhân 100 lần)
                $vnp_Locale = "vn";
                $vnp_BankCode = "";
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                $vnp_CreateDate = date('YmdHis');
                $vnp_ExpireDate = date('YmdHis', strtotime('+30 minutes'));
    
                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => $vnp_CreateDate,
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_ReturnUrl,
                    "vnp_TxnRef" => $vnp_TxnRef,
                    "vnp_ExpireDate" => $vnp_ExpireDate
                );
    
                ksort($inputData);
                $hashdata = urldecode(http_build_query($inputData));
                $vnp_SecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                $vnp_Url .= '?' . http_build_query($inputData) . '&vnp_SecureHash=' . $vnp_SecureHash;
    
                header("Location: " . $vnp_Url);
                exit();
            }
    
            // Thanh toán bằng QR VNPay (New flow for QR payments)
            elseif ($phuong_thuc_thanh_toan_id == 3) { // Assuming 3 is the ID for VNPay QR payment
                // Cấu hình VNPay QR
                $vnp_TmnCode = '84OESO6O'; // Mã Terminal từ VNPay Sandbox
                $vnp_HashSecret = '6G3CEOJP0X8B7IVVEHH13OSX7YHKHRG9'; // Chuỗi bí mật
                $vnp_QrUrl = 'https://sandbox.vnpayment.vn/qrpay/v2/qr/create'; // VNPay QR API URL (Sandbox)
                $vnp_ReturnUrl = BASE_URL . '?act=vnpay-return';
    
                $vnp_TxnRef = time(); // Mã đơn hàng (duy nhất)
                $vnp_OrderInfo = "Thanh toán đơn hàng bằng QR";
                $vnp_Amount = $tong_tien * 100; // Số tiền (VNĐ, nhân 100 lần)
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                $vnp_CreateDate = date('YmdHis');
                $vnp_ExpireDate = date('YmdHis', strtotime('+30 minutes'));
    
                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => $vnp_CreateDate,
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_TxnRef" => $vnp_TxnRef,
                    "vnp_ExpireDate" => $vnp_ExpireDate,
                    "vnp_ReturnUrl" => $vnp_ReturnUrl
                );
    
                ksort($inputData);
                $hashdata = urldecode(http_build_query($inputData));
                $vnp_SecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    
                // Make API request to generate QR code
                $vnp_QrUrl .= '?' . http_build_query($inputData) . '&vnp_SecureHash=' . $vnp_SecureHash;
    
                // Use cURL to call the VNPay QR API
                $ch = curl_init($vnp_QrUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                $response = curl_exec($ch);
                curl_close($ch);
    
                // Decode the response
                $responseData = json_decode($response, true);
    
                if ($responseData && isset($responseData['code']) && $responseData['code'] == '00') {
                    // QR code generation successful, get the QR code URL
                    $qrCodeUrl = $responseData['data']['qrCodeUrl'];
    
                    // Store order details in the database (similar to the redirect flow)
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
    
                    if ($donHang) {
                        // Process cart items and update inventory (same as your existing code)
                        $gioHang = $this->modelGioHang->getGiohangFromUser($tai_khoan_id);
                        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    
                        foreach ($chiTietGioHang as $item) {
                            $donGia = $item['gia_khuyen_mai'] != 0 ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                            $kichCo = $item['ten_kich_co'];
    
                            $this->modelDonHang->addChiTietDonHang(
                                $donHang,
                                $item['san_pham_id'],
                                $donGia,
                                $item['so_luong'],
                                $kichCo,
                                $donGia * $item['so_luong']
                            );
    
                            $soLuongHienTai = $this->modelSanPham->getSoLuong($item['san_pham_id']);
                            if ($soLuongHienTai < $item['so_luong']) {
                                var_dump("Không đủ số lượng trong kho sản phẩm: " . $item['ten_san_pham']);
                                die();
                            }
    
                            $capNhatSoLuong = $this->modelSanPham->giamSoLuong($item['san_pham_id'], $item['so_luong']);
                            if (!$capNhatSoLuong) {
                                var_dump("Không cập nhật được kho cho sản phẩm: " . $item['ten_san_pham']);
                                die();
                            }
                        }
    
                        // Clear the cart
                        $this->modelGioHang->deleteDetailGioHang($gioHang['id']);
                        $this->modelGioHang->deleteGioHang($tai_khoan_id);
    
                        // Redirect to a page to display the QR code
                        header("Location: " . BASE_URL . '?act=show-qr&qr_url=' . urlencode($qrCodeUrl) . '&order_id=' . $donHang);
                        exit();
                    } else {
                        var_dump("Lỗi đặt hàng. Vui lòng thử lại sau");
                        die();
                    }
                } else {
                    // Handle QR generation error
                    var_dump("Lỗi tạo mã QR: " . $responseData['message']);
                    die();
                }
            }
    
            // Existing logic for other payment methods
            else {
                // Handle other payment methods (e.g., COD)
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
    
                if ($donHang) {
                    $gioHang = $this->modelGioHang->getGiohangFromUser($tai_khoan_id);
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    
                    foreach ($chiTietGioHang as $item) {
                        $donGia = $item['gia_khuyen_mai'] != 0 ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                        $kichCo = $item['ten_kich_co'];
    
                        $this->modelDonHang->addChiTietDonHang(
                            $donHang,
                            $item['san_pham_id'],
                            $donGia,
                            $item['so_luong'],
                            $kichCo,
                            $donGia * $item['so_luong']
                        );
    
                        $soLuongHienTai = $this->modelSanPham->getSoLuong($item['san_pham_id']);
                        if ($soLuongHienTai < $item['so_luong']) {
                            var_dump("Không đủ số lượng trong kho sản phẩm: " . $item['ten_san_pham']);
                            die();
                        }
    
                        $capNhatSoLuong = $this->modelSanPham->giamSoLuong($item['san_pham_id'], $item['so_luong']);
                        if (!$capNhatSoLuong) {
                            var_dump("Không cập nhật được kho cho sản phẩm: " . $item['ten_san_pham']);
                            die();
                        }
                    }
    
                    $this->modelGioHang->deleteDetailGioHang($gioHang['id']);
                    $this->modelGioHang->deleteGioHang($tai_khoan_id);
    
                    header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
                    exit();
                } else {
                    var_dump("Lỗi đặt hàng. Vui lòng thử lại sau");
                    die();
                }
            }
        }
    }
    public function showQr()
    {
        if (isset($_GET['qr_url']) && isset($_GET['order_id'])) {
            $qrCodeUrl = urldecode($_GET['qr_url']);
            $orderId = $_GET['order_id'];
    
            // Render a view to display the QR code
            include_once 'views/qr_payment.php';
        } else {
            var_dump("Thiếu thông tin QR code hoặc mã đơn hàng");
            die();
        }
    }

    public function checkPaymentStatus()
{
    if (isset($_GET['order_id'])) {
        $orderId = $_GET['order_id'];
        $order = $this->modelDonHang->getDonHangById($orderId);

        if ($order && $order['trang_thai_id'] == 2) { // Assuming 2 means "paid"
            echo json_encode(['status' => 'paid']);
        } else {
            echo json_encode(['status' => 'pending']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing order ID']);
    }
    exit();
}

    public function handleVNPayReturn()
    {

        // Debug: In ra toàn bộ dữ liệu GET từ VNPay

        $vnp_HashSecret = '6G3CEOJP0X8B7IVVEHH13OSX7YHKHRG9'; // Secret key của bạn
        $inputData = $_GET;

        // Lấy thông tin mã bảo mật từ VNPay
        $secureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);

        // Sắp xếp mảng dữ liệu theo key để tạo chuỗi hash
        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= $key . "=" . $value . "&";
        }
        $hashData = rtrim($hashData, "&");
        $generatedHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        


        if ($generatedHash == $secureHash) {
            if ($inputData['vnp_ResponseCode'] == '00') {
                // Thanh toán thành công
                $message = "Thanh toán thành công! Mã đơn hàng: " . $inputData['vnp_TxnRef'];

                // Cập nhật trạng thái đơn hàng vào database
                $this->modelDonHang->updateTrangThaiDonHang($inputData['vnp_TxnRef'], 2); // 2 = Đã thanh toán
            } else {
                // Thanh toán thất bại
                $message = "Thanh toán thất bại! Mã lỗi: " . $inputData['vnp_ResponseCode'];
            }
        } else {
            $message = "Chữ ký không hợp lệ!";
        }

        // Hiển thị thông báo cho người dùng
        echo "<script>alert('$message'); window.location.href = '" . BASE_URL . "?act=lich-su-mua-hang';</script>";
    }

    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
            $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
            $tongDonHang = $this->FunctionTongDonHang();

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


    public function chiTietMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $listDanhMuc = $this->modelSanPham->getAllDanhMucSanPham();
            $listBoSuuTap = $this->modelSanPham->getAllBoSuuTap();
            $tongDonHang = $this->FunctionTongDonHang();
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
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $donHangID = $_GET['id'];
            $donHang = $this->modelSanPham->getDonHangId($donHangID);

            try {
                // Cập nhật trạng thái đơn hàng thành "Đã hủy" (11 = Đã hủy)
                $this->modelDonHang->updateTrangThaiDonHang($donHangID, 11);

                // Hoàn trả số lượng sản phẩm vào kho
                foreach ($donHang as $product) {

                    $this->modelSanPham->tangSoLuong($product['san_pham_id'], $product['so_luong']);
                }

                // Chuyển hướng về lịch sử mua hàng
                header('Location: ' . BASE_URL . '?act=lich-su-mua-hang');
                exit();
            } catch (Exception $e) {
                echo "Lỗi khi hủy đơn hàng: " . $e->getMessage();
                exit();
            }
        } else {
            $_SESSION['message'] = 'Bạn chưa đăng nhập.';
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }




    public function FunctionTongDonHang()
    {
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
