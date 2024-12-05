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
                        } ?>
                    </h3>
                    <form action="<?= BASE_URL . '?act=sua-khach-hang' ?>" method="POST" enctype="multipart/form-data">
                        <?php if (isset($_SESSION['user_client'])) { ?>
                            <input type="hidden" name="id" value="<?= $_SESSION['user_client_id'] ?>">
                        <?php } ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên đăng nhập: <?= $listTaiKhoan['email'] ?></label>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="name" name="ho_ten" value="<?= $listTaiKhoan['ho_ten'] ?>">
                            <small class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $listTaiKhoan['email'] ?>">
                            <small class="text-danger"><?= $_SESSION['errors']['email'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="so_dien_thoai" value="<?= $listTaiKhoan['so_dien_thoai'] ?>">
                            <small class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giới tính</label>
                            <div>
                                <select id="trangThai" name="gioi_tinh" class="form-control">
                                    <option value="1" <?= $listTaiKhoan['gioi_tinh'] == 1 ? 'selected' : '' ?>>Nam</option>
                                    <option value="2" <?= $listTaiKhoan['gioi_tinh'] == 2 ? 'selected' : '' ?>>Nữ</option>
                                </select>
                            </div>
                            <small class="text-danger"><?= $_SESSION['errors']['gioi_tinh'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="dob" name="ngay_sinh" value="<?= $listTaiKhoan['ngay_sinh'] ?>">
                            <small class="text-danger"><?= $_SESSION['errors']['ngay_sinh'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh đại diện</label>
                            <div>
                                <input type="file" class="form-control" name="anh_dai_dien" value="<?= $listTaiKhoan['anh_dai_dien'] ?>">
                                <small class="text-muted">Dùng lượng file tối đa 1 MB. Định dạng: .JPEG, .PNG</small>
                            </div>
                            <small class="text-danger"><?= $_SESSION['errors']['anh_dai_dien'] ?? '' ?></small>
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

<?php unset($_SESSION['errors'], $_SESSION['success']) ?>

<?php
require_once "layout/footer.php"
?>