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
                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">

                                                <div class="row">
                                                    <!-- Left Side: Product Details -->
                                                    <div class="col-md-6">
                                                        <!-- Product Category -->
                                                        <div class="form-group">
                                                            <label for="danh_muc_id">Danh mục sản phẩm</label>
                                                            <select class="form-control" name="danh_muc_id" id="danh_muc_id">
                                                                <option selected disabled>Chọn danh mục sản phẩm</option>
                                                                <?php foreach ($listDanhMucSanPham as $danhmuc) : ?>
                                                                    <option value="<?= $danhmuc['id'] ?>"><?= $danhmuc['ten_danh_muc'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>

                                                        <!-- Product Name -->
                                                        <div class="form-group">
                                                            <label for="ten_san_pham">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" name="ten_san_pham" id="ten_san_pham" placeholder="Nhập tên sản phẩm">
                                                            <?php if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                                                                <small class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?></small>
                                                            <?php } ?>
                                                        </div>

                                                        <!-- Product Price -->
                                                        <div class="form-group">
                                                            <label for="gia_san_pham">Giá sản phẩm</label>
                                                            <input type="number" class="form-control" name="gia_san_pham" id="gia_san_pham" placeholder="Nhập giá sản phẩm">
                                                            <?php if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                                                                <small class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?></small>
                                                            <?php } ?>
                                                        </div>

                                                        <!-- Discount -->
                                                        <div class="form-group">
                                                            <label for="gia_khuyen_mai">Mã khuyến mãi</label>
                                                            <input type="number" class="form-control" name="gia_khuyen_mai" id="gia_khuyen_mai" placeholder="Nhập mức giảm giá">
                                                            <?php if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                                                                <small class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai'] ?></small>
                                                            <?php } ?>
                                                        </div>

                                                        <!-- Quantity -->
                                                        <div class="form-group">
                                                            <label for="so_luong">Số lượng</label>
                                                            <input type="number" class="form-control" name="so_luong" id="so_luong" placeholder="Nhập số lượng sản phẩm">
                                                            <?php if (isset($_SESSION['errors']['so_luong'])) { ?>
                                                                <small class="text-danger"><?= $_SESSION['errors']['so_luong'] ?></small>
                                                            <?php } ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="mau_id">Màu sản phẩm</label>
                                                            <select class="form-control" name="mau_id" id="mau_id">
                                                                <option selected disabled>Chọn màu sản phẩm</option>
                                                                <?php foreach ($listMauSanPham as $mau) : ?>
                                                                    <option value="<?= $mau['id'] ?>"><?= $mau['ten_mau'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>

                                                        <!-- Product Date -->
                                                        <div class="form-group">
                                                            <label for="ngay_nhap">Ngày nhập</label>
                                                            <input type="date" class="form-control" name="ngay_nhap" id="ngay_nhap">
                                                            <?php if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                                                                <small class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?></small>
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                    <!-- Right Side: Images & Description -->
                                                    <div class="col-md-6">
                                                        <!-- Single Product Image -->
                                                        <div class="form-group">
                                                            <label for="hinh_anh">Ảnh</label>
                                                            <input type="file" class="form-control" name="hinh_anh" id="hinh_anh">
                                                        </div>

                                                        <!-- Multiple Product Images -->
                                                        <div class="form-group">
                                                            <label for="img_array">Album ảnh</label>
                                                            <input type="file" class="form-control" name="img_array[]" id="img_array" multiple>
                                                        </div>

                                                        <!-- Product Description -->
                                                        <div class="form-group">
                                                            <label for="mo_ta">Mô tả sản phẩm</label>
                                                            <textarea name="mo_ta" id="mo_ta" class="form-control" cols="30" rows="10" placeholder="Nhập mô tả sản phẩm"></textarea>
                                                        </div>

                                                        <!-- Discount Status -->
                                                        <div class="form-group">
                                                            <label for="inputStatus">Trạng thái mã khuyến mãi</label>
                                                            <select id="inputStatus" name="trang_thai" class="form-control custom-select">
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1">Còn bán</option>
                                                                <option value="0">Dừng bán</option>
                                                            </select>
                                                            <small class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?? '' ?></small>
                                                        </div>

                                                        <!-- Collection -->
                                                        <div class="form-group">
                                                            <label for="bo_suu_tap_id">Bộ sưu tập</label>
                                                            <select class="form-control" name="bo_suu_tap_id" id="bo_suu_tap_id">
                                                                <option selected disabled>Chọn bộ sưu tập</option>
                                                                <?php foreach ($listBoSuuTap as $bosuutap) : ?>
                                                                    <option value="<?= $bosuutap['id'] ?>"><?= $bosuutap['ten_bo_suu_tap'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" style="margin-top: 30px">Submit</button>
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