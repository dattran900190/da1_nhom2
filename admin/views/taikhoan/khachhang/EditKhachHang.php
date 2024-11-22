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
                                            <h2 class="text-primary mb-4">Sửa tài khoản khách hàng</h2>
                                        </div>
                                        
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    
                                        <div class="flex-grow-1">
                                        <form action="<?= BASE_URL_ADMIN . '?act=sua-tai-khoan-quan-khach-hang' ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $taiKhoanKhachHang['id'] ?>">
                                                
                                                <div class="form-group">
                                                    <label>Tên Tài Khoản Khách Hàng</label>
                                                    <input type="text" class="form-control" value="<?=  $taiKhoanKhachHang['ho_ten'] ?>" name="ho_ten" placeholder="Nhập tên khuyến mãi"
                                                        value="<?= isset($_SESSION['old_data']['ho_ten']) ? $_SESSION['old_data']['ho_ten'] : '' ?>">
                                                    <small class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?? '' ?></small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email tài khoản khách hàng</label>
                                                    <input type="email" class="form-control" value="<?= $taiKhoanKhachHang['email'] ?>" name="email" placeholder="Nhập mã khuyến mãi"
                                                        value="<?= isset($_SESSION['old_data']['email']) ? $_SESSION['old_data']['email'] : '' ?>">
                                                    <small class="text-danger"><?= $_SESSION['errors']['email'] ?? '' ?></small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ngày sinh</label>
                                                    <input type="date" class="form-control" value="<?= $taiKhoanKhachHang['ngay_sinh'] ?>" name="ngay_sinh" placeholder="Nhập mã khuyến mãi"
                                                        value="<?= isset($_SESSION['old_data']['ngay_sinh']) ? $_SESSION['old_data']['ngay_sinh'] : '' ?>">
                                                    <small class="text-danger"><?= $_SESSION['errors']['ngay_sinh'] ?? '' ?></small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Số Điện Thoại</label>
                                                    <input type="text" class="form-control" value="<?= $taiKhoanKhachHang['so_dien_thoai'] ?>" name="so_dien_thoai" placeholder="Nhập mã khuyến mãi"
                                                        value="<?= isset($_SESSION['old_data']['so_dien_thoai']) ? $_SESSION['old_data']['so_dien_thoai'] : '' ?>">
                                                    <small class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?? '' ?></small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Địa chỉ</label>
                                                    <input type="text" class="form-control" value="<?= $taiKhoanKhachHang['dia_chi'] ?>" name="dia_chi" placeholder="Nhập mã khuyến mãi"
                                                        value="<?= isset($_SESSION['old_data']['dia_chi']) ? $_SESSION['old_data']['dia_chi'] : '' ?>">
                                                    <small class="text-danger"><?= $_SESSION['errors']['dia_chi'] ?? '' ?></small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Trạng Thái</label>
                                                   <select name="trang_thai" class="form-control">
                                                   <option value="1" <?=  $taiKhoanKhachHang['trang_thai'] == 1 ? 'selected' : '' ?>>Hoạt Động</option>
                                                   <option value="2" <?=  $taiKhoanKhachHang['trang_thai'] !== 1  ? 'selected' : '' ?>>Chưa Kích Hoạt</option>
                                                   </select>
                                                     
                                                    <small class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?? '' ?></small>
                                                </div>
                                                <div class="card-footer">
                                                <button style="margin-top: 10px;"   type="submit" class="btn btn-primary">Submit</button>
                                            
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