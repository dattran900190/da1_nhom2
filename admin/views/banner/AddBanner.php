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
                            <div class="flex-grow-1">
                                <h2 class="text-primary mb-4">Thêm ảnh banner</h2>
                            </div>
                            <form action="<?= BASE_URL_ADMIN . '?act=them-banner' ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ảnh Banner</label>
                                                <input type="file" class="form-control" name="banner_img" placeholder="Nhập ảnh banner"
                                                    value="<?= isset($_SESSION['old_data']['banner_img']) ? $_SESSION['old_data']['banner_img'] : '' ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['banner_img'] ?? '' ?></small>
                                            </div>
                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputStatus">Trạng thái mã khuyến mãi</label>
                                                <select id="inputStatus" name="trang_thai" class="form-control custom-select">
                                                    <option disabled <?= !isset($_SESSION['old_data']['trang_thai']) ? 'selected' : '' ?>>Chọn trạng thái banner</option>
                                                    <option value="1" <?= (isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '0') ? 'selected' : '' ?>>hiển thị</option>
                                                    <option value="2" <?= (isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '1') ? 'selected' : '' ?>>bị ẩn</option>
                                                </select>
                                                <small class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?? '' ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Submit</button>
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