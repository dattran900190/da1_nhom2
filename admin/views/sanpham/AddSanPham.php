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
                    <h5>Thêm Sản Phẩm</h5>
                </div>
                <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <!-- Cột bên trái -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="danh_muc_id">Danh mục sản phẩm</label>
                                    <select class="form-control" name="danh_muc_id" id="danh_muc_id">
                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <?php foreach ($listDanhMucSanPham as $danhmuc) : ?>
                                            <option value="<?= $danhmuc['id'] ?>"><?= $danhmuc['ten_danh_muc'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger"><?= $_SESSION['errors']['danh_muc_id'] ?? '' ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="ten_san_pham">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" placeholder="Nhập tên sản phẩm" 
                                        value="<?= $_SESSION['old_data']['ten_san_pham'] ?? '' ?>">
                                    <small class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?? '' ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="gia_san_pham">Giá sản phẩm</label>
                                    <input type="text" class="form-control" id="gia_san_pham" name="gia_san_pham" placeholder="Nhập giá sản phẩm" 
                                        value="<?= $_SESSION['old_data']['gia_san_pham'] ?? '' ?>">
                                    <small class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?? '' ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                                    <input type="number" class="form-control" id="gia_khuyen_mai" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi" 
                                        value="<?= $_SESSION['old_data']['gia_khuyen_mai'] ?? '' ?>">
                                    <small class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai'] ?? '' ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="so_luong">Số lượng</label>
                                    <input type="number" class="form-control" id="so_luong" name="so_luong" 
                                        value="<?= $_SESSION['old_data']['so_luong'] ?? '' ?>">
                                    <small class="text-danger"><?= $_SESSION['errors']['so_luong'] ?? '' ?></small>
                                </div>
                            </div>

                            <!-- Cột bên phải -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hinh_anh">Hình ảnh</label>
                                    <input type="file" class="form-control" id="hinh_anh" name="hinh_anh">
                                    <small class="text-danger"><?= $_SESSION['errors']['hinh_anh'] ?? '' ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="kich_co">Kích cỡ</label>
                                    <input type="text" class="form-control" id="kich_co" name="kich_co" 
                                        value="<?= $_SESSION['old_data']['kich_co'] ?? '' ?>">
                                    <small class="text-danger"><?= $_SESSION['errors']['kich_co'] ?? '' ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="ngay_nhap">Ngày nhập</label>
                                    <input type="date" class="form-control" id="ngay_nhap" name="ngay_nhap" 
                                        value="<?= $_SESSION['old_data']['ngay_nhap'] ?? '' ?>">
                                    <small class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?? '' ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="mo_ta">Mô tả sản phẩm</label>
                                    <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3" placeholder="Nhập mô tả sản phẩm"><?= $_SESSION['old_data']['mo_ta'] ?? '' ?></textarea>
                                    <small class="text-danger"><?= $_SESSION['errors']['mo_ta'] ?? '' ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="trang_thai">Trạng thái</label>
                                    <select class="form-control" id="trang_thai" name="trang_thai">
                                        <option disabled <?= !isset($_SESSION['old_data']['trang_thai']) ? 'selected' : '' ?>>Chọn trạng thái</option>
                                        <option value="1" <?= (isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '1') ? 'selected' : '' ?>>Còn hạn</option>
                                        <option value="2" <?= (isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '2') ? 'selected' : '' ?>>Hết hạn</option>
                                    </select>
                                    <small class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?? '' ?></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
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