<?php
class LienHe {
    public $conn;


    public function __construct() {
        $this->conn = connectDB(); // Đảm bảo rằng connectDB() trả về đối tượng PDO hợp lệ
    }

    public function getTaiKhoanUser($id)
{
    try {
        $sql = "SELECT * FROM tai_khoans WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);

        $user = $stmt->fetch();

        // Check if the user exists and return the data
        if ($user) {
            return $user;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo "CÓ LỖI: " . $e->getMessage();
    }
}
    

    public function insertLienHe($tai_khoan_id,$ho_ten, $email, $so_dien_thoai, $chu_de_lien_he, $noi_dung) {
        try {
            // var_dump($tai_khoan_id,$ho_ten, $email, $so_dien_thoai, $chu_de_lien_he, $noi_dung);
            // die;
            $sql = "INSERT INTO lien_hes (tai_khoan_id,ho_ten, email, so_dien_thoai, chu_de_lien_he, noi_dung)
                    VALUES (:tai_khoan_id,:ho_ten, :email, :so_dien_thoai, :chu_de_lien_he, :noi_dung)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id'=>$tai_khoan_id,
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':chu_de_lien_he' => $chu_de_lien_he,
                ':noi_dung' => $noi_dung,
               
            ]);
           
         
            // Trả về ID của bản ghi mới nếu cần thiết
            return $this->conn->lastInsertId();


        } catch (Exception $e) {
            // Ghi lại lỗi vào log thay vì in ra màn hình
            error_log("Error inserting contact message: " . $e->getMessage());
            return false;  // Trả về false nếu có lỗi
        }
    }
}
?>
