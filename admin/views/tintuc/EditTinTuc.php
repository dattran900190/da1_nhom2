<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | T-shirt Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />



    <script src="https://cdn.tiny.cloud/1/421uhh3ib000zw8o1s17ut2ksffydg3v3xymirypedlcb2e1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
    tinymce.init({
    selector: '.tinymce',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar_mode: 'floating',
    });
    </script>


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
                        <div class="card-header">
                        <h2 class="text-primary">Sửa tin tức</h2>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-tin-tuc' ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $tinTuc['id'] ?>">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tiêu đề</label>
                                            <input type="text" class="form-control" value="<?= $tinTuc['tieu_de'] ?>" name="tieu_de" placeholder="Nhập tiêu đề"
                                                value="<?= isset($_SESSION['old_data']['tieu_de']) ? $_SESSION['old_data']['tieu_de'] : '' ?>">
                                            <small class="text-danger"><?= $_SESSION['errors']['tieu_de'] ?? '' ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô Tả</label>
                                            <input type="text" class="form-control" value="<?= $tinTuc['mo_ta'] ?>" name="mo_ta" placeholder="Nhập mô tả"
                                                value="<?= isset($_SESSION['old_data']['mo_ta']) ? $_SESSION['old_data']['mo_ta'] : '' ?>">
                                            <small class="text-danger"><?= $_SESSION['errors']['mo_ta'] ?? '' ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label>ID tác giả</label>
                                            <input type="number" class="form-control" value="<?= $tinTuc['tac_gia_id'] ?>" name="tac_gia_id" placeholder="Nhập ID tác giả"
                                                value="<?= isset($_SESSION['old_data']['tac_gia_id']) ? $_SESSION['old_data']['tac_gia_id'] : '' ?>">
                                            <small class="text-danger"><?= $_SESSION['errors']['tac_gia_id'] ?? '' ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày đăng</label>
                                            <input type="date" class="form-control" value="<?= $tinTuc['ngay_dang'] ?>" name="ngay_dang"
                                                value="<?= isset($_SESSION['old_data']['ngay_dang']) ? $_SESSION['old_data']['ngay_dang'] : '' ?>">
                                            <small class="text-danger"><?= $_SESSION['errors']['ngay_dang'] ?? '' ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày cập nhật</label>
                                            <input type="date" class="form-control" value="<?= $tinTuc['ngay_cap_nhat'] ?>" name="ngay_cap_nhat"
                                                value="<?= isset($_SESSION['old_data']['ngay_cap_nhat']) ? $_SESSION['old_data']['ngay_cap_nhat'] : '' ?>">
                                            <small class="text-danger"><?= $_SESSION['errors']['ngay_cap_nhat'] ?? '' ?></small>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea class="tinymce form-control" name="noi_dung" placeholder="Nhập nội dung bài viết"><?= isset($_SESSION['old_data']['noi_dung']) ? $_SESSION['old_data']['noi_dung'] : ($tinTuc['noi_dung'] ?? '') ?></textarea>
                                            <small class="text-danger"><?= $_SESSION['errors']['noi_dung'] ?? '' ?></small>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
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