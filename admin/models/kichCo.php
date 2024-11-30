<?php 
class adminKichCo{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllKichCo()
    {
        try {
            $sql = "SELECT * FROM kich_cos";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function postAddKichCo($ten_kich_co)
    {
        try {
            $sql = "INSERT INTO kich_cos (ten_kich_co) VALUES (:ten_kich_co)";
                
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_kich_co' => $ten_kich_co,
                
                
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function deleteKichCo($id) {
        try {
            $sql = "DELETE FROM kich_cos WHERE id = :id";
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