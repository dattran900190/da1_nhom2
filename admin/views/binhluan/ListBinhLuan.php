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
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column mb-4">
                                        <div class="flex-grow-1">
                                            <h2 class="text-primary mb-4">Quản lý bình luận</h2>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input type="text" id="searchBar" class="form-control" placeholder="Tìm kiếm bình luận...">
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped text-center">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã sản phẩm</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody id="promoTableBody">
                                                <?php foreach ($listBinhLuan as $key => $binhluan): ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $binhluan['san_pham_id'] ?></td>
                                                        <td><?= $binhluan['ten_san_pham'] ?></td>


                                                        <!-- <td>
                                                            <span class="badge <?= isset($binhluan['trang_thai']) && $binhluan['trang_thai'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                                                <?= isset($binhluan['trang_thai']) && $binhluan['trang_thai'] == 1 ? 'Hiện Bình luận' : 'Ẩn Bình luận' ?>
                                                            </span>
                                                        </td> -->
                                                        <td>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-binh-luan&id=' . $binhluan['san_pham_id'] ?>">
                                                                <button class="btn btn-info btn-sm" data-toggle="collapse" data-target="#comments-<?= $binhluan['san_pham_id'] ?>">
                                                                    Xem Bình luận (<?= $binhluan['comment_count'] ?>)
                                                                </button>
                                                            </a>
                                                            <!-- <a href="<?= BASE_URL_ADMIN . '?act=xoa-binh-luan&id=' . $binhluan['san_pham_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có đồng ý xoá hay không?')">
                                                                <i class="fas fa-trash"></i> Xóa
                                                            </a> -->
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
        $(document).ready(function() {
            $('[data-toggle="collapse"]').click(function() {
                var target = $(this).data('target');
                $(target).collapse('toggle');
            });
        });

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

    <?php
    require_once "views/layouts/footer.php";
    ?>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>