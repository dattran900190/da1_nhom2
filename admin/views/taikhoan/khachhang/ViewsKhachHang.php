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
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .info-table {
            border-collapse: collapse;
            width: 100%;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }


        .info-table th,
        .info-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }


        .info-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }


        .info-table img {
            display: block;
            margin: 10px auto;
            border-radius: 50%;
            width: 200px;
            height: 200px;




            object-fit: cover;
            border: 2px solid #ddd;
        }


        .avatar {
            text-align: center;
            padding: 20px;
        }


        .avatar p {
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #555;
            text-align: center;
            font-size: 25px;
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
                                    <div class="flex-grow-1">
                                        <a style="margin-bottom: 10px;" href="<?= BASE_URL_ADMIN ?>?act=quan-ly-tai-khoan-khach-hang" class="btn btn-primary btn-sm">
                                            <i class="fas fa-arrow-left"></i> Quay lại
                                        </a>
                                        <h2 class="text-primary mb-4">Chi tiết tài khoản khách hàng</h2>

                                    </div>
                                    <div class="card shadow-lg mb-4">
                                        <table class="info-table">
                                            <tr>
                                                <!-- Cột bên trái (Ảnh đại diện) -->
                                                <td class="avatar" rowspan="7">

                                                    <img src="<?= BASE_URL . $taiKhoanKhachHang['anh_dai_dien'] ?> " alt="Không có ảnh"
                                                        onerror="this.onerror=null; this.src='https:'">

                                                    <p>Ảnh đại diện</p>
                                                </td>

                                                <!-- Cột bên phải (Thông tin tài khoản) -->
                                                <th>Tên tài khoản: <?= $taiKhoanKhachHang['ho_ten'] ?></th>


                                            </tr>
                                            <tr>
                                                <th>Email: <?= $taiKhoanKhachHang['email'] ?></th>


                                            </tr>
                                            <tr>
                                                <th>Ngày sinh: <?= $taiKhoanKhachHang['ngay_sinh'] ?></th>


                                            </tr>
                                            <tr>
                                                <th>Giới tính: <?= $taiKhoanKhachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></th>


                                            </tr>
                                            <tr>
                                                <th>Số điện thoại: <?= $taiKhoanKhachHang['so_dien_thoai'] ?></th>


                                            </tr>
                                            <tr>
                                                <th>Địa chỉ: <?= $taiKhoanKhachHang['dia_chi'] ?></th>


                                            </tr>
                                            <tr>
                                                <th>Trang thái: <?= $taiKhoanKhachHang['trang_thai'] == 1 ? 'Hoạt động' : 'Chưa kích hoạt' ?></th>


                                            </tr>


                                        </table>
                                        <div class="table-container">


                                        </div>
                                    </div>


                                    <h3>Thông tin mua hàng</h3>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input type="text" id="searchBar" class="form-control" placeholder="Tìm kiếm đơn hàng...">
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-hover table-striped text-center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã đơn hàng</th>
                                                <th>Tên người nhận</th>
                                                <th>Số điện thoại</th>
                                                <th>Ngày đặt</th>
                                                <th>Tổng tiền</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="promoTableBody">
                                            <?php foreach ($listDonHang as $key => $donhang) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $donhang['ma_don_hang'] ?></td>
                                                    <td><?= $donhang['ten_nguoi_nhan'] ?></td>
                                                    <td><?= $donhang['sdt_nguoi_nhan'] ?></td>
                                                    <td><?= $donhang['ngay_dat'] ?></td>
                                                    <td><?= $donhang['tong_tien'] ?></td>
                                                    <td><?= $donhang['ten_trang_thai'] ?></td>
                                                    <td>
                                                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donhang['id'] ?>" class="btn btn-primary btn-sm">
                                                            <i class="fa-solid fa-circle-info"></i> Chi tiết
                                                        </a>
                                                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donhang['id'] ?>" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i> Sửa
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                    <hr>
                                    <h3>Lịch sử bình luận</h3>
                                    <table class="table table-bordered table-hover table-striped text-center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã sản phẩm</th>

                                                <th>Nội dung</th>
                                                <th>Ngày đăng</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody id="promoTableBody">
                                            <?php foreach ($listBinhLuan as $key => $binhluan): ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $binhluan['san_pham_id'] ?></td>

                                                    <td><?= $binhluan['noi_dung'] ?></td>
                                                    <td><?= $binhluan['ngay_dang'] ?></td>
                                                    <td>
                                                        <span class="badge <?= $binhluan['trang_thai'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                                            <?= $binhluan['trang_thai'] == 1 ? 'Hiện Bình luận' : 'Ẩn Bình luận' ?>
                                                        </span>
                                                    </td>
                                                    <td>

                                                        <a href="<?= BASE_URL_ADMIN . '?act=xoa-binh-luan&id=' . $binhluan['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có đồng ý xoá hay không?')">
                                                            Ẩn/Bỏ Ẩn
                                                        </a>
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
    <script>
        // Smooth scrolling for back-to-top button
        document.getElementById("back-to-top").addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        document.getElementById('searchBar').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll('#promoTableBody tr');


            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    </script>
</body>


</html>