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
                                    <div class="flex-grow-1">
                                        <h2 class="text-primary mb-4">Sửa trạng thái liên hệ</h2>
                                    </div>
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">

                                        <div class="flex-grow-1">
                                            <form action="<?= BASE_URL_ADMIN . '?act=sua-lien-he' ?>" method="POST">
                                                <input type="hidden" name="lien_he_id" value="<?= $lienHe['id'] ?>">

                                                <div class="form-group">
                                                    <select id="inputStatus" name="trang_thai_lien_he" class="form-control custom-select">
                                                        <option selected disabled>Chọn trạng thái liên hệ</option>
                                                        <option <?= $lienHe['trang_thai_lien_he'] == 1 ? 'selected' : '' ?> value="1">Chưa xử lý</option>
                                                        <option <?= $lienHe['trang_thai_lien_he'] == 2 ? 'selected' : '' ?> value="2">Đã xử lý</option>
                                                    </select>
                                                    <small class="text-danger"><?= $_SESSION['errors']['trang_thai_lien_he'] ?? '' ?></small>
                                                </div>

                                                <div class="card-footer">
                                                    <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Submit</button>

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