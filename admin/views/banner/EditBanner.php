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
                        <!-- Header -->
                        <div class="card-header">
                            <h2 class="text-primary mb-4">Sửa ảnh banner</h2>
                        </div>

                        <!-- Form -->
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-banner' ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $banner['id'] ?>">

                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- Banner Image Upload -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bannerImage">Ảnh banner</label>
                                            <input 
                                                type="file" 
                                                class="form-control" 
                                                id="bannerImage" 
                                                name="banner_img"
                                            >
                                            
                                            <small class="text-danger"><?= $_SESSION['errors']['banner_img'] ?? '' ?></small>
                                        </div>
                                        <img src="<?= BASE_URL . $banner['banner_img'] ?>" alt="" width="100px">
                                    </div>

                                    <!-- Banner Status -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bannerStatus">Trạng thái banner</label>
                                            <select id="bannerStatus" name="trang_thai" class="form-control custom-select">
                                                <option selected disabled>Chọn trạng thái banner</option>
                                                <option <?= $banner['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Hiển thị</option>
                                                <option <?= $banner['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Bị ẩn</option>
                                            </select>
                                            <small class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?? '' ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Footer -->
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

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>