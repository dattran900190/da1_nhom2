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
                        return $user; // Trường hợp đăng nhập thành công
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
            $sql = "INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id) 
                    VALUES (:ho_ten, :email, :mat_khau, :chuc_vu_id)";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':mat_khau' => $hashedPassword,
                ':chuc_vu_id' => $chuc_vu_id,
            ]);
    
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "LỖI: " . $e->getMessage();
            return false;
        }
    }
    
    public function getIdTaiKhoan($id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function updatekhachHang($id, $ho_ten, $email, $so_dien_thoai, $gioi_tinh, $ngay_sinh, $anh_dai_dien) {
        try {
            $sql = "UPDATE tai_khoans
            SET 
            ho_ten = :ho_ten, 
            email = :email, 
            so_dien_thoai = :so_dien_thoai, 
            gioi_tinh = :gioi_tinh, 
            ngay_sinh = :ngay_sinh, 
            anh_dai_dien = :anh_dai_dien
            WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':gioi_tinh' => $gioi_tinh,
                ':ngay_sinh' => $ngay_sinh,
                ':anh_dai_dien' => $anh_dai_dien,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
    public function updateMatKhau($id, $mat_khau_moi) {
        try {
            $sql = "UPDATE tai_khoans
                    SET mat_khau = :mat_khau_moi
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':mat_khau_moi' => password_hash($mat_khau_moi, PASSWORD_DEFAULT), // Hash mật khẩu trước khi lưu
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        }
    }

    public function deleteTaiKhoan($id) {
        try {
            $sql = "DELETE FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        }
    }
    
    public function binhLuan($tai_khoan_id,$san_pham_id,$noi_dung,$ngay_dang){
        try {
            $sql = "INSERT INTO binh_luans (tai_khoan_id,san_pham_id,noi_dung,ngay_dang)
            VALUES (:tai_khoan_id, :san_pham_id,:noi_dung,:ngay_dang)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':tai_khoan_id' => $tai_khoan_id,
                    ':san_pham_id' => $san_pham_id,
                    ':noi_dung' =>$noi_dung,
                    ':ngay_dang' =>$ngay_dang,
                ]
            );

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

}
