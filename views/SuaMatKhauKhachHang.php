<?php
require_once "layout/menu.php";

?>
<style>
    .profile-sidebar {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .profile-sidebar li a {
        color: black;
    }

    .profile-content {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .profile-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
    }

    .save-btn {
        background-color: #f53d2d;
        color: white;
        border: none;
        padding: 10px 20px;
    }

    .save-btn:hover {
        background-color: #d73227;
    }

    /* .save-btn {
        background-color: #f53d2d;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .save-btn:hover {
        background-color: #d73227;
    } */
</style>

<div class="main-content">
    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <div class="d-flex align-items-center">
                        <img src="<?= $listTaiKhoan['anh_dai_dien'] ?>" alt="Profile" class="profile-photo">
                        <div class="ms-3">
                            <h5><?= $listTaiKhoan['ho_ten'] ?></h5>
                        </div>
                    </div>
                    <hr>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a href="<?= BASE_URL . '?act=chi-tiet-khach-hang' ?>" class="text-decoration-none">Hồ Sơ</a></li>
                        <li class="mb-3"><a href="<?= BASE_URL . '?act=doi-mat-khau-khach-hang' ?>" class="text-decoration-none">Đổi Mật Khẩu</a></li>
                        <li class="mb-3"><a href="<?= BASE_URL . '?act=xoa-tai-khoan-khach-hang' ?>" class="text-decoration-none">Thiết Lập Riêng Tư</a></li>
                    </ul>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col-md-9">
                <div class="profile-content">
                    <h4>Hồ Sơ Của Tôi</h4>
                    <p class="text-muted">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    <hr>
                    <h3 class="text-center">
                    <?php if (isset($_SESSION['success'])) {
                        echo $_SESSION['success'];
                    }?>
                    </h3>
                    <form action="<?= BASE_URL . '?act=doi-mat-khau-khach-hang' ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $listTaiKhoan['id'] ?>">
                        <div class="mb-3">
                            <label for="mat_khau" class="form-label">Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="mat_khau" name="mat_khau" value="">
                            <small class="text-danger"><?= $_SESSION['errors']['mat_khau'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="mat_khau_moi" class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="mat_khau_moi" name="mat_khau_moi" value="">
                            <small class="text-danger"><?= $_SESSION['errors']['mat_khau_moi'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="nhap_lai_mat_khau" class="form-label">Nhập lại mật khẩu mới</label>
                            <input type="password" class="form-control" id="nhap_lai_mat_khau" name="nhap_lai_mat_khau" value="">
                            <small class="text-danger"><?= $_SESSION['errors']['nhap_lai_mat_khau'] ?? '' ?></small>
                        </div>
                        <button type="submit" class="save-btn">Lưu</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<?php unset($_SESSION['errors'], $_SESSION['success'])?>

<?php
require_once "layout/footer.php"
?>