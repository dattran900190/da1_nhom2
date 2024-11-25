<?php
class adminBinhLuan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllBinhLuan()
    {
        try {
            $sql = "SELECT * FROM binh_luans";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function insertBinhLuan($id, $san_pham_id, $tai_khoan_id, $ngay_dang, $noi_dung, $trang_thai)
    {
        try {
            $sql = "INSERT INTO binh_luans (id, san_pham_id, tai_khoan_id, ngay_dang, noi_dung, trang_thai) 
                VALUES (:id, :san_pham_id, :tai_khoan_id, :ngay_dang, :noi_dung, :trang_thai) ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':san_pham_id' => $san_pham_id,
                ':tai_khoan_id' => $tai_khoan_id,
                ':ngay_dang' => $ngay_dang,
                ':noi_dung' => $noi_dung,
                ':trang_thai' => $trang_thai
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function getIdBinhLuan($id){
        try {
            $sql = "SELECT * FROM binh_luans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }

    public function updateBinhLuan($id, $san_pham_id, $tai_khoan_id, $ngay_dang, $noi_dung, $trang_thai) {
        try {
            $sql = "UPDATE binh_luans 
            SET san_pham_id = :san_pham_id,
            tai_khoan_id = :tai_khoan_id,
             ngay_dang = :ngay_dang,
             noi_dung = :noi_dung,
             trang_thai = :trang_thai 
            WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':tai_khoan_id' => $tai_khoan_id,
                ':ngay_dang' => $ngay_dang,
                ':noi_dung' => $noi_dung,
                ':trang_thai' => $trang_thai,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }

    public function deleteBinhLuan($id) {
        try {
            $sql = "DELETE FROM binh_luans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }

    public function getBinhLuanFromKhachHang($id) {
        try {
            $sql = "SELECT binh_luans.*, san_phams.ten_san_pham 
            FROM binh_luans
            INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id

           
            WHERE binh_luans.tai_khoan_id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
}
