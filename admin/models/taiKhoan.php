<?php
class adminTaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllTaiKhoanQuanTri($chuc_vu_id)
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

    public function postAddTaiKhoanQuanTri($ho_ten, $email, $so_dien_thoai, $mat_khau, $chuc_vu_id)
    {
        try {
            $sql = "INSERT INTO tai_khoans (ho_ten, email, so_dien_thoai, mat_khau, chuc_vu_id) VALUES (:ho_ten, :email, :so_dien_thoai, :mat_khau, :chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);


            $stmt->execute([
                'ho_ten' => $ho_ten,
                'email' => $email,
                'so_dien_thoai' => $so_dien_thoai,
                'mat_khau' => $mat_khau,
                'chuc_vu_id' => $chuc_vu_id,
            ]);
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function formEditTaiKhoanQuanTri($id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function updateTaiKhoanQuanTri($id, $ho_ten, $email, $so_dien_thoai, $trang_thai)
    { {
            try {
                $sql = "UPDATE tai_khoans
         SET ho_ten = :ho_ten, email = :email, so_dien_thoai = :so_dien_thoai, trang_thai = :trang_thai 
         WHERE id = :id";

                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    'ho_ten' => $ho_ten,
                    'email' => $email,
                    'so_dien_thoai' => $so_dien_thoai,
                    'trang_thai' => $trang_thai,
                    ':id' => $id,
                ]);
                return true;
            } catch (Exception $e) {
                echo "CÓ LỖI:" . $e->getMessage();
            }
        }
    }


    public function deleteTaiKhoanQuanTri($id)
    {
        try {
            $sql = "DELETE FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function resetPassword($id, $mat_khau)
    {
        try {
            $sql = "UPDATE tai_khoans SET mat_khau = :mat_khau_reset WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':mat_khau_reset' => $mat_khau,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    // Khách hàng
    public function getAllTaiKhoanKhachHang($chuc_vu_id)
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
    public function formEditTaiKhoanKhachHang($id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function updateTaiKhoanKhachHang($id, $ho_ten, $email, $ngay_sinh, $so_dien_thoai, $dia_chi, $trang_thai)
    { {
            try {
                $sql = "UPDATE tai_khoans
         SET ho_ten = :ho_ten, email = :email, ngay_sinh = :ngay_sinh, so_dien_thoai = :so_dien_thoai, dia_chi = :dia_chi, trang_thai = :trang_thai 
         WHERE id = :id";

                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    'ho_ten' => $ho_ten,
                    'email' => $email,
                    'ngay_sinh' => $ngay_sinh,
                    'so_dien_thoai' => $so_dien_thoai,
                    'dia_chi' => $dia_chi,
                    'trang_thai' => $trang_thai,
                    ':id' => $id,
                ]);
                return true;
            } catch (Exception $e) {
                echo "CÓ LỖI:" . $e->getMessage();
            }
        }
    }
    public function viewsTaiKhoanKhachHang($id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }


}