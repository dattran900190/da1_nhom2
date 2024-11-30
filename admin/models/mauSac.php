<?php 
class adminMauSac{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllMauSac()
    {
        try {
            $sql = "SELECT * FROM maus";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function postAddMauSac($ten_mau)
    {
        try {
            $sql = "INSERT INTO maus (ten_mau) VALUES (:ten_mau)";
                
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_mau' => $ten_mau,
                
                
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function deleteMauSac($id) {
        try {
            $sql = "DELETE FROM maus WHERE id = :id";
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