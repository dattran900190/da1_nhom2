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
        //xoá khi load lại trang
        deleteSessionError();
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
            //mảng hình ảnh
            //lưu hình ảnh
            
            $file_thumb = uploadFile($hinh_anh, './admin/uploads/anhsp/');

            $img_array = $_FILES['img_array'];

            $so_luong = $_POST['so_luong'] ;
            $kich_co = $_POST['kich_co'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            

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
            if ($hinh_anh['error'] != 0) {
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

            if(empty($errors)){
                // Upload hình ảnh
               $san_pham_id = $this->modelSanPham->insertSanPham(
                    $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $file_thumb, $so_luong, $kich_co, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai
                );
                if (empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key]
                        ];
                        $link_hinh_anh = uploadFile($file, './admin/uploads/anhsp/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-san-pham');
                exit();
            }else{
                // 
                //đặt chỉ thị xoá session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-san-pham');
            }
        }
    }
    public function formEditSanPham()
    {
        $id = $_GET['id'];
        
        $sanPham = $this->modelSanPham->getDetailSanPham($id);;
        // $listSanPham = $this->modelSanPham->getDetailSanPham();
        $listAnhSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMucSanPham = $this->modelDanhMucSanPham->getAllDanhMucSanPham();
        if($sanPham){
            require_once 'views/sanpham/EditSanPham.php';
        }
        else{
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-san-pham');
        }
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

            // Xử lý upload hình ảnh mới (nếu có)
            $file_thumb = null;
            if ($hinh_anh['error'] == 0) {
                $file_thumb = uploadFile($hinh_anh, './admin/uploads/anhsp//');
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
    public function deleteSanPham($id)
    {
        $id = $_GET['id'];
        // var_dump($_GET['id']);die;
        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        
        if($sanpham){
            $this->modelSanPham->destroySanPham($id);
            deleteFile($sanpham['hinh_anh']);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-san-pham');
        exit();
    }
    public function detailSanPham(){
        $id = $_GET['id'];
        
        $sanpham = $this->modelSanPham->getDetailSanPham($id);;
        // $listSanPham = $this->modelSanPham->getDetailSanPham();
        $listAnhSanPham = $this->modelSanPham->getlistAnhSanPham($id);
        
        if($sanpham){
            require_once 'views/sanpham/DetailSanPham.php';
        }
        else{
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-san-pham');
        }
    }

}
?>