<?php

class SanPham {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllSanPham() {
        try {
            $sql = "SELECT * FROM san_phams";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $kich_co, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai)
    {
        try {
            $sql = "INSERT INTO san_phams (ten_san_pham, gia_san_pham, gia_khuyen_mai, hinh_anh, so_luong, kich_co, ngay_nhap, mo_ta, danh_muc_id, trang_thai) 
                VALUES (:ten_san_pham, :gia_san_pham , :gia_khuyen_mai, :hinh_anh, :so_luong, :kich_co, :ngay_nhap, :mo_ta, :danh_muc_id, :trang_thai)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':hinh_anh' => $hinh_anh,
                ':so_luong' => $so_luong,
                ':kich_co' => $kich_co,
                ':ngay_nhap' => $ngay_nhap,
                ':mo_ta' => $mo_ta,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                

            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function getSanPham($id) {
        try {
            $sql = "SELECT * FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function updateSanPham($id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $kich_co, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai) {
        try {
            $sql = "UPDATE san_phams 
            SET ten_san_pham = :ten_san_pham,
            gia_san_pham = :gia_san_pham,
             gia_khuyen_mai = :gia_khuyen_mai,
             hinh_anh = :hinh_anh,
             so_luong = :so_luong,
             kich_co = :kich_co,
             ngay_nhap = :ngay_nhap,
             mo_ta = :mo_ta,
             danh_muc_id = :danh_muc_id,
             trang_thai = :trang_thai 
            WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'ten_san_pham' => $ten_san_pham,
                'gia_san_pham' => $gia_san_pham,
                'gia_khuyen_mai' => $gia_khuyen_mai,
                'hinh_anh' => $hinh_anh,
                'so_luong' => $so_luong,
                'kich_co' => $kich_co,
                'ngay_nhap' => $ngay_nhap,
                'mo_ta' => $mo_ta,
                'danh_muc_id' => $danh_muc_id,
                'trang_thai' => $trang_thai,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
    public function deleteSanPham($id) {
        try {
            $sql = "DELETE FROM san_phams WHERE id = :id";
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