<?php
class taiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    
    public function getTaiKhoanFromEmail($email)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            $user = $stmt->fetch();

            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email']; // Trường hợp đăng nhập thành công
                    } else {
                        return 'Tài khoản bị cấm';
                    }
                } else {
                    return 'Tài khoản Không có quyền đăng nhập';
                }
            } else {
                return 'Bạn nhập sai thông tin tài khoản';
            }
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
            return false;
        }
    }

    public function addTaiKhoan($ho_ten, $email, $mat_khau)
    {
        try {
            $chuc_vu_id = 2;
            $hashedPassword = password_hash($mat_khau, PASSWORD_BCRYPT);
            $sql = $sql = "INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id) VALUES (:ho_ten, :email, :mat_khau, :chuc_vu_id)";


            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':mat_khau' => $hashedPassword,
                ':chuc_vu_id' => $chuc_vu_id
            ]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "LỖI: " . $e->getMessage();
            return false;
        }
    }

}
