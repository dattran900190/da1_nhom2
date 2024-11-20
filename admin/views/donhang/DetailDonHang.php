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
                                    switch ($donHang['trang_thai_id']) {
                                        case 1:
                                            $colorAlert = 'primary';
                                            break;
                                        case 10:
                                            $colorAlert = 'success';
                                            break;
                                        default:
                                            $colorAlert = 'warning';
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
                                        $tong_chi_phi = 0;
                                        $tong_tien_san_pham = 0;
                                        $tong_tien = 0;

                                        // Loop over products to calculate total cost and discount
                                        foreach ($sanPhamDonHang as $sanPham) {
                                            $tong_chi_phi += $sanPham['don_gia'] * $sanPham['so_luong'];
                                            $tong_tien_san_pham += $sanPham['don_gia'] * $sanPham['so_luong'];

                                            $gia_giam = 0;

                                            // Loop through all promotions
                                            foreach ($maKhuyenMai as $khuyenMai) {
                                                // Check if promotion type is percentage
                                                if ($khuyenMai['loai_khuyen_mai'] == 'percentage') {
                                                    $gia_giam = ($sanPham['don_gia'] * $khuyenMai['muc_giam_gia']) / 100;
                                                } else {
                                                    // Fixed discount
                                                    $gia_giam = $khuyenMai['muc_giam_gia'];
                                                }

                                                // Calculate final price per product after applying discount
                                                $thanh_tien = ($sanPham['don_gia'] - $gia_giam) * $sanPham['so_luong'];
                                                $tong_tien += $thanh_tien;  // Accumulate total
                                            }
                                        }

                                        // Final calculation for the total amount (including shipping and promotions)
                                        $phivanchuyen = 30000;
                                        $khuyenmai = $gia_giam;  // This is the last calculated discount for now, you might want to handle multiple promotions if applicable.
                                        ?>



                                        <!-- Order Details -->
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

                                        <div class="card mb-4">
                                            <div class="card-header bg-dark text-white">
                                                <h5 class="card-title">Thông tin người đặt</h5>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Họ và tên</strong>: <?= $donHang['ho_ten'] ?></p>
                                                <hr>
                                                <p><strong>Email:</strong> <?= $donHang['email'] ?></p>
                                                <hr>
                                                <p><strong>Số điện thoại:</strong> <?= $donHang['so_dien_thoai'] ?></p>
                                                <hr>
                                                <p><strong>Ngày đặt:</strong> <?= formatDate($donHang['ngay_dat']) ?></p>
                                            </div>
                                        </div>

                                        <div class="card mb-4">
                                            <div class="card-header bg-dark text-white">
                                                <h5 class="card-title">Thông tin đơn hàng</h5>
                                            </div>

                                            <div class="card-body">
                                                <p><strong>Mã đơn hàng:</strong> <?= $donHang['ma_don_hang'] ?></p>
                                                <hr>
                                                <p><strong>Tổng tiền:</strong> <?= number_format($tong_chi_phi, 0, ',', '.') ?> VNĐ </p>
                                                <hr>
                                                <p><strong>Ghi chú:</strong> <?= isset($donHang['ghi_chu']) ? $donHang['ghi_chu'] : 'Không có ghi chú' ?></p>
                                                <hr>
                                                <p><strong>Thanh toán:</strong> <?= $donHang['ten_phuong_thuc'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Side: Product Table and Total Summary -->
                                    <div class="col-md-6">
                                        <!-- Product Table -->
                                        <h4>Bảng thông tin sản phẩm</h4><br>
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
                                                            <td><?= number_format(($sanPham['don_gia'] - $gia_giam) * $sanPham['so_luong'], 0, ',', '.') ?> VNĐ</td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="4" class="text-end">Tổng cộng:</th>
                                                        <th><?= number_format($tong_tien_san_pham, 0, ',', '.') ?> VNĐ</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        <!-- Total Summary -->
                                        <div class="mt-4">
                                            <h4>Tổng các phí cần thanh toán</h4><br>
                                            <h6><strong>Thành tiền:</strong> <?= number_format($tong_tien_san_pham, 0, ',', '.') ?> VNĐ</h6>
                                            <h6><strong>Phí vận chuyển:</strong> 30.000 VNĐ</h6>
                                            <h6><strong>Khuyến mãi:</strong>
                                                <?= $khuyenMai['loai_khuyen_mai'] == 'percentage' ? $khuyenMai['muc_giam_gia'] . '%' : number_format($khuyenMai['muc_giam_gia'], 0, ',', '.') . ' VNĐ' ?>
                                            </h6>
                                            <hr>
                                            <h4 class="fw-bold">Tổng tiền cần thanh toán:
                                                 <span class="text-success"><?= number_format($tong_tien_san_pham + $phivanchuyen - $khuyenmai, 0, ',', '.') ?> VNĐ</span>
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