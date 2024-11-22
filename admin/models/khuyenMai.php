<?php
class adminKhuyenMai
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllKhuyenMai()
    {
        try {
            $sql = "SELECT * FROM khuyen_mais";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function insertKhuyenMai($ten_khuyen_mai, $ma_khuyen_mai, $muc_giam_gia, $so_luong, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai, $loai_khuyen_mai)
    {
        try {
            $sql = "INSERT INTO khuyen_mais (ten_khuyen_mai, ma_khuyen_mai, muc_giam_gia, so_luong, ngay_bat_dau, ngay_ket_thuc, trang_thai, loai_khuyen_mai) 
                    VALUES (:ten_khuyen_mai, :ma_khuyen_mai, :muc_giam_gia, :so_luong, :ngay_bat_dau, :ngay_ket_thuc, :trang_thai, :loai_khuyen_mai)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_khuyen_mai' => $ten_khuyen_mai,
                ':ma_khuyen_mai' => $ma_khuyen_mai,
                ':muc_giam_gia' => $muc_giam_gia,
                ':so_luong' => $so_luong,
                ':ngay_bat_dau' => $ngay_bat_dau,
                ':ngay_ket_thuc' => $ngay_ket_thuc,
                ':trang_thai' => $trang_thai,
                ':loai_khuyen_mai' => $loai_khuyen_mai
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function getIdKhuyenMai($id)
    {
        try {
            $sql = "SELECT * FROM khuyen_mais WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function updateKhuyenMai($id, $ten_khuyen_mai, $ma_khuyen_mai, $muc_giam_gia, $so_luong, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai, $loai_khuyen_mai)
    {
        try {
            $sql = "UPDATE khuyen_mais 
                SET ten_khuyen_mai = :ten_khuyen_mai,
                    ma_khuyen_mai = :ma_khuyen_mai,
                    muc_giam_gia = :muc_giam_gia,
                    so_luong = :so_luong,
                    ngay_bat_dau = :ngay_bat_dau,
                    ngay_ket_thuc = :ngay_ket_thuc,
                    trang_thai = :trang_thai,
                    loai_khuyen_mai = :loai_khuyen_mai 
                WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_khuyen_mai' => $ten_khuyen_mai,
                ':ma_khuyen_mai' => $ma_khuyen_mai,
                ':muc_giam_gia' => $muc_giam_gia,
                ':so_luong' => $so_luong,
                ':ngay_bat_dau' => $ngay_bat_dau,
                ':ngay_ket_thuc' => $ngay_ket_thuc,
                ':trang_thai' => $trang_thai,
                ':loai_khuyen_mai' => $loai_khuyen_mai,
                ':id' => $id
            ]);
            return true; 
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function deleteKhuyenMai($id)
    {
        try {
            $sql = "DELETE FROM khuyen_mais WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
}
