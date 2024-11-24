<?php 
class adminBoSuuTap {
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllBoSuuTap()
    {
        try {
            $sql = "SELECT * FROM bo_suu_tap";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function getIdBoSuuTap($id)
    {
        try {
            $sql = "SELECT * FROM bo_suu_tap WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function postAddBoSuuTap($ten_bo_suu_tap, $mo_ta, $hinh_anh)
    {
        try {
            $sql = "INSERT INTO bo_suu_tap (ten_bo_suu_tap, mo_ta, hinh_anh) VALUES (:ten_bo_suu_tap, :mo_ta, :hinh_anh)";
                
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_bo_suu_tap' => $ten_bo_suu_tap,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function formEditBoSuuTap($id){
        try {
            $sql = "SELECT * FROM bo_suu_tap WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
    public function updateBoSuuTap($id, $ten_bo_suu_tap, $mo_ta, $hinh_anh) {
        try {
            $sql = "UPDATE bo_suu_tap
            SET ten_bo_suu_tap = :ten_bo_suu_tap,
            mo_ta = :mo_ta,
            hinh_anh = :hinh_anh
            WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'ten_bo_suu_tap' => $ten_bo_suu_tap,
                'mo_ta' => $mo_ta,
                'hinh_anh' => $hinh_anh,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }


    public function deleteBoSuuTap($id) {
        try {
            $sql = "DELETE FROM bo_suu_tap WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
}


?>