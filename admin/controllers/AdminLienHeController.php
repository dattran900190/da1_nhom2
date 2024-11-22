<?php

class QuanLyLienHeController {

    public $modelLienHe;
     public function __construct()
    {
        $this->modelLienHe = new adminLienHe();
    }
    public function danhSachLienHe() {
        $listLienHe = $this->modelLienHe->getAllLienHe();
        require_once "./views/lienhe/ListLienHe.php";
        
    }
    public function formEditLienHe()
    {
        $id = $_GET['id'] ?? null;
        // var_dump($id);die;

        $lienHe = $this->modelLienHe->getDetailLienHe($id);
        // var_dump($lienHe);die;
        if ($lienHe) {
            require_once './views/lienhe/EditLienHe.php';
            deleteSessionError();
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-lien-he');
            exit();
        }
    }

    public function postEditLienHe()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $lien_he_id = $_POST['lien_he_id'];
            $trang_thai_lien_he = $_POST['trang_thai_lien_he'];

            $errors = [];
            if (empty($trang_thai_lien_he)) {
                $errors['trang_thai_lien_he'] = 'Trạng thái đơn hàng không được để trống';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                $this->modelLienHe->updateLienHe($lien_he_id, $trang_thai_lien_he);
                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-lien-he');
                exit();
            } else {
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-lien-he&id_lien_he=' . $lien_he_id);
                exit();
            }
        }
    }
    public function deleteLienHe() {
        $id = $_GET['id'];
        $lienHe = $this->modelLienHe->deleteLienHe($id);
       
        if (isset($lienHe)) {
            $this->modelLienHe->deleteLienHe($id);
        }
        header('Location: '. BASE_URL_ADMIN .'?act=quan-ly-lien-he');
        exit();
    }
    
}
?>

