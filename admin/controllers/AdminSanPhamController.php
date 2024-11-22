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


/*************  ✨ Codeium Command ⭐  *************/
/******  a36e1c21-aea5-4f42-8c0e-b1e317c747ef  *******/
    public function AddSanPham()
    {
        $listDanhMucSanPham = $this->modelDanhMucSanPham->getAllDanhMucSanPham();
        //xoá khi load lại trang
        deleteSessionError();
        require_once 'views/sanpham/AddSanPham.php';
    }


    public function formAddSanPham(){
        $listDanhMucSanPham = $this->modelDanhMucSanPham->getAllDanhMucSanPham();


        require_once 'views/sanpham/AddSanPham.php';


        deleteSessionError();
    }




    public function postAddSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $kich_co = $_POST['kich_co'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $file_thumb = uploadFile($hinh_anh, './admin/uploads/anhsp/');
            $img_array = $_FILES['img_array'];
            $errors = [];
           
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Ten san pham khong duoc de trong';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Gia san pham khong duoc de trong';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Gia khuyen mai khong duoc de trong';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'So luong khong duoc de trong';
            }
            if (empty($kich_co)) {
                $errors['kich_co'] = 'kich co khong duoc de trong';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngay nhap khong duoc de trong';
            }
           
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trang thai khong duoc de trong';
            }
            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'hình ảnh phải có';
            }


           


            $_SESSION['errors'] = $errors;


            if(empty($errors)){
                $san_pham_id = $this->modelSanPham->insertSanPham(
                    $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $file_thumb, $so_luong, $kich_co, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai
                );
                //xư lí thêm album
                if(!empty($img_array['name'])){
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
            }else{
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
       
    }
    public function formEditSanPham()
    {
        $id = $_GET['id'];
       
        $sanPham = $this->modelSanPham->getDetailSanPham($id);;


        $listSanPham = $this->modelSanPham->getListAnhSanPham($id);


        $listDanhMucSanPham = $this->modelDanhMucSanPham->getAllDanhMucSanPham();


        if($sanPham){
            require_once 'views/sanpham/EditSanPham.php';
            deleteSessionError();
        }
        else{
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-san-pham');
        }
    }
    public function postEditSanPham()
    {
       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['id'] ?? '';
            //truy vấn
            $sanphamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanphamOld['hinh_anh'];//lấy ảnh cũ để sửa ảnh
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $kich_co = $_POST['kich_co'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Ten san pham khong duoc de trong';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Gia san pham khong duoc de trong';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'So luong khong duoc de trong';
            }
            if (empty($kich_co)) {
                $errors['kich_co'] = 'kich co khong duoc de trong';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngay nhap khong duoc de trong';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trang thai khong duoc de trong';
            }
            // if ($hinh_anh['error'] !== 0) {
            //     $errors['hinh_anh'] = 'hình ảnh phải có';
            // }
            $_SESSION[ 'errors'] = $errors;
            // var_dump($errors);
            // die;


            if(isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK){
                $new_file = uploadFile($hinh_anh, './admin/uploads/anhsp/');
                // var_dump($new_file);
                if (!empty($old_file) && !empty($new_file)) {
                    // Nếu có cả ảnh cũ và ảnh mới thì lấy ảnh mới
                    $new_file = $new_file;
                } elseif (!empty($old_file) && empty($new_file)) {
                    // Nếu có ảnh cũ và không có ảnh mới thì lấy ảnh cũ
                    $new_file = $old_file;
                } elseif (empty($old_file) && !empty($new_file)) {
                    // Nếu không có ảnh cũ và có ảnh mới thì lấy ảnh mới
                    $new_file = $new_file;
                } else {
                    // Nếu cả ảnh cũ và ảnh mới đều không có thì giữ nguyên
                    $new_file = null;
                }


                // var_dump($new_file);
                // die;
                //
            }
           
           
            if(empty($errors)){
               
                $this->modelSanPham->updateSanPham(
                    $san_pham_id,
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $new_file,
                    $so_luong,
                    $kich_co,
                    $ngay_nhap,
                    $mo_ta,
                    $danh_muc_id,
                    $trang_thai
                );
               
                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-san-pham');
            }else{
               
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-san-pham&id='.$san_pham_id);
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
