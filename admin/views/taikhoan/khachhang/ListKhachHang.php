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
    <style>
        
        .alert-success {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    color: red;
    
    border-color: #d6e9c6;
    font-size: 20px;
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
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column mb-4">
                                        <div class="flex-grow-1">
                                            <h2 class="text-primary mb-4">Quản lý tài khoản khách hàng</h2>
                                        </div>
                                       
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input type="text" id="searchBar" class="form-control" placeholder="Tìm kiếm tài khoản khách hàng...">
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped text-center">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Họ Tên</th>
                                                    <th>Ảnh Đại Diện</th>
                                                    <th>Email</th>
                                                    <th >Ngày Sinh</th>
                                                    <th>Số Điện Thoại</th>
                                                    <th style="width: 200px">Địa Chỉ</th>
                                                    <th>Trạng thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody id="promoTableBody">
                                                <?php foreach ($listTaiKhoanKhachHang as $key => $taiKhoanKhachHang): ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $taiKhoanKhachHang['ho_ten'] ?></td>
                                                        <td>
                                                            <img src="<?= BASE_URL . $taiKhoanKhachHang['anh_dai_dien']?>" style="width: 100px"   alt="Không có ảnh"
                                                             onerror="this.onerror=null; this.src='https:'">
                                                        </td>
                                                        <td><?= $taiKhoanKhachHang['email'] ?></td>
                                                        <td><?= $taiKhoanKhachHang['ngay_sinh'] ?></td>
                                                        <td><?= $taiKhoanKhachHang['so_dien_thoai'] ?></td>
                                                        <td><?= $taiKhoanKhachHang['dia_chi'] ?></td>
                                                        
                                                        <td>
                                                            <span class="badge <?= $taiKhoanKhachHang['trang_thai'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                                                <?= $taiKhoanKhachHang['trang_thai'] == 1 ? 'Hoạt Động' : 'Chưa kich hoat' ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-tai-khoan-khach-hang&id=' . $taiKhoanKhachHang['id'] ?>" class="btn btn-warning btn-sm">
                                                              <i class="bi bi-eye-fill"></i> Chi tiết
                                                            </a>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-tai-khoan-khach-hang&id=' . $taiKhoanKhachHang['id'] ?>" class="btn btn-warning btn-sm">
                                                                <i class="fas fa-edit"></i> Sửa
                                                            </a>
                                                            <a   style="margin-top: 10px;"   href="<?= BASE_URL_ADMIN . '?act=xoa-tai-khoan-khach-hang&id=' . $taiKhoanKhachHang['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có đồng ý xoá hay không?')" >
                                                                <i class="fas fa-trash"></i> Xóa
                                                            </a>
                                                             <a    style="margin-top: 10px;" href="<?= BASE_URL_ADMIN . '?act=reset-password&id=' . $taiKhoanKhachHang['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có đồng ý reset password hay không?')">
                                                            <i class="bi bi-x-octagon"></i> Reset
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php if (!empty($_SESSION['success'])): ?>
                                               <div id="success-message" class=" alert-success" >
                                                 <?php echo $_SESSION['success']; ?>
                                                 </div>
                                                <?php unset($_SESSION['success']); // Xóa session sau khi hiển thị ?>
                                                <?php endif; ?>
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
        setTimeout(() => {
        const messageBox = document.getElementById('success-message');
        if (messageBox) {
            messageBox.style.transition = 'opacity 0.5s ease';
            messageBox.style.opacity = '0'; // Làm mờ thông báo
            setTimeout(() => messageBox.remove(), 500); // Xóa hẳn sau khi làm mờ
        }
    }, 5000); // 10 giây
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