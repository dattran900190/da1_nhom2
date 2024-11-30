<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | T-shirt Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column mb-4">
                                        <div class="flex-grow-1">
                                            <h2 class="text-primary mb-4">Quản lý sản phẩm</h2>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <a href="<?= BASE_URL_ADMIN ?>?act=form-them-san-pham" class="btn btn-success">
                                                <i class="fas fa-plus"></i> Thêm mới
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input type="text" id="searchBar" class="form-control" placeholder="Tìm kiếm khuyến mãi...">
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped text-center">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên Sản Phẩm</th>
                                                    <th>Giá Sản PHẩm</th>
                                                    <th>Mức giảm giá</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Số Lượng</th>
                                                    <th>Màu sắc</th>
                                                    <th>Ngày Nhập</th>
                                                    <th>Mô Tả</th>
                                                    <th>Danh mục sản phẩm</th>
                                                    <th>Bộ sưu tập sản phẩm</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody id="promoTableBody">
                                                <?php foreach ($listSanPham as $key => $sanpham): ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $sanpham['ten_san_pham'] ?></td>
                                                        <td><?= $sanpham['gia_san_pham'] ?></td>
                                                        <td><?= $sanpham['gia_khuyen_mai'] ?></td>
                                                        <td>
                                                            <img src="<?= BASE_URL . $sanpham['hinh_anh'] ?>"
                                                                style="width: 100px"
                                                                alt="Hình ảnh sản phẩm">
                                                        </td>
                                                        <td><?= $sanpham['so_luong'] ?></td>
                                                        <td><?= $sanpham['ten_mau'] ?></td>
                                                        <td><?= $sanpham['ngay_nhap'] ?></td>
                                                        <td><?= $sanpham['mo_ta'] ?></td>
                                                        <td><?= $sanpham['ten_danh_muc'] ?></td>
                                                        <td><?= $sanpham['ten_bo_suu_tap'] ?></td>
                                                        <td><?= $sanpham['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng' ?></td>

                                                        <td>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id=' . $sanpham['id'] ?>" class="btn btn-warning btn-sm">
                                                                <i class="fas fa-edit"></i> Sửa
                                                            </a>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id=' . $sanpham['id'] ?>"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Bạn có đồng ý xoá hay không?')">
                                                                <i class="fas fa-trash"></i> Xóa
                                                            </a>

                                                            <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id=' . $sanpham['id'] ?>"
                                                                class="btn btn-info btn-sm"><i class="bi bi-eye"></i>Xem</a>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for Search Bar Functionality
        document.getElementById('searchBar').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll('#promoTableBody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    </script>

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

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Velzon.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>