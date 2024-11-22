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
                            <div class="card-header">
                                <h4>Sửa Khuyến Mãi</h4>
                            </div>
                            <form action="<?= BASE_URL_ADMIN . '?act=sua-khuyen-mai' ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $khuyenmai['id'] ?? ($_POST['id'] ?? '') ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên khuyến mãi</label>
                                                <input type="text" class="form-control" name="ten_khuyen_mai" placeholder="Nhập tên khuyến mãi" value="<?= $khuyenmai['ten_khuyen_mai'] ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['ten_khuyen_mai'] ?? '' ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label>Mã khuyến mãi</label>
                                                <input type="text" class="form-control" name="ma_khuyen_mai" placeholder="Nhập mã khuyến mãi" value="<?= $khuyenmai['ma_khuyen_mai'] ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['ma_khuyen_mai'] ?? '' ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label>Mức giảm giá</label>
                                                <input type="number" class="form-control" name="muc_giam_gia" placeholder="Nhập mức giảm giá" value="<?= $khuyenmai['muc_giam_gia'] ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['muc_giam_gia'] ?? '' ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label>Số lượng</label>
                                                <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng" value="<?= $khuyenmai['so_luong'] ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['so_luong'] ?? '' ?></small>
                                            </div>
                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ngày bắt đầu</label>
                                                <input type="date" class="form-control" name="ngay_bat_dau" value="<?= $khuyenmai['ngay_bat_dau'] ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['ngay_bat_dau'] ?? '' ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày kết thúc</label>
                                                <input type="date" class="form-control" name="ngay_ket_thuc" value="<?= $khuyenmai['ngay_ket_thuc'] ?>">
                                                <small class="text-danger"><?= $_SESSION['errors']['ngay_ket_thuc'] ?? '' ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label>Trạng thái mã khuyến mãi</label>
                                                <select name="trang_thai" class="form-control custom-select">
                                                    <option disabled selected>Chọn trạng thái</option>
                                                    <option value="1" <?= $khuyenmai['trang_thai'] == 1 ? 'selected' : '' ?>>Còn hạn</option>
                                                    <option value="2" <?= $khuyenmai['trang_thai'] == 2 ? 'selected' : '' ?>>Hết hạn</option>
                                                </select>
                                                <small class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?? '' ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label>Loại khuyến mãi</label>
                                                <select name="loai_khuyen_mai" class="form-control custom-select">
                                                    <option disabled selected>Chọn loại khuyến mãi</option>
                                                    <option value="1" <?= $khuyenmai['loai_khuyen_mai'] == 1 ? 'selected' : '' ?>>Số tiền cố định</option>
                                                    <option value="2" <?= $khuyenmai['loai_khuyen_mai'] == 2 ? 'selected' : '' ?>>Phần trăm</option>
                                                </select>
                                                <small class="text-danger"><?= $_SESSION['errors']['loai_khuyen_mai'] ?? '' ?></small>
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