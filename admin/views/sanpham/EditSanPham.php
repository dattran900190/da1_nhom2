<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | T-shirt Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham-va-album' ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Left Column: Product Details -->
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Danh mục sản phẩm</label>
                                        <input type="hidden" name="id" value="<?= $sanPham['id'] ?>">
                                        <select class="form-control" name="danh_muc_id">
                                            <option selected disabled>Chọn danh mục sản phẩm</option>
                                            <?php foreach ($listDanhMucSanPham as $danhmuc) : ?>
                                                <option <?= $danhmuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhmuc['id'] ?>"><?= $danhmuc['ten_danh_muc'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="ten_san_pham" value="<?= $sanPham['ten_san_pham'] ?>" placeholder="Nhập tên sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá Sản Phẩm</label>
                                        <input type="number" class="form-control" name="gia_san_pham" value="<?= $sanPham['gia_san_pham'] ?>" placeholder="Nhập giá sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label>Mã khuyến mãi</label>
                                        <input type="number" class="form-control" name="gia_khuyen_mai" value="<?= $sanPham['gia_khuyen_mai'] ?>" placeholder="Nhập mức giảm giá">
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh</label>
                                        <input type="file" class="form-control" name="hinh_anh">
                                        <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" width="100px">
                                    </div>
                                    <div class="form-group">
                                        <label>Số Lượng</label>
                                        <input type="number" class="form-control" name="so_luong" value="<?= $sanPham['so_luong'] ?>" placeholder="Nhập số lượng sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label>Kích cỡ</label>
                                        <input type="text" class="form-control" name="kich_co" value="<?= $sanPham['kich_co'] ?>" placeholder="Nhập kích cỡ">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày nhập</label>
                                        <input type="date" class="form-control" name="ngay_nhap" value="<?= $sanPham['ngay_nhap'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea class="form-control" name="mo_ta" placeholder="Mô tả sản phẩm"><?= $sanPham['mo_ta'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái sản phẩm</label>
                                        <select class="form-control" name="trang_thai">
                                            <option selected disabled>Chọn trạng thái sản phẩm</option>
                                            <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                                            <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dừng bán</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bo_suu_tap_id">Bộ sưu tập</label>
                                        <select class="form-control" name="bo_suu_tap_id" id="bo_suu_tap_id">
                                            <option selected disabled>Chọn bộ sưu tập</option>
                                            <?php foreach ($listBoSuuTap as $bosuutap) : ?>
                                                <option value="<?= $bosuutap['id'] ?>" <?= $sanPham['bo_suu_tap_id'] == $bosuutap['id'] ? 'selected' : '' ?>>
                                                    <?= $bosuutap['ten_bo_suu_tap'] ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Product Images -->
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Album ảnh sản phẩm</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table id="albumTable" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Ảnh</th>
                                                    <th>File</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                                <input type="hidden" id="img_delete" name="img_delete">
                                                <?php foreach ($listAnhSanPham as $key => $value): ?>
                                                    <tr data-id="<?= $value['id'] ?>">
                                                        <!-- Giữ lại ID ảnh cũ -->
                                                        <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">

                                                        <!-- Hiển thị ảnh cũ -->
                                                        <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" width="50" height="50"></td>

                                                        <!-- Input để thay thế ảnh -->
                                                        <td><input type="file" name="img_array[]" class="form-control"></td>

                                                        <!-- Nút xóa -->
                                                        <td>
                                                            <button type="button" class="btn btn-danger deleteRow" data-id="<?= $value['id'] ?>">Xóa</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Nút thêm -->
                                    <div class="p-3">
                                        <button type="button" id="addRow" class="btn btn-primary">Thêm ảnh</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <div class="col">
                        <div class="h-100">
                            <div class="row mb-3 pb-1">
                                <div class="col-12">
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                        <div class="flex-grow-1">
                                            <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="POST" enctype="multipart/form-data">
                                                <div class="card-body">
                                                    <input type="hidden" name="id" value="<?= $sanPham['id'] ?>">
                                                    <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">

                                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                                        <?php foreach ($listDanhMucSanPham as $danhmuc) : ?>
                                                            <option <?= $danhmuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhmuc['id'] ?>"><?= $danhmuc['ten_danh_muc'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <div class="form-group">
                                                        <label>Tên sản phẩm</label>
                                                        <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên san phẩm" value="<?= $sanPham['ten_san_pham'] ?>">
                                                        <?php if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['ten_san_pham']  ?></small><?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Giá Sản Phẩm</label>
                                                        <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập mã khuyến mãi" value="<?= $sanPham['gia_san_pham'] ?>">
                                                        <?php if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['gia_san_pham']  ?></small><?php } ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mã khuyến mãi</label>
                                                        <input type="number" class="form-control" name="gia_khuyen_mai" value="<?= $sanPham['gia_khuyen_mai'] ?>" placeholder="Nhập mức giảm giá">
                                                        <?php if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai']  ?></small><?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ảnh</label>
                                                        <input type="file" class="form-control" name="hinh_anh" value="<?= $sanPham['hinh_anh'] ?>">
                                                        <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" width="100px">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Số Lượng </label>
                                                        <input type="number" class="form-control" name="so_luong" placeholder="nhập số lượng sản phẩm" value="<?= $sanPham['so_luong'] ?>">
                                                        <?php if (isset($_SESSION['errors']['so_luong'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['so_luong']  ?></small><?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kích cỡ </label>
                                                        <input type="text" class="form-control" name="kich_co" placeholder="Nhập kích cỡ" value="<?= $sanPham['kich_co'] ?>">
                                                        <?php if (isset($_SESSION['errors']['kich_co'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['kich_co']  ?></small><?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ngày nhập</label>
                                                        <input type="date" class="form-control" name="ngay_nhap" value="<?= $sanPham['ngay_nhap'] ?>">
                                                        <?php if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['ngay_nhap']  ?></small><?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mô tả sản phẩm</label>
                                                        <input type="text" class="form-control" name="mo_ta" placeholder="Mô tả sản phẩm"
                                                            value="<?= $sanPham['mo_ta'] ?>">
                                                        <?php if (isset($_SESSION['errors']['mo_ta'])) { ?>
                                                            <small class="text-danger"><?= $_SESSION['errors']['mo_ta']  ?></small><?php } ?>
                                                    </div>
                                                    <div class="form-group">Trạng Thái San Phẩm</div>
                                                    <select class="form-control" name="trang_thai" id="trang_thai">
                                                        <option selected disabled>Chọn Trạng Thái sản phẩm</option>
                                                        <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                                                        <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dừng bán bán</option>
                                                    </select>
                                                </div>

                                                <div class="card-footer">
                                                    <button style="margin-top: 30px" type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>

                                            <div class="col-lg-4 col-md-12">
                                                <div class="card card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Album ảnh sản phẩm</h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <form action="<?= BASE_URL_ADMIN . '?act=sua-album-san-pham' ?>" method="post" enctype="multipart/form-data">
                                                            <div class="table-responsive">
                                                                <table id="faqs" class="table table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Ảnh</th>
                                                                            <th>File</th>
                                                                            <th>
                                                                                <div class="text-center">
                                                                                    <button type="button" onclick="addfaqs();" class="btn btn-success btn-sm">
                                                                                        <i class="fa fa-plus"></i> Thêm
                                                                                    </button>
                                                                                </div>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <input type="hidden" name="san_pham_id" value="<?= $SanPham['id'] ?>">
                                                                        <input type="hidden" id="img_delete" name="img_delete">
                                                                        <?php foreach ($listAnhSanPham as $key => $value): ?>
                                                                            <tr id="faqs-row-<?= $key ?>">
                                                                                <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                                                                                <td>
                                                                                    <img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" width="50" height="50" alt="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="file" name="img_array[]" class="form-control">
                                                                                </td>
                                                                                <td>
                                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)">
                                                                                        <i class="fa fa-trash"></i> Delete
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const albumTable = document.querySelector('#albumTable tbody');
            const imgDeleteInput = document.querySelector('#img_delete');

            // Add Row
            document.querySelector('#addRow').addEventListener('click', function() {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
            <td></td>
            <td><input type="file" name="img_array[]" class="form-control"></td>
            <td><button type="button" class="btn btn-danger deleteRow">Xóa</button></td>
        `;
                albumTable.appendChild(newRow);
            });

            // Delete Row
            albumTable.addEventListener('click', function(e) {
                if (e.target.classList.contains('deleteRow')) {
                    const row = e.target.closest('tr');
                    const imageId = row.getAttribute('data-id');

                    // If the image is from the database, add its ID to the delete list
                    if (imageId) {
                        const currentDeleteList = imgDeleteInput.value ? imgDeleteInput.value.split(',') : [];
                        currentDeleteList.push(imageId);
                        imgDeleteInput.value = currentDeleteList.join(',');
                    }

                    // Remove the row from the table
                    row.remove();
                }
            });
        });
    </script>

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