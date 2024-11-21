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
                                <h2 class="text-primary mb-4">Sửa danh mục sản phẩm</h2>
                            </div>
                            <form action="<?= BASE_URL_ADMIN . '?act=sua-danh-muc-san-pham' ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $danhMucSanPham['id'] ?>">

                                <div class="card-body">
                                    <div class="row">
                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên danh mục sản phẩm</label>
                                                <input type="text" class="form-control" value="<?= $danhMucSanPham['ten_danh_muc'] ?>" name="ten_danh_muc" placeholder="Nhập tên khuyến mãi"
                                                    value="<?= isset($_SESSION['old_data']['ten_danh_muc']) ? $_SESSION['old_data']['ten_danh_muc'] : '' ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['ten_danh_muc'] ?? '' ?></small>
                                            </div>
                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mô tả danh mục</label>
                                                <input type="text" class="form-control" value="<?= $danhMucSanPham['mo_ta'] ?>" name="mo_ta" placeholder="Nhập mã khuyến mãi"
                                                    value="<?= isset($_SESSION['old_data']['mo_ta']) ? $_SESSION['old_data']['mo_ta'] : '' ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['mo_ta'] ?? '' ?></small>
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