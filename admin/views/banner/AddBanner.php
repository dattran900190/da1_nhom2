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
                                            <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                                                <div class="card-body">
                                                <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">


                                                    <option selected disabled>Chọn danh mục sản phẩm</option>


                                                    <?php foreach ($listDanhMucSanPham as $danhmuc) : ?>
                                                    <option value="<?= $danhmuc['id'] ?>"><?= $danhmuc['ten_danh_muc'] ?></option>
                                                    <?php endforeach ?>
                                                    </select>
                                                    <div class="form-group">
                                                <label>Tên sản phẩm</label>
                                                <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm"required>
                                                <?php if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                                                <small class="text-danger"><?= $_SESSION['errors']['ten_san_pham']  ?></small><?php } ?>


                                                    </div>
                                                    <div class="form-group">
                                                        <label>Giá Sản Phẩm</label>
                                                        <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập mã khuyến mãi">
                                                        <?php if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['gia_san_pham']  ?></small><?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mã khuyến mãi</label>
                                                        <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập mức giảm giá">
                                                        <?php if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai']  ?></small><?php } ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Ảnh</label>
                                                        <input type="file" class="form-control" name="hinh_anh">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Album ảnh</label>
                                                        <input type="file" class="form-control" name="img_array[]" multiple>
                                                       
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số Lượng</label>
                                                        <input type="number" class="form-control" name="so_luong" placeholder="Nhập số luơng sản phẩm">
                                                        <?php if (isset($_SESSION['errors']['so_luong'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['so_luong']  ?></small><?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kích cỡ</label>
                                                        <input type="text" class="form-control" name="kich_co"placeholder="Nhập kích cỡ sản phẩm">
                                                        <?php if (isset($_SESSION['errors']['kich_co'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['kich_co']  ?></small><?php } ?>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Ngày nhập</label>
                                                        <input type="date" class="form-control" name="ngay_nhap">
                                                        <?php if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['ngay_nhap']  ?></small><?php } ?>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Mô tả sản phẩm</label>
                                                        <textarea name="mo_ta" id="" class="form-control" cols="30" rows="10" placeholder="Nhập mô tả sản phẩm">
                                                        <?php if (isset($_SESSION['errors']['mo_ta'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['mo_ta']  ?></small><?php } ?>
                                                        </textarea>
                                                    </div>
                                                   




                                                    <div class="form-group">
                                                        <label for="inputStatus">Trạng thái mã khuyến mãi</label>
                                                        <select id="inputStatus" name="trang_thai" class="form-control custom-select" >
                                                            <option selected disabled>Chọn trạng thái</option>
                                                            <option value = "1">Còn bán</option>
                                                            <option value = "1">dừng bán</option>
                                                        </select>
                                                        <small class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?? '' ?></small>
                                                    </div>
                                                   
                                                <?php if (isset($_SESSION['errors']['danh_muc_id'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['danh_muc_id'] ?></p>
                                                <?php  } ?>
                                                </div>


                                                <div class="card-footer">
                                                <button style = "margin-top: 30px" type="submit" class="btn btn-primary">Submit</button>
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
