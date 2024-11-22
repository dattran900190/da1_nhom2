<?php

class QuanLyTinTucController
{
    public $modleTinTuc;
    public function __construct()
    {
        $this->modleTinTuc = new adminTinTuc();
    }

    public function danhSachTinTuc()
    {
        $listTinTuc = $this->modleTinTuc->getAllTinTuc();
        require_once "./views/tinTuc/ListTinTuc.php";
    }


    function showTinTuc($id) {
        $tinTuc = $this->modleTinTuc->showTinTuc($id);

        
       
        require_once "./views/tinTuc/ShowTinTuc.php";

    }

    public function formAddTinTuc()
    {
        require_once './views/tinTuc/AddTinTuc.php';
        deleteSessionError();
    }

    public function postAddTinTuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $id = $_POST['id'];
            $tieu_de = $_POST['tieu_de'];
            $mo_ta = $_POST['mo_ta'];
            $noi_dung = $_POST['noi_dung'];
            $tac_gia_id = $_POST['tac_gia_id'];
            $ngay_dang = $_POST['ngay_dang'];
            $ngay_cap_nhat = $_POST['ngay_cap_nhat'];

            // Validate 
            $errors = [];
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Tiêu đề không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Tiêu đề không được để trống';
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Nội dung không được để trống';
            }
            if (empty($tac_gia_id)) {
                $errors['tac_gia_id'] = 'Id tác giả không được để trống';
            }
            if (empty($ngay_dang)) {
                $errors['ngay_dang'] = 'Ngày đăng không được để trống';
            }
            if (empty($ngay_cap_nhat)) {
                $errors['ngay_cap_nhat'] = 'Ngày cập nhật không được để trống';
            }
            

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modleTinTuc->insertTinTuc($id,$tieu_de,$mo_ta, $noi_dung, $tac_gia_id, $ngay_dang, $ngay_cap_nhat);

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-tin-tuc');
                exit();
            } else {
                $_SESSION['flash'] = true;
                // Trả vẻ form và lỗi
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-tin-tuc');
                exit();
            }
        }
    }

    public function formEditTinTuc()
    {
        $id = $_GET['id'];
        $tinTuc = $this->modleTinTuc->getIdTinTuc($id);
        if ($tinTuc) {
            # code...
            require_once './views/tinTuc/EditTinTuc.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-tin-tuc');
        }
    }

    public function postEditTinTuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $id = $_POST['id'];
            $tieu_de = $_POST['tieu_de'];
            $mo_ta = $_POST['mo_ta'];
            $noi_dung = $_POST['noi_dung'];
            $tac_gia_id = $_POST['tac_gia_id'];
            $ngay_dang = $_POST['ngay_dang'];
            $ngay_cap_nhat = $_POST['ngay_cap_nhat'];

            // Validate 
            $errors = [];
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Tiêu đề không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mô tả không được để trống';
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Nội dung không được để trống';
            }
            if (empty($tac_gia_id)) {
                $errors['tac_gia_id'] = 'Id tác giả không được để trống';
            }
            if (empty($ngay_dang)) {
                $errors['ngay_dang'] = 'Ngày đăng không được để trống';
            }
            if (empty($ngay_cap_nhat)) {
                $errors['ngay_cap_nhat'] = 'Ngày cập nhật không được để trống';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                //Nếu ko có lỗi thì tiến hành thêm danh mục
                $this->modleTinTuc->updateTinTuc($id, $tieu_de,$mo_ta, $noi_dung, $tac_gia_id, $ngay_dang, $ngay_cap_nhat);

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-tin-tuc');
                exit();
            } else {
                // Trả vẻ form và lỗi
                $tintuc = [
                    'id' => $id,
                    'tieu_de' => $tieu_de,
                    'mo_ta' => $mo_ta,
                    'noi_dung' => $noi_dung,
                    'tac_gia_id' => $tac_gia_id,
                    'ngay_dang' => $ngay_dang,
                    'ngay_cap_nhat' => $ngay_cap_nhat,
                ];
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-tin-tuc');
                exit();
            }
        }
    }

    public function deleteTinTuc(){
        $id = $_GET['id'];
        $TinTuc = $this->modleTinTuc->getIdTinTuc($id);
       
        if (isset($TinTuc)) {
            $this->modleTinTuc->deleteTinTuc($id);
        }
        header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-tin-tuc');
        exit();
        
    }


    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string',
        'content' => 'required|string',
    ]);

    Article::create($data);
    return redirect()->route('articles.index')->with('success', 'Bài viết được thêm thành công!');
}

}
