<?php 
class adminTRangThaiDonHang{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTRangThaiDonHang()
    {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function postAddTRangThaiDonHang($ten_trang_thai, $mo_ta)
    {
        try {
            $sql = "INSERT INTO trang_thai_don_hangs (ten_trang_thai, mo_ta) VALUES (:ten_trang_thai, :mo_ta)";
                
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_trang_thai' => $ten_trang_thai,
                ':mo_ta' => $mo_ta,
                
                
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function formEditTRangThaiDonHang($id){
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
    public function updateTRangThaiDonHang($id, $ten_trang_thai, $mo_ta) {
        try {
            $sql = "UPDATE trang_thai_don_hangs 
            SET ten_trang_thai = :ten_trang_thai,
            mo_ta = :mo_ta 
            WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'ten_trang_thai' => $ten_trang_thai,
                'mo_ta' => $mo_ta,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }

    public function deleteTRangThaiDonHang($id) {
        try {
            $sql = "DELETE FROM trang_thai_don_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
    public function kien(){}
    
}


?>