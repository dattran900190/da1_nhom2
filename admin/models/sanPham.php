<?php

class SanPham {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }


    public function getAllSanPham() {
        try {
            
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id";

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
            //lấy id san pham vua them
            return $this->conn->lastInsertId();
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
    public function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh) {
        $sql = "INSERT INTO hinh_anh_san_phams (san_pham_id, link_hinh_anh) VALUES (:san_pham_id, :link_hinh_anh)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':san_pham_id' => $san_pham_id,
            ':link_hinh_anh' => $link_hinh_anh,
        ]);
        //lấy id san pham vua them
        return true;
    }

    public function getDetailSanPham($id) {
        try {
            $sql = "SELECT * FROM san_phams WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();

        } catch (Exception $e) {

            echo "CÓ LỖI:" . $e->getMessage();

        }
    }
    public function getListAnhSanPham($id) {
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id";  

            $stmt = $this->conn->prepare($sql); 

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();

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
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':hinh_anh' => $hinh_anh,
                ':so_luong' => $so_luong,
                ':kich_co' => $kich_co,
                ':ngay_nhap' => $ngay_nhap,
                ':mo_ta' => $mo_ta,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':id' => $id,
            ]);
            return true;
            var_dump($stmt);
            die;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
    public function destroySanPham($id) {
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
