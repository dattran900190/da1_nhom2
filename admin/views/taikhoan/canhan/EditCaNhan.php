<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | T-shirt Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <style>
        .container {
            display: flex;
            gap: 20px;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
        }

        .profile-card {
            flex: 1;
            text-align: center;
            border-right: 1px solid #ddd;
            padding: 10px;
        }

        .profile-card h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .avatar-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .avatar-wrapper img {
            margin-top: 70px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        .avatar-wrapper .admin-name {
            font-size: 16px;
            font-weight: bold;
            color: #555;
        }

        .avatar-wrapper .upload-label {
            background-color: #007BFF;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .avatar-wrapper .upload-label:hover {
            background-color: #0056b3;
        }

        .avatar-wrapper input[type="file"] {
            display: none;
        }

        .avatar-wrapper .file-info {
            font-size: 12px;
            color: #999;
        }

        /* Details Card */
        .details-card {
            flex: 2;
            padding: 10px 20px;
        }

        .details-card h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .details-card h3 {
            margin-top: 30px;
            margin-bottom: 10px;
            font-size: 16px;
            color: #555;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-row {
            display: flex;
            gap: 10px;
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            width: 100%;
        }

        input:focus {
            border-color: #007BFF;
            outline: none;
        }

        button.btn-save {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.btn-save:hover {
            background-color: #0056b3;
        }
    </style>

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>

</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>
    </div>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="h-100">
                            <div class="row mb-3 pb-1">
                                <div class="col-12">
                                    <div class="flex-grow-1">
                                        <h2 class="text-primary mb-4">Quản lý tài khoản cá nhân </h2>
                                    </div>
                                    <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-tai-khoan-ca-nhan' ?>" method="POST" enctype="multipart/form-data">
                                        <div class="container">
                                            <div class="profile-card">
                                                <h2>Ảnh đại diện</h2>
                                                <div class="avatar-wrapper">
                                                    <img src="<?= BASE_URL_ADMIN . $thongTinCaNhan['anh_dai_dien']; ?>" alt="Avatar">
                                                    <p class="admin-name"><?= $thongTinCaNhan['ho_ten']; ?></p>
                                                </div>
                                                <input type="file" name="anh_dai_dien" accept="image/*" class="">
                                            </div>
                                            <div class="details-card">
                                                <h2>Thông tin cá nhân</h2>
                                                <?php if (isset($_SESSION['success_message'])): ?>
                                                    <div class="alert alert-success">
                                                        <?= $_SESSION['success_message']; ?>
                                                        <?php unset($_SESSION['success_message']); ?>
                                                    </div>
                                                <?php endif; ?>


                                                <?php if (isset($_SESSION['error_message'])): ?>
                                                    <div class="alert alert-danger">
                                                        <?= $_SESSION['error_message']; ?>
                                                        <?php unset($_SESSION['error_message']); ?>
                                                    </div>
                                                <?php endif; ?>


                                                <?php if (isset($_SESSION['errors'])): ?>
                                                    <?php $errors = $_SESSION['errors'];
                                                    unset($_SESSION['errors']); ?>
                                                <?php endif; ?>
                                                <input type="hidden" name="id" value="<?= $thongTinCaNhan['id']; ?>">
                                                <div class="form-row">
                                                    <div class="form-group">
                                                        <label>Họ Tên</label>
                                                        <input type="text" name="ho_ten" placeholder="Nhập họ tên" value="<?= $thongTinCaNhan['ho_ten']; ?>">
                                                        <?php if (isset($errors['ho_ten'])): ?>
                                                            <small class="error"><?= $errors['ho_ten']; ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" placeholder="Nhập email" value="<?= $thongTinCaNhan['email']; ?>">
                                                        <?php if (isset($errors['email'])): ?>
                                                            <small class="error"><?= $errors['email']; ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group">
                                                        <label>Ngày sinh</label>
                                                        <input type="date" name="ngay_sinh" placeholder="Nhập ngày sinh" value="<?= $thongTinCaNhan['ngay_sinh']; ?>">
                                                        <?php if (isset($errors['ngay_sinh'])): ?>
                                                            <small class="error"><?= $errors['ngay_sinh']; ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input type="number" name="so_dien_thoai" placeholder="Nhập số điện thoại" value="<?= $thongTinCaNhan['so_dien_thoai']; ?>">
                                                        <?php if (isset($errors['so_dien_thoai'])): ?>
                                                            <small class="error"><?= $errors['so_dien_thoai']; ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Địa chỉ</label>
                                                    <input type="text" name="dia_chi" placeholder="Vui lòng nhập địa chỉ" value="<?= $thongTinCaNhan['dia_chi']; ?>">
                                                    <?php if (isset($errors['dia_chi'])): ?>
                                                        <small class="error"><?= $errors['dia_chi']; ?></small>
                                                    <?php endif; ?>
                                                </div>
                                                <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Cập Nhật Thông Tin Cá Nhân</button>


                                    </form>

                                    <h3>Đổi Mật Khẩu</h3>

                                    <?php if (isset($_SESSION['success'])): ?>
                                        <div class="alert alert-success">
                                            <?= $_SESSION['success']; ?>
                                        </div>
                                        <?php unset($_SESSION['success']); ?>
                                    <?php endif; ?>

                                    <?php if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0): ?>
                                        <div class="alert alert-danger">
                                            <p> Vui lòng kiểm tra lại các thông tin bên dưới</p>
                                        </div>
                                    <?php endif; ?>

                                    <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan' ?>" method="POST">
                                        <div class="form-row">
                                            <!-- Mật khẩu cũ -->
                                            <div class="form-group">
                                                <label for="mat_khau_cu">Mật khẩu cũ</label>
                                                <input type="password" id="mat_khau_cu" name="mat_khau_cu" placeholder="Nhập mật khẩu cũ của bạn" class="form-control">
                                                <?php if (isset($_SESSION['errors']['mat_khau_cu'])): ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['mat_khau_cu']; ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Mật khẩu mới -->
                                            <div class="form-group">
                                                <label for="mat_khau_moi">Mật khẩu mới</label>
                                                <input type="password" id="mat_khau_moi" name="mat_khau_moi" placeholder="Nhập mật khẩu mới của bạn" class="form-control">
                                                <?php if (isset($_SESSION['errors']['mat_khau_moi'])): ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['mat_khau_moi']; ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Xác nhận mật khẩu mới -->
                                            <div class="form-group">
                                                <label for="xac_nhan_mat_khau_moi">Nhập lại mật khẩu mới</label>
                                                <input type="password" id="xac_nhan_mat_khau_moi" name="xac_nhan_mat_khau_moi" placeholder="Nhập lại mật khẩu mới của bạn" class="form-control">
                                                <?php if (isset($_SESSION['errors']['xac_nhan_mat_khau_moi'])): ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['xac_nhan_mat_khau_moi']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Nút cập nhật mật khẩu -->
                                        <button type="submit" class="btn btn-primary">Cập Nhật Mật Khẩu</button>
                                    </form>
                                    <?php unset($_SESSION['errors']); ?>



                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>
    <?php unset($_SESSION['errors']); ?>
    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>