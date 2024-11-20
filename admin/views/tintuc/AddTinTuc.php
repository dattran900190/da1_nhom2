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
                    <div class="col">
                        <div class="h-100">
                            <div class="row mb-3 pb-1">
                                <div class="col-12">
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                        <div class="flex-grow-1">
                                            <form action="<?= BASE_URL_ADMIN . '?act=them-tin-tuc' ?>" method="POST">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Tiêu đề</label>
                                                        <input type="text" class="form-control" name="tieu_de" placeholder="Nhập tiêu đề"
                                                            value="<?= isset($_SESSION['old_data']['tieu_de']) ? $_SESSION['old_data']['tieu_de'] : '' ?>">
                                                        <small class="text-danger"><?= $_SESSION['errors']['tieu_de'] ?? '' ?></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nội dung</label>
                                                        <input type="text" class="form-control" name="noi_dung" placeholder="Nhập nội dung"
                                                            value="<?= isset($_SESSION['old_data']['noi_dung']) ? $_SESSION['old_data']['noi_dung'] : '' ?>">
                                                        <small class="text-danger"><?= $_SESSION['errors']['noi_dung'] ?? '' ?></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ID tác giả</label>
                                                        <input type="number" class="form-control" name="tac_gia_id" placeholder="Nhập ID tác giả"
                                                            value="<?= isset($_SESSION['old_data']['tac_gia_id']) ? $_SESSION['old_data']['tac_gia_id'] : '' ?>">
                                                        <small class="text-danger"><?= $_SESSION['errors']['tac_gia_id'] ?? '' ?></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ngày đăng</label>
                                                        <input type="date" class="form-control" name="ngay_dang"
                                                            value="<?= isset($_SESSION['old_data']['ngay_dang']) ? $_SESSION['old_data']['ngay_dang'] : '' ?>">
                                                        <small class="text-danger"><?= $_SESSION['errors']['ngay_dang'] ?? '' ?></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ngày cập nhật</label>
                                                        <input type="date" class="form-control" name="ngay_cap_nhat"
                                                            value="<?= isset($_SESSION['old_data']['ngay_cap_nhat']) ? $_SESSION['old_data']['ngay_cap_nhat'] : '' ?>">
                                                        <small class="text-danger"><?= $_SESSION['errors']['ngay_cap_nhat'] ?? '' ?></small>
                                                    </div>
                                                   
                                                </div>

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
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