<?php
class adminTinTuc
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTinTuc()
    {
        try {
            $sql = "SELECT * FROM tin_tuc";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }


    function showTinTuc($id){
        try{

            $sql = "SELECT * FROM tin_tuc WHERE id = :id LIMIT 1";
            
          
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id",$id);


            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            echo "CÓ LỖI:".$e->getMessage();
        }
       
    }




    public function insertTinTuc($id, $tieu_de,$mo_ta, $noi_dung, $tac_gia_id, $ngay_dang, $ngay_cap_nhat)
    {
        try {
            $sql = "INSERT INTO tin_tuc (id, tieu_de,mo_ta, noi_dung, tac_gia_id, ngay_dang, ngay_cap_nhat)
                VALUES (:id, :tieu_de,:mo_ta, :noi_dung, :tac_gia_id, :ngay_dang, :ngay_cap_nhat)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':tieu_de' => $tieu_de,
                ':mo_ta' => $mo_ta,
                ':noi_dung' => $noi_dung,
                ':tac_gia_id' => $tac_gia_id,
                ':ngay_dang' => $ngay_dang,
                ':ngay_cap_nhat' => $ngay_cap_nhat,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    public function getIdTinTuc($id){
        try {
            $sql = "SELECT * FROM tin_tuc WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }

    public function updateTinTuc($id, $tieu_de,$mo_ta, $noi_dung, $tac_gia_id, $ngay_dang, $ngay_cap_nhat) {
        try {
            $sql = "UPDATE tin_tuc 
              SET tieu_de = :tieu_de,
               mo_ta = :mo_ta,
               noi_dung = :noi_dung,
               tac_gia_id = :tac_gia_id,
               ngay_dang = :ngay_dang,
               ngay_cap_nhat = :ngay_cap_nhat
            WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tieu_de' => $tieu_de,
                ':mo_ta' => $mo_ta,
                ':noi_dung' => $noi_dung,
                ':tac_gia_id' => $tac_gia_id,
                ':ngay_dang' => $ngay_dang,
                ':ngay_cap_nhat' => $ngay_cap_nhat,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }

    public function deleteTinTuc($id) {
        try {
            $sql = "DELETE FROM tin_tuc WHERE id = :id";
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
