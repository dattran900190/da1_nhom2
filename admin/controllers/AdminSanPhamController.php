<?php
class AdminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMucSanPham;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMucSanPham = new adminDanhMucSanPham();
    }
    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once 'views/sanpham/ListSanPham.php';
    }

    public function AddSanPham()
    {
        $listDanhMucSanPham = $this->modelDanhMucSanPham->getAllDanhMucSanPham();

        require_once 'views/sanpham/AddSanPham.php';
    }
    public function postAddSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $hinh_anh = $_FILES['hinh_anh'];
            $so_luong = $_POST['so_luong'];
            $kich_co = $_POST['kich_co'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            


            // Upload hình ảnh
            $file_thumb = uploadFile($hinh_anh, './uploads/');
            // Validate 
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }
            if (empty($hinh_anh)) {
                $errors['hinh_anh'] = 'Hình ảnh có cũng được không có cung được';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được để trống';
            }
            if (empty($kich_co)) {
                $errors['kich_co'] = 'Kích cỡ  phải có';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Hãy cho ngày tháng vào';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả có cũng được không có cũng không sao';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái phải chọn';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm sản phẩm

                $this->modelSanPham->insertSanPham(
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $hinh_anh,
                    $so_luong,
                    $kich_co,
                    $ngay_nhap,
                    $mo_ta,
                    $danh_muc_id,
                    $trang_thai
                    
                );

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Trả vẻ form và lỗi
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }
    public function formEditSanPham()
    {
        $id = $_GET['id'];
        $sanPham = $this->modelSanPham->getSanPham($id);
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once 'views/sanpham/EditSanPham.php';
    }
    public function postEditSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $id = $_POST['id'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $hinh_anh = $_FILES['hinh_anh'];
            $so_luong = $_POST['so_luong'];
            $kich_co = $_POST['kich_co'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            


            $hinh_anh = $_FILES['hinh_anh'];

        // Xử lý upload hình ảnh mới (nếu có)
        $file_thumb = null;
        if ($hinh_anh['error'] == 0) {
            $file_thumb = uploadFile($hinh_anh, './uploads/');
        }

        // Xử lý cập nhật dữ liệu
        $result = $this->modelSanPham->updateSanPham(
            $id, 
            $ten_san_pham,
            $gia_san_pham,
            $gia_khuyen_mai,
            $file_thumb, // Lưu ảnh mới nếu có, nếu không giữ nguyên
            $so_luong,
            $kich_co,
            $ngay_nhap,
            $mo_ta,
            $danh_muc_id,
            $trang_thai
        );

        // Kiểm tra kết quả cập nhật
        if ($result) {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-san-pham');
            exit();
        } else {
            $_SESSION['errors']['general'] = 'Không thể cập nhật sản phẩm.';
            header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-san-pham&id=' . $id);
            exit();
        }
        }
    }
    public function deleteSanPham()
{
    // Lấy ID sản phẩm từ query string
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Gọi model để xóa sản phẩm
        $result = $this->modelSanPham->deleteSanPham($id);

        // Kiểm tra kết quả
        if ($result) {
            $_SESSION['success'] = "Xóa sản phẩm thành công!";
        } else {
            $_SESSION['error'] = "Xóa sản phẩm thất bại!";
        }
    } else {
        $_SESSION['error'] = "ID sản phẩm không hợp lệ!";
    }

    // Chuyển hướng về trang quản lý sản phẩm
    header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-san-pham');
    exit();
}

}
?>