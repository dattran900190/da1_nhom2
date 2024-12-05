<?php
class SanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllProduct()
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc, bo_suu_tap.ten_bo_suu_tap 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            INNER JOIN bo_suu_tap ON san_phams.bo_suu_tap_id = bo_suu_tap.id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function getIdSanPham($id)
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id WHERE san_phams.id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
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

    public function searchSanPham($keyword)
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc 
                FROM san_phams
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                WHERE san_phams.ten_san_pham LIKE :keyword";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':keyword' => '%' . $keyword . '%']);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
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


    // public function getSanPhamByBoSuuTap($tenBoSuuTap)
    // {
    //     $sql = "SELECT * FROM san_phams 
    //         WHERE ten_bo_suu_tap = :ten_bo_suu_tap";

    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([
    //         ':ten_bo_suu_tap', $tenBoSuuTap
    //     ]);

    //     return $stmt->fetchAll();
    // }
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
    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = "SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien 
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function getListSanPhamDanhMuc($danh_muc_id)
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
            WHERE san_phams.danh_muc_id = " . $danh_muc_id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function getAllDanhMucSanPham()
    {
        try {
            $sql = "SELECT * FROM danh_mucs";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function getSanPhamDanhMuc($danh_muc_id)
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE danh_muc_id = :danh_muc_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':danh_muc_id' => $danh_muc_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function getSanPhamTheoGia($minPrice, $maxPrice)
    {
        // Sử dụng giá khuyến mãi nếu có, nếu không thì dùng giá gốc
        $sql = "SELECT * FROM san_phams 
                WHERE (gia_khuyen_mai BETWEEN :minPrice AND :maxPrice OR gia_san_pham BETWEEN :minPrice AND :maxPrice)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':minPrice', $minPrice, PDO::PARAM_INT);
        $stmt->bindValue(':maxPrice', $maxPrice, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getSanPhamBoSuuTap($bo_suu_tap_id)
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE bo_suu_tap_id = :bo_suu_tap_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':bo_suu_tap_id' => $bo_suu_tap_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function getMauSacSanPham($mau_id)
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE mau_id = :mau_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':mau_id' => $mau_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function getAllBoSuuTapSanPham()
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
    public function getAllBoSuuTap()
    {
        try {

            $sql = "SELECT * FROM bo_suu_tap;";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {

            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function getAllTaiKhoan($chuc_vu_id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':chuc_vu_id' => $chuc_vu_id]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
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

    // public function placeOrder($san_pham_id, $so_luong)
    // {
    //     try {
    //         // Start a transaction
    //         $this->conn->beginTransaction();

    //         // Check current stock
    //         $checkStockSql = "SELECT so_luong FROM san_phams WHERE id = :san_pham_id FOR UPDATE";
    //         $stmt = $this->conn->prepare($checkStockSql);
    //         $stmt->execute([':san_pham_id' => $san_pham_id]);
    //         $product = $stmt->fetch();

    //         if (!$product || $product['so_luong'] < $so_luong) {
    //             throw new Exception("Not enough stock available for product ID: $san_pham_id");
    //         }

    //         // Deduct stock
    //         $updateStockSql = "UPDATE san_phams SET so_luong = so_luong - :so_luong WHERE id = :san_pham_id";
    //         $stmt = $this->conn->prepare($updateStockSql);
    //         $stmt->execute([':so_luong' => $so_luong, ':san_pham_id' => $san_pham_id]);

    //         // Commit the transaction
    //         $this->conn->commit();
    //         return "Order placed successfully!";
    //     } catch (Exception $e) {
    //         // Roll back the transaction if something goes wrong
    //         $this->conn->rollBack();
    //         return "Error placing order: " . $e->getMessage();
    //     }
    // }

    public function getSoLuong($san_pham_id)
    {
        try {
            $sql = "SELECT so_luong FROM san_phams WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id
            ]);
            return $stmt->fetchColumn(); // trả về cột số lượng
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }

    public function giamSoLuong($san_pham_id, $so_luong_dat)
    {
        try {
            $sql = "UPDATE san_phams  SET so_luong = so_luong - :so_luong 
                WHERE id = :san_pham_id AND so_luong >= :so_luong";

            $stmt = $this->conn->prepare($sql);

            // Sử dụng bindValue để gán giá trị cho các tham số
            // bindValue(':param_name', $value, $data_type);
            //          :param_name: Tên tham số trong câu lệnh SQL.
            //          $value: Giá trị bạn muốn gán cho tham số.
            //          $data_type (tùy chọn): Loại dữ liệu của tham số (ví dụ: PDO::PARAM_INT, PDO::PARAM_STR, PDO::PARAM_BOOL, ...).
            $stmt->bindValue(':so_luong', $so_luong_dat, PDO::PARAM_INT);
            $stmt->bindValue(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }

    public function tangSoLuong($san_pham_id, $so_luong)
    {
        try {
            $sql = "UPDATE san_phams SET so_luong = so_luong + :so_luong 
                WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);

            // Sử dụng bindValue để gán giá trị cho các tham số
            // bindValue(':param_name', $value, $data_type);
            //          :param_name: Tên tham số trong câu lệnh SQL.
            //          $value: Giá trị bạn muốn gán cho tham số.
            //          $data_type (tùy chọn): Loại dữ liệu của tham số (ví dụ: PDO::PARAM_INT, PDO::PARAM_STR, PDO::PARAM_BOOL, ...).
            $stmt->bindValue(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
            $stmt->bindValue(':so_luong', $so_luong, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }

    public function huyDonHang($san_pham_id, $so_luong)
    {
        try {

            $updateStockSql = "UPDATE san_phams SET so_luong = so_luong + :so_luong WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($updateStockSql);
            $stmt->execute([':so_luong' => $so_luong, ':san_pham_id' => $san_pham_id]);


            $updateOrderSql = "UPDATE don_hangs SET trang_thai_id = 11 WHERE san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($updateOrderSql);
            $stmt->execute([':san_pham_id' => $san_pham_id]);


            $this->conn->commit();
            return "Order canceled successfully!";
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function getDonHangId($donHangID)
    {
        try {
            $sql = "SELECT don_hangs.*, 
                       chi_tiet_don_hangs.san_pham_id, 
                       chi_tiet_don_hangs.so_luong, 
                       chi_tiet_don_hangs.don_gia, 
                       chi_tiet_don_hangs.thanh_tien, 
                       chi_tiet_don_hangs.kich_co 
                FROM don_hangs 
                LEFT JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                WHERE don_hangs.id = :donHangID";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':donHangID', $donHangID, PDO::PARAM_INT);
            $stmt->execute();

            // Lấy kết quả trực tiếp mà không cần tạo cấu trúc dữ liệu
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }


    public function updateTrangThaiDonHang($san_pham_id, $trang_thai_id)
    {
        try {
            $sql = "UPDATE don_hangs SET trang_thai_id = :trang_thai_id WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':trang_thai_id', $trang_thai_id, PDO::PARAM_STR);
            $stmt->bindValue(':san_pham_id', $san_pham_id, PDO::PARAM_INT);

            return $stmt->execute(); // Returns true if the query was successful
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }

}
