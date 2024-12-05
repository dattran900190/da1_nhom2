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
    require_once "layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "layouts/header.php";

        require_once "layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
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
                                                <!-- <h4 class="fs-16 mb-1">Xin chào, Ahihi</h4> -->
                                                <h3 class="text-muted mb-0">Trang thống kê</h3>
                                            </div>

                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                                <div class="row d-flex justify-content-center">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Tổng thu nhập</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-success fs-14 mb-0">
                                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                  
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>
                                                                <?= number_format($tongThuNhap, 0, '.', '.') ?>
                                                            </span>VNĐ </h4>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                                            <i class="bx bx-dollar-circle text-success"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn hàng</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-danger fs-14 mb-0">
                                                            <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <?php
                                                        $tongAllDonHang = count($listAllDonHang);
                                                        ?>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>
                                                                <?= $tongAllDonHang ?>
                                                            </span>ĐƠN HÀNG </h4>
                                                        <!-- <a href="#" class="text-decoration-underline">Tất cả đơn đặt hàng</a> -->
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                                            <i class="bx bx-shopping-bag text-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Khách hàng</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-success fs-14 mb-0">
                                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <?php
                                                        $tongKhachHang = 0;
                                                        foreach ($listTaiKhoan as $khachHang):
                                                            if ($khachHang['chuc_vu_id'] == 2) {
                                                                $tongKhachHang++;
                                                            }
                                                        endforeach;
                                                        ?>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>
                                                                <?= $tongKhachHang ?>
                                                            </span>NGƯỜI </h4>
                                                        <!-- <a href="#" class="text-decoration-underline">Xem chi tiết khác hàng</a> -->
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                            <i class="bx bx-user-circle text-warning"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <!-- <div class="col-xl-3 col-md-6">
                                       
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Số dư của tôi</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-muted fs-14 mb-0">
                                                            +0.00 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <?php
                                                        $tongThuNhap = 0;


                                                        foreach ($listDonHang as $donHang) {
                                                            $tongThuNhap += $donHang['don_gia'];
                                                        }



                                                        $soDu = $tongThuNhap * 0.6;
                                                        ?>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>
                                                                <?= number_format($soDu, 0, ',', '.') ?>
                                                            </span> VNĐ</h4>
                                                       
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                            <i class="bx bx-wallet text-primary"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>


                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Sản phẩm bán chạy</h4>

                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <div class="table-responsive table-card">
                                                    <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                                        <tbody>
                                                            <?php
                                                            $maxProducts = 5;
                                                            $count = 0;
                                                            foreach ($listDetailDonHang as $sanPham) {
                                                                if ($count >= $maxProducts) break;
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                                <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" class="img-fluid d-block" />
                                                                            </div>
                                                                            <div>
                                                                                <h5 class="fs-14 my-1"><a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id=' . $sanPham['san_pham_id'] ?> " class="text-reset"><?= $sanPham['ten_san_pham'] ?></a></h5>
                                                                                <span class="text-muted"><?= formatDate($sanPham['ngay_dat']) ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal"><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') == 0 ?  number_format($sanPham['gia_san_pham'], 0, ',', '.') :  number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?> VNĐ</h5>
                                                                        <span class="text-muted">Giá</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal"><?= $sanPham['so_don_dat'] ?></h5>
                                                                        <span class="text-muted">Đơn đặt</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal"><?= $sanPham['tong_so_luong'] ?></h5>
                                                                        <span class="text-muted">Số lượng</span>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                                $count++;
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                                    <div class="col-sm">
                                                        <div class="text-muted">
                                                            Hiển thị <span class="fw-semibold">5</span> Kết quả bán chạy nhất trong tháng <?= date('m') ?>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Đơn đặt hàng gần đây</h4>
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-soft-info btn-sm material-shadow-none">
                                                        <i class="ri-file-list-3-line align-middle"></i> Generate Report
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="table-responsive table-card">
                                                    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                        <thead class="text-muted table-light">
                                                            <tr>
                                                                <th scope="col">ID đơn hàng</th>
                                                                <th scope="col">Khách hàng</th>
                                                                <th scope="col">Sản phẩm</th>
                                                                <th scope="col">Số lượng</th>
                                                                <th scope="col">Trạng thái</th>
                                                                <th scope="col">Đánh giá</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($listTaiKhoanKhachHang as $khachHang): ?>
                                                                <?php foreach ($listDetailDonHang as $donHang): ?>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2112</a>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="flex-shrink-0 me-2">
                                                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle material-shadow" />
                                                                                </div>
                                                                                <div class="flex-grow-1"><?= $khachHang['ho_ten'] ?></div>
                                                                            </div>
                                                                        </td>
                                                                        <td>Clothes</td>
                                                                        <td>
                                                                            <span class="text-success"><?= $donHang['tong_so_luong'] ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span class="badge bg-success-subtle text-success"><?= $donHang['trang_thai_id'] ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <h5 class="fs-14 fw-medium mb-0">5.0<span class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach ?>
                                                            <?php endforeach ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php
            require_once "layouts/footer.php";
            ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



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
    require_once "layouts/libs_js.php";
    ?>

</body>

</html>