<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | T-shirt Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

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
                    <div class="col-12">
                        <div class="card">
                            <!-- Form Header -->
                            <div class="card-header">
                                <h2 class="text-primary mb-4">Sửa Tài Khoản Quản Trị Viên</h2>
                            </div>

                            <!-- Form Body -->
                            <form action="<?= BASE_URL_ADMIN . '?act=sua-tai-khoan-quan-tri-vien' ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $taiKhoanQuanTri['id'] ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Admin Name and Email -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hoTen">Tên Tài Khoản Quản Trị Viên</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="hoTen"
                                                    name="ho_ten"
                                                    placeholder="Nhập tên quản trị viên"
                                                    value="<?= $_SESSION['old_data']['ho_ten'] ?? $taiKhoanQuanTri['ho_ten'] ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?? '' ?></small>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email Tài Khoản Quản Trị Viên</label>
                                                <input
                                                    type="email"
                                                    class="form-control"
                                                    id="email"
                                                    name="email"
                                                    placeholder="Nhập email quản trị viên"
                                                    value="<?= $_SESSION['old_data']['email'] ?? $taiKhoanQuanTri['email'] ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['email'] ?? '' ?></small>
                                            </div>
                                        </div>

                                        <!-- Admin Phone and Status -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="soDienThoai">Số Điện Thoại</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="soDienThoai"
                                                    name="so_dien_thoai"
                                                    placeholder="Nhập số điện thoại"
                                                    value="<?= $_SESSION['old_data']['so_dien_thoai'] ?? $taiKhoanQuanTri['so_dien_thoai'] ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?? '' ?></small>
                                            </div>

                                            <div class="form-group">
                                                <label for="trangThai">Trạng Thái</label>
                                                <select id="trangThai" name="trang_thai" class="form-control">
                                                    <option value="1" <?= $taiKhoanQuanTri['trang_thai'] == 1 ? 'selected' : '' ?>>Hoạt Động</option>
                                                    <option value="2" <?= $taiKhoanQuanTri['trang_thai'] == 2 ? 'selected' : '' ?>>Chưa Kích Hoạt</option>
                                                </select>
                                                <small class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?? '' ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Footer -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                                </div>
                            </form>
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