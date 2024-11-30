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



    // public function filterSanPham($filters = [])
    // {
    //     try {
    //         // Base sql
    //         $sql = "SELECT DISTINCT sp.*, 
    //                     bst.ten_bo_suu_tap AS ten_bo_suu_tap, 
    //                     dm.ten_danh_muc AS ten_danh_muc 
    //                 FROM san_phams sp
    //                 LEFT JOIN bo_suu_tap bst ON sp.bo_suu_tap_id = bst.id
    //                 LEFT JOIN danh_mucs dm ON sp.danh_muc_id = dm.id
    //                 LEFT JOIN san_pham_kich_cos ps ON sp.id = ps.san_pham_id
    //                 LEFT JOIN kich_cos s ON ps.kich_co_id = s.id
    //                 LEFT JOIN san_pham_maus pc ON sp.id = pc.san_pham_id
    //                 LEFT JOIN maus c ON pc.mau_id = c.id
    //                 WHERE 1=1";

    //         // Add conditions dynamically based on filters
    //         $params = [];
    //         if (!empty($filters['kich_co'])) {
    //             $sql .= " AND s.ten_kich_co = :kich_co";
    //             $params[':kich_co'] = $filters['kich_co'];
    //         }
    //         if (!empty($filters['mau'])) {
    //             $sql .= " AND c.ten_mau = :mau";
    //             $params[':mau'] = $filters['mau'];
    //         }
    //         if (!empty($filters['price_min'])) {
    //             $sql .= " AND sp.gia_san_pham >= :price_min";
    //             $params[':price_min'] = $filters['price_min'];
    //         }
    //         if (!empty($filters['price_max'])) {
    //             $sql .= " AND sp.gia_san_pham <= :price_max";
    //             $params[':price_max'] = $filters['price_max'];
    //         }

    //         // Add sorting
    //         if (!empty($filters['sort'])) {
    //             if ($filters['sort'] === 'newest') {
    //                 $sql .= " ORDER BY sp.ngay_nhap DESC";
    //             } elseif ($filters['sort'] === 'price_asc') {
    //                 $sql .= " ORDER BY sp.gia_san_pham ASC";
    //             } elseif ($filters['sort'] === 'price_desc') {
    //                 $sql .= " ORDER BY sp.gia_san_pham DESC";
    //             }
    //         }

    //         // Prepare and execute the sql
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute($params);

    //         return $stmt->fetchAll();
    //     } catch (Exception $e) {
    //         echo "CÓ LỖI: " . $e->getMessage();
    //     }
    // }

    // public function filterProducts($filters)
    // {
    //     $sql = "SELECT * FROM san_phams WHERE 1=1";

    //     // Apply filters dynamically
    //     if (!empty($filters['danhMucId'])) {
    //         $sql .= " AND danh_muc_id = :danhMucId";
    //     }
    //     if (!empty($filters['boSuuTapId'])) {
    //         $sql .= " AND bo_suu_tap_id = :boSuuTapId";
    //     }
    //     if (!empty($filters['minPrice'])) {
    //         $sql .= " AND gia >= :minPrice";
    //     }
    //     if (!empty($filters['maxPrice'])) {
    //         $sql .= " AND gia <= :maxPrice";
    //     }
    //     if (!empty($filters['keyword'])) {
    //         $sql .= " AND ten_san_pham LIKE :keyword";
    //     }

    //     $stmt = $this->conn->prepare($sql);

    //     // Bind parameters to the sql
    //     if (!empty($filters['danhMucId'])) {
    //         $stmt->bindParam(':danhMucId', $filters['danhMucId'], PDO::PARAM_INT);
    //     }
    //     if (!empty($filters['boSuuTapId'])) {
    //         $stmt->bindParam(':boSuuTapId', $filters['boSuuTapId'], PDO::PARAM_INT);
    //     }
    //     if (!empty($filters['minPrice'])) {
    //         $stmt->bindParam(':minPrice', $filters['minPrice'], PDO::PARAM_INT);
    //     }
    //     if (!empty($filters['maxPrice'])) {
    //         $stmt->bindParam(':maxPrice', $filters['maxPrice'], PDO::PARAM_INT);
    //     }
    //     if (!empty($filters['keyword'])) {
    //         $keyword = '%' . $filters['keyword'] . '%';
    //         $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    //     }

    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}
