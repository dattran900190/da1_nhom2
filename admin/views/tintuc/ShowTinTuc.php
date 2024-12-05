<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | T-shirt Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <style>
        .bordered {
  border: 2px solid black;  
  padding: 5px; 
}
    </style>

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
                                <!-- Header Section -->
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h2 class="text-primary">Chi tiết tin tức</h2>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=form-them-tin-tuc" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Thêm mới
                                    </a>
                                </div>

                                <!-- News Details Section -->
                                <div class="table-responsive">
                                    <div class="border rounded p-4 bg-white">
                                        <h4 class="text-secondary">Tiêu đề:</h4>
                                        <div class="border p-2 rounded mb-3 bg-light">
                                            <span><?= $tinTuc["tieu_de"] ?></span>
                                        </div>

                                        <h4 class="text-secondary">Mô tả:</h4>
                                        <div class="border p-2 rounded mb-3 bg-light">
                                            <span><?= $tinTuc["mo_ta"] ?></span>
                                        </div>

                                        <h4 class="text-secondary">Nội dung:</h4>
                                        <div class="border p-2 rounded mb-3 bg-light">
                                            <span><?= $tinTuc["noi_dung"] ?></span>
                                        </div>

                                        <h4 class="text-secondary">ID tác giả:</h4>
                                        <div class="border p-2 rounded mb-3 bg-light">
                                            <span><?= $tinTuc["tac_gia_id"] ?></span>
                                        </div>

                                        <h4 class="text-secondary">Ngày đăng:</h4>
                                        <div class="border p-2 rounded mb-3 bg-light">
                                            <span><?= $tinTuc["ngay_dang"] ?></span>
                                        </div>

                                        <h4 class="text-secondary">Ngày cập nhật:</h4>
                                        <div class="border p-2 rounded mb-3 bg-light">
                                            <span><?= $tinTuc["ngay_cap_nhat"] ?></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="mt-4 text-end">
                                    <a href="<?= BASE_URL_ADMIN . '?act=quan-ly-tin-tuc&id=' . $tinTuc['id'] ?>" class="btn btn-danger">
                                        <i class="fas fa-arrow-left"></i> Quay lại quản lý tin tức
                                    </a>
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

    <?php
    require_once "views/layouts/footer.php";
    ?>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>