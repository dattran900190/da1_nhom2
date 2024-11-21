<?php
class adminBanner
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllBanner()
    {
        try {
            $sql = "SELECT * FROM banners";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function insertBanner( $banner_img, $trang_thai)
    {
        try {
            $sql = "INSERT INTO banners ( banner_img, trang_thai)
                    VALUES ( :banner_img,:trang_thai)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':banner_img' => $banner_img,
                ':trang_thai' => $trang_thai,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function getIdBanner($id){
        try {
            $sql = "SELECT * FROM banners WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }

    public function updateBanner($id, $banner_img, $trang_thai)
{
    try {
        $sql = "UPDATE banners
                SET banner_img = COALESCE(:banner_img, banner_img), 
                    trang_thai = :trang_thai 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':banner_img' => $banner_img,
            ':trang_thai' => $trang_thai
        ]);
        return true;
    } catch (Exception $e) {
        echo "CÓ LỖI:" . $e->getMessage();
    }
}

    public function deleteBanner($id) {
        try {
            $sql = "DELETE FROM banners WHERE id = :id";
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
