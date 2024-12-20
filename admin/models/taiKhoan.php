<?php
class adminTaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllTaiKhoan()
    {
        try {
            $sql = "SELECT * FROM tai_khoans";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
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

    public function postAddTaiKhoanQuanTri($ho_ten, $email, $mat_khau, $chuc_vu_id)
    {
        try {
            $sql = "INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id) 
            VALUES (:ho_ten, :email, :mat_khau, :chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);


            $stmt->execute([
                'ho_ten' => $ho_ten,
                'email' => $email,
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
    public function getTaiKhoanKhachHang($chuc_vu_id)
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
    public function postEditTaiKhoanCaNhan($id, $ho_ten, $email, $so_dien_thoai, $ngay_sinh, $dia_chi, $anh_dai_dien = null) {
        try {
            $sql = "UPDATE tai_khoans
                    SET ho_ten = :ho_ten,
                        email = :email,
                        so_dien_thoai = :so_dien_thoai,
                        ngay_sinh = :ngay_sinh,
                        dia_chi = :dia_chi";
            if ($anh_dai_dien) {
                $sql .= ", anh_dai_dien = :anh_dai_dien";
            }
            $sql .= " WHERE id = :id";
   
            $params = [
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':ngay_sinh' => $ngay_sinh,
                ':dia_chi' => $dia_chi,
                ':id' => $id,
            ];
            if ($anh_dai_dien) {
                $params[':anh_dai_dien'] = $anh_dai_dien;
            }
   
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($params);
        } catch (Exception $e) {
            error_log("Error updating profile: " . $e->getMessage());
            return false;
        }
    }


    public function checkLogin($email, $mat_khau) {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            $user = $stmt->fetch();

            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 1) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email']; // Trường hợp đăng nhập thành công
                    }else{
                        return 'Tài khoản bị cấm';
                    }
                }else{
                    return 'Tài khoản Không có quyền đăng nhập';
                }
               
            }else{
                return 'Bạn nhập sai thông tin tài khoản';
            }
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
            return false;
        }
    }
    public function getTaiKhoanFormEmail($email){
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email'=>$email
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
}
