<?php

class QuanLyBannerController
{
    public $modleBanner;
    public function __construct()
    {
        $this->modleBanner = new adminBanner();
    }

    public function danhSachBanner()
    {
        $listBanner = $this->modleBanner->getAllBanner();
        require_once "./views/banner/ListBanner.php";
    }

    public function formAddBanner()
    {
        require_once './views/banner/AddBanner.php';
        deleteSessionError();
    }

    public function postAddBanner()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $link_anh = $_POST['link_anh'];
            $trang_thai = $_POST['trang_thai'];
    
            // Xử lý upload hình ảnh
            $banner_img = null;
            if (isset($_FILES['banner_img']) && $_FILES['banner_img']['error'] == 0) {
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($_FILES['banner_img']['type'], $allowedTypes)) {
                    $_SESSION['errors']['banner_img'] = 'Chỉ hỗ trợ các định dạng JPG, PNG, GIF!';
                }
                if ($_FILES['banner_img']['size'] > 5 * 1024 * 1024) { // 5MB
                    $_SESSION['errors']['banner_img'] = 'Ảnh không được quá 5MB!';
                } else {
                    // Thực hiện upload nếu không có lỗi
                    $uploadDir = PATH_UPLOAD . 'uploads/banner/';
                    $fileName = time() . '_' . $_FILES['banner_img']['name'];
                    $uploadPath = $uploadDir . $fileName;
            
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
            
                    if (move_uploaded_file($_FILES['banner_img']['tmp_name'], $uploadPath)) {
                        $banner_img = $fileName;
                    } else {
                        $_SESSION['errors']['banner_img'] = 'Không thể upload ảnh!';
                    }
                }
            } else {
                $_SESSION['errors']['banner_img'] = 'Bạn phải chọn một ảnh hợp lệ!';
            }
            
    
            // Validate các trường khác
            $errors = [];
            if (empty($link_anh)) {
                $errors['link_anh'] = 'Liên kết ảnh không được để trống!';
            }
            if (!in_array($trang_thai, ['0', '1'])) {
                $errors['trang_thai'] = 'Trạng thái không hợp lệ!';
            }
    
            $_SESSION['errors'] = $errors;
    
            if (empty($errors) && $banner_img) {
                // Nếu không có lỗi, tiến hành thêm mới
                $this->modleBanner->insertBanner( $banner_img, $link_anh, $trang_thai);
                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-banner');
                exit();
            } else {
                // Trả về form thêm nếu có lỗi
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-banner');
                exit();
            }
        }
    }
    

    public function formEditBanner()
    {
        $id = $_GET['id'];
        $banner = $this->modleBanner->getIdBanner($id);
        if ($banner) {
            # code...
            require_once './views/banner/EditBanner.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-banner');
        }
    }

    public function postEditBanner()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $id = $_POST['id'];
        $link_anh = $_POST['link_anh'];
        $trang_thai = $_POST['trang_thai'];

        // Xử lý upload hình ảnh (nếu có)
        $banner_img = null;
        if (isset($_FILES['banner_img']) && $_FILES['banner_img']['error'] == 0) {
            $uploadDir = './uploads/banner/';
            $fileName = time() . '_' . $_FILES['banner_img']['name'];
            $uploadPath = $uploadDir . $fileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($_FILES['banner_img']['tmp_name'], $uploadPath)) {
                $banner_img = $fileName;
            } else {
                $_SESSION['errors']['banner_img'] = 'Không thể upload ảnh!';
            }
        }

        // Validate các trường khác
        $errors = [];
        if (empty($link_anh)) {
            $errors['link_anh'] = 'Liên kết ảnh không được để trống!';
        }
        if (!in_array($trang_thai, ['0', '1'])) {
            $errors['trang_thai'] = 'Trạng thái không hợp lệ!';
        }

        $_SESSION['errors'] = $errors;

        if (empty($errors)) {
            // Nếu có ảnh mới, cập nhật ảnh. Nếu không, giữ nguyên ảnh cũ.
            $this->modleBanner->updateBanner($id, $banner_img, $link_anh, $trang_thai);
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-banner');
            exit();
        } else {
            $_SESSION['flash'] = true;
            header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-banner');
            exit();
        }
    }
}


    public function deleteBanner(){
        $id = $_GET['id'];
        $banner = $this->modleBanner->getIdBanner($id);
       
        if (isset($banner)) {
            $this->modleBanner->deleteBanner($id);
        }
        header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-banner');
        exit();
        
    }
}
