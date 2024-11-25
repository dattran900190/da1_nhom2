<?php

class SanPham
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }


    public function getAllSanPham()
    {
        try {

            $sql = "SELECT sp.*, bst.ten_bo_suu_tap AS ten_bo_suu_tap, dm.ten_danh_muc AS ten_danh_muc FROM san_phams sp LEFT JOIN bo_suu_tap bst ON sp.bo_suu_tap_id = bst.id LEFT JOIN danh_mucs dm ON sp.danh_muc_id = dm.id;";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

            echo "CÓ LỖI: " . $e->getMessage();
        }
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

    function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $kich_co, $ngay_nhap, $mo_ta, $danh_muc_id, $bo_suu_tap_id, $trang_thai)
    {
        try {
            $sql = "INSERT INTO san_phams (ten_san_pham, gia_san_pham, gia_khuyen_mai, hinh_anh, so_luong, kich_co, ngay_nhap, mo_ta, danh_muc_id, bo_suu_tap_id, trang_thai) 
                VALUES (:ten_san_pham, :gia_san_pham , :gia_khuyen_mai, :hinh_anh, :so_luong, :kich_co, :ngay_nhap, :mo_ta, :danh_muc_id, :bo_suu_tap_id, :trang_thai)";

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
                ':bo_suu_tap_id' => $bo_suu_tap_id,
                ':trang_thai' => $trang_thai
            ]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
            // die;
        }
    }


    public function getSanPham($id)
    {
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

    public function getDetailSanPham($id)
    {
        try {
            $sql = "SELECT  san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function getListAnhSanPham($id)
    {
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {

            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh)
    {
        try {
            $sql = "INSERT INTO hinh_anh_san_phams (san_pham_id, link_hinh_anh)
            VALUES (:san_pham_id, :link_hinh_anh)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    function updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $kich_co, $ngay_nhap, $mo_ta, $danh_muc_id, $bo_suu_tap_id, $trang_thai)
    {
        try {
            $sql = "UPDATE san_phams SET 
            ten_san_pham = :ten_san_pham,
            gia_san_pham = :gia_san_pham,
            gia_khuyen_mai = :gia_khuyen_mai,
            hinh_anh = :hinh_anh,
            so_luong = :so_luong,
            kich_co = :kich_co,
            ngay_nhap = :ngay_nhap,
            mo_ta = :mo_ta,
            danh_muc_id = :danh_muc_id,
            bo_suu_tap_id = :bo_suu_tap_id,
            trang_thai = :trang_thai
            WHERE id = :id";
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
                ':bo_suu_tap_id' => $bo_suu_tap_id,
                ':trang_thai' => $trang_thai,
                ':id' => $san_pham_id
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function destroySanPham($id)
    {
        try {
            $sql = "DELETE FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function getBinhLuanFromSanPham($id) {
        try {
            $sql = "SELECT binh_luans.*, tai_khoans.ho_ten 
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
    public function getDetailAnhSanPham($id)
{
    try {
        $sql = "SELECT * FROM hinh_anh_san_phams WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    } catch (Exception $e) {
        echo "CÓ LỖI: " . $e->getMessage();
    }
}

public function updateAnhSanPham($id, $new_file)
{
    try {
        $sql = "UPDATE hinh_anh_san_phams 
                SET link_hinh_anh = :new_file 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':new_file' => $new_file,
            ':id' => $id
        ]);
        return true;
    } catch (Exception $e) {
        echo "CÓ LỖI: " . $e->getMessage();
    }
}

public function destroyAnhSanPham($id)
{
    try {
        $sql = "DELETE FROM hinh_anh_san_phams WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return true;
    } catch (Exception $e) {
        echo "CÓ LỖI: " . $e->getMessage();
    }
}
}
