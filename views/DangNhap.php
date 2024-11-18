<?php
require_once "layout/menu.php";

?>

<div class="main-content">
    <form class="form-log-out container">
        <h2 style="text-align: center;">ĐĂNG NHẬP</h2>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Nhập Eamil">
        </div>
        <div class="mb-3">
            <label for="mat_khau" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="mat_khau" placeholder="Nhập mật khẩu">
        </div>

        <div class="gui">
            <div class="nut">
            <button type="submit" class="btn btn-dark">ĐĂNG NHẬP</button>
            </div>
            <div class="dang-ky">
                <a href="">Quên mật khẩu?</a>
                hoặc
                <a href="<?= BASE_URL . '?act=dang-ky' ?>" style="color: red;">ĐĂNG KÝ</a>
            </div>
        </div>

    </form>
</div>



<?php
require_once "layout/footer.php"
?>