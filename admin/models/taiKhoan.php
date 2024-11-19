<?php 
 class adminTaiKhoan{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
   
    public function getAllTaiKhoanQuanTri($chuc_vu_id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':chuc_vu_id' => $chuc_vu_id]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }

    public function postAddTaiKhoanQuanTri($ho_ten, $email, $password, $chuc_vu_id) {
        try {
            $sql = "INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id) VALUES (:ho_ten, :email, :password, :chuc_vu_id)";
                
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':password' => $password,
                ':chuc_vu_id' => $chuc_vu_id,
                
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
   
 }
?>