<?php
require_once "layout/menu.php";

?>

<div class="main-content">
    <form class="form-log-out container">
        <h2 style="text-align: center;">TẠO TÀI KHOẢN</h2>
        <div class="mb-3">
            <label for="ho_ten" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="ho_ten" placeholder="Nhập họ và tên">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Nhập Eamil">
        </div>
        <div class="mb-3">
            <label for="ngay_sinh" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" id="ngay_sinh" placeholder="Nhập Eamil">
        </div>
        <div class="mb-3">
            <label for="mat_khau" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="mat_khau" placeholder="Nhập mật khẩu">
        </div>

        <div class="gui">
            <div class="nut">
            <button type="submit" class="btn btn-dark">ĐĂNG KÝ</button>
            </div>
            <div class="dang-ky">
                <a href="">Bạn đã có tài khoản? </a>
                <a href="<?= BASE_URL . '?act=dang-nhap' ?>" style="color: red;">ĐĂNG NHẬP</a>
            </div>
        </div>

    </form>
</div>



<?php
require_once "layout/footer.php"
?>