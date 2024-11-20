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
                                            <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">
                                                <input type="hidden" name="don_hang_id" value="<?= $donHang['id'] ?>">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <h4>Sửa trạng thái đơn hàng</h4>

                                                        <!-- <label for="inputStatus">Trạng thái đơn hàng</label> -->
                                                        <select id="inputStatus" name="trang_thai_id" class="form-control custom-select">
                                                            <?php foreach ($listTrangThaiDonHang as $trangThai) : ?>
                                                                <option
                                                                    <?php if ($donHang['trang_thai_id'] > $trangThai['id'] || in_array($donHang['trang_thai_id'], [9, 10, 11])) {
                                                                        echo 'disabled';
                                                                    } ?>
                                                                    <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?>
                                                                    value="<?= $trangThai['id'] ?>">
                                                                    <?= $trangThai['ten_trang_thai'] ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <br>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <br>

                                            <div class="col-lg-12 col-xl-20">
                                                <h4>Thông tin đơn hàng</h4>
                                                <div class="card shadow-lg mb-5 rounded-3">
                                                    <div class="card-body" id="print-area">
                                                        <div class="row">
                                                            <?php
                                                            $tong_chi_phi = 0;
                                                            foreach ($sanPhamDonHang as $sanPham) {
                                                                $tong_chi_phi += $sanPham['don_gia'] * $sanPham['so_luong'];
                                                            }

                                                            $tong_tien = 0;
                                                            foreach ($sanPhamDonHang as $key => $sanPham) {
                                                                $tong_tien += $sanPham['don_gia'] * $sanPham['so_luong'];
                                                            }
                                                            ?>
                                                            <!-- Recipient Information -->
                                                            <div class="col-md-4">
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-dark text-white">
                                                                        <h5 class="card-title">Thông tin người nhận</h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <p><strong>Họ và tên:</strong> <?= $donHang['ten_nguoi_nhan'] ?></p>
                                                                        <hr>
                                                                        <p><strong>Email:</strong> <?= $donHang['email_nguoi_nhan'] ?></p>
                                                                        <hr>
                                                                        <p><strong>Số điện thoại:</strong> <?= $donHang['sdt_nguoi_nhan'] ?></p>
                                                                        <hr>
                                                                        <p><strong>Địa chỉ:</strong> <?= $donHang['dia_chi_nguoi_nhan'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Placer Information -->
                                                            <div class="col-md-4">
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-dark text-white">
                                                                        <h5 class="card-title">Thông tin người đặt</h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <p><strong>Họ và tên:</strong> <?= $donHang['ho_ten'] ?></p>
                                                                        <hr>
                                                                        <p><strong>Email:</strong> <?= $donHang['email'] ?></p>
                                                                        <hr>
                                                                        <p><strong>Số điện thoại:</strong> <?= $donHang['so_dien_thoai'] ?></p>
                                                                        <hr>
                                                                        <p><strong>Ngày đặt:</strong> <?= formatDate($donHang['ngay_dat']) ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Order Information -->
                                                            <div class="col-md-4">
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-dark text-white">
                                                                        <h5 class="card-title">Thông tin đơn hàng</h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <p><strong>Mã đơn hàng:</strong> <?= $donHang['ma_don_hang'] ?></p>
                                                                        <hr>
                                                                        <p><strong>Tổng tiền:</strong> <?= number_format($tong_chi_phi, 0, ',', '.') ?> VNĐ</p>
                                                                        <hr>
                                                                        <p><strong>Ghi chú:</strong> <?= isset($donHang['ghi_chu']) ? $donHang['ghi_chu'] : 'Không có ghi chú' ?></p>
                                                                        <hr>
                                                                        <p><strong>Thanh toán:</strong> <?= $donHang['ten_phuong_thuc'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <h4>Bảng thông tin sản phẩm</h4>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-striped table-bordered text-center align-middle">
                                                                        <thead class="table-dark">
                                                                            <tr>
                                                                                <th>STT</th>
                                                                                <th>Tên sản phẩm</th>
                                                                                <th>Đơn giá</th>
                                                                                <th>Số lượng</th>
                                                                                <th>Thành tiền</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach ($sanPhamDonHang as $key => $sanPham) : ?>
                                                                                <tr>
                                                                                    <td><?= $key + 1 ?></td>
                                                                                    <td><?= $sanPham['ten_san_pham'] ?></td>
                                                                                    <td><?= number_format($sanPham['don_gia'], 0, ',', '.') ?> VNĐ</td>
                                                                                    <td><?= $sanPham['so_luong'] ?></td>
                                                                                    <td><?= number_format($sanPham['don_gia'] * $sanPham['so_luong'], 0, ',', '.') ?> VNĐ</td>
                                                                                </tr>
                                                                            <?php endforeach; ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th colspan="5" class="text-end">Tổng cộng: <?= number_format($tong_tien, 0, ',', '.') ?> VNĐ</th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4 ">
                                                            <h4>Tổng các phí cần thanh toán</h4><br>
                                                            <h6><strong>Thành tiền:</strong> <?= number_format($tong_tien, 0, ',', '.') ?> VNĐ</h6>
                                                            <h6><strong>Phí vận chuyển:</strong> 30.000 VNĐ</h6>
                                                            <h6><strong>Khuyến mãi:</strong> 39.000 VNĐ</h6>
                                                            <hr>
                                                            <h4 class="fw-bold">Tổng tiền: <span class="text-success"><?= number_format($tong_tien + 30000 - 39000, 0, ',', '.') ?> VNĐ</span></h4>
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

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>