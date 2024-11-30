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
                        <img src="https://via.placeholder.com/100" alt="Profile" class="profile-photo">
                        <div class="ms-3">
                            <h5>dattran9029</h5>
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
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên đăng nhập: (in ra tên đnhap ở đây)</label> 
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giới tính</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                    <label class="form-check-label" for="male">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">Nữ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                    <label class="form-check-label" for="other">Khác</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="dob">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh đại diện</label>
                            <div>
                                <input type="file" class="form-control">
                                <small class="text-muted">Dùng lượng file tối đa 1 MB. Định dạng: .JPEG, .PNG</small>
                            </div>
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


<?php
require_once "layout/footer.php"
?>