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

    .delete-btn {
      background-color: #f53d2d;
      color: white;
      border: none;
      padding: 10px 20px;
    }
    .delete-btn:hover {
      background-color: #d73227;
    }
    .delete-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
      /* border-top: 1px solid #dee2e6; */
      padding-top: 15px;
      margin-top: 20px;
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

                        <div class="delete-section">
                            <span>Yêu cầu xóa tài khoản</span>
                            <button class="delete-btn">Xóa bỏ</button>
                        </div>

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