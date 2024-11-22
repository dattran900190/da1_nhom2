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
                <!-- Order Summary Card -->
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-20">
                        <div class="card shadow-lg mb-5 rounded-3">
                            <div class="card-header bg-primary bg-gradient text-white text-center py-4">
                                <h4 class="card-title fw-bold mb-0">Chi tiết đơn hàng: <strong><?= $donHang['ma_don_hang'] ?></strong></h4>
                            </div>
                            <div class="card-body" id="print-area">
                                <div class="row">
                                    <!-- Left Side: Order Status and Order Details -->
                                    <!-- Order Status -->
                                    <?php
                                    $colorAlert = '';
                                    if ($donHang['trang_thai_id'] == 1) {
                                        $colorAlert = 'primary';
                                    } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9) {
                                        $colorAlert = 'warning';
                                    } elseif ($donHang['trang_thai_id'] == 10) {
                                        $colorAlert = 'success';
                                    } else {
                                        $colorAlert = 'danger';
                                    }
                                    ?>
                                    <div class="alert alert-<?= $colorAlert ?> py-4 shadow-sm" style="display: flex; justify-content: space-around;">
                                        <p class="mb-0">
                                            Ngày đặt: <strong><?= formatDate($donHang['ngay_dat']) ?></strong>
                                        </p>
                                        <p class="mb-0">
                                            Trạng thái: <strong><?= $donHang['ten_trang_thai'] ?></strong>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        $tong_tien_san_pham = 0;
                                        $gia_giam = 0;

                                        foreach ($sanPhamDonHang as $sanPham) {
                                            $product_total = $sanPham['don_gia'] * $sanPham['so_luong'];
                                            $tong_tien_san_pham += $product_total;

                                            foreach ($maKhuyenMai as $khuyenMai) {
                                                if ($khuyenMai['loai_khuyen_mai'] == 2) { // Percentage
                                                    $gia_giam += ($sanPham['don_gia'] * $khuyenMai['muc_giam_gia'] / 100) * $sanPham['so_luong'];
                                                } else { // Fixed discount
                                                    $gia_giam += $khuyenMai['muc_giam_gia'] * $sanPham['so_luong'];
                                                }
                                            }
                                        }

                                        $phivanchuyen = 30000;
                                        $tong_chi_phi = $tong_tien_san_pham + $phivanchuyen - $gia_giam;
                                        ?>

                                        <!-- Recipient Info -->
                                        <div class="card mb-4">
                                            <div class="card-header bg-dark text-white">
                                                <h5 class="card-title">Thông tin người nhận</h5>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Họ và tên:</strong> <?= $donHang['ten_nguoi_nhan'] ?></p>
                                                <p><strong>Email:</strong> <?= $donHang['email_nguoi_nhan'] ?></p>
                                                <p><strong>Số điện thoại:</strong> <?= $donHang['sdt_nguoi_nhan'] ?></p>
                                                <p><strong>Địa chỉ:</strong> <?= $donHang['dia_chi_nguoi_nhan'] ?></p>
                                            </div>
                                        </div>

                                        <!-- Order Info -->
                                        <div class="card mb-4">
                                            <div class="card-header bg-dark text-white">
                                                <h5 class="card-title">Thông tin đơn hàng</h5>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Mã đơn hàng:</strong> <?= $donHang['ma_don_hang'] ?></p>
                                                <p><strong>Tổng tiền:</strong> <?= number_format($tong_tien_san_pham, 0, ',', '.') ?> VNĐ</p>
                                                <p><strong>Ghi chú:</strong> <?= $donHang['ghi_chu'] ?? 'Không có ghi chú' ?></p>
                                                <p><strong>Thanh toán:</strong> <?= $donHang['ten_phuong_thuc'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Section -->
                                    <div class="col-md-6">
                                        <!-- Product Table -->
                                        <h4>Bảng thông tin sản phẩm</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover text-center align-middle">
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
                                                            <td><?= number_format(($sanPham['don_gia'] * $sanPham['so_luong']), 0, ',', '.') ?> VNĐ</td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Total Summary -->
                                        <h4>Tổng các phí cần thanh toán</h4>
                                        <p><strong>Thành tiền:</strong> <?= number_format($tong_tien_san_pham, 0, ',', '.') ?> VNĐ</p>
                                        <p><strong>Phí vận chuyển:</strong> <?= number_format($phivanchuyen, 0, ',', '.') ?> VNĐ</p>
                                        <p><strong>Khuyến mãi:</strong> <?= number_format($gia_giam, 0, ',', '.') ?> VNĐ</p>
                                        <hr>
                                        <h4 class="fw-bold">Tổng tiền cần thanh toán:
                                            <span class="text-success"><?= number_format($tong_chi_phi, 0, ',', '.') ?> VNĐ</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="card-footer text-end">
                        <a href="<?= BASE_URL_ADMIN ?>?act=quan-ly-don-hang" class="btn btn-secondary btn-sm me-2">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                        <a href="#" class="btn btn-success btn-sm" onclick="printInvoice()">
                            <i class="fas fa-print"></i> In hóa đơn
                        </a>
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

    <?php unset($_SESSION['errors']); ?>
    <!-- JAVASCRIPT -->
    <script>
        function printInvoice() {
            var printContent = document.getElementById('print-area').innerHTML;
            var printWindow = window.open('', '', 'height=600,width=800');

            // Writing the content to the new print window
            printWindow.document.write('<html><head><title>In hóa đơn</title>');
            printWindow.document.write('<link rel="stylesheet" href="path/to/your/bootstrap.css">'); // Link to your styles (Bootstrap or custom)
            printWindow.document.write('<style>@media print { .btn { display: none; } }</style>'); // Hide the print button during printing
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContent);
            printWindow.document.write('</body></html>');

            // Now print the content and close the window
            printWindow.document.close();
            printWindow.print();
        }
    </script>
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>