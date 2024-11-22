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
                            <h2 class="text-primary mb-4">Thêm Tài Khoản Quản Trị</h2>
                        </div>

                        <!-- Form Body -->
                        <form action="<?= BASE_URL_ADMIN . '?act=them-tai-khoan-quan-tri-vien' ?>" method="POST">
                            <div class="card-body">
                                <!-- Full Name -->
                                <div class="form-group">
                                    <label for="hoTen">Họ Và Tên</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="hoTen" 
                                        name="ho_ten" 
                                        placeholder="Nhập họ và tên của bạn"
                                        value="<?= $_SESSION['old_data']['ho_ten'] ?? '' ?>"
                                    >
                                    <small class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?? '' ?></small>
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input 
                                        type="email" 
                                        class="form-control" 
                                        id="email" 
                                        name="email" 
                                        placeholder="Nhập email của bạn"
                                        value="<?= $_SESSION['old_data']['email'] ?? '' ?>"
                                    >
                                    <small class="text-danger"><?= $_SESSION['errors']['email'] ?? '' ?></small>
                                </div>
                            </div>

                            <!-- Form Footer -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm Tài Khoản</button>
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