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
  <style>
    .product-image {
      width: 100%;
      max-width: 500px;
      height: auto;
      transition: transform 0.3s ease-in-out;
    }

    .product-image:hover {
      transform: scale(1.05);
    }


    .product-image-thumbs {
      display: flex;
      gap: 10px;
      margin-top: 20px;
    }

    .product-image-thumb img {
      width: 75px;
      height: 75px;
      object-fit: cover;
      border-radius: 5px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .product-image-thumb img:hover {
      transform: scale(1.1);
    }

    .product-image-thumb.active img {
      border: 3px solid #007bff;
    }

    .card-body {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      padding: 20px;
    }

    .card-body h3,
    .card-body h4 {
      color: #333;
      font-weight: 600;
    }

    .card-body h4 small {
      color: #777;
    }

    .card-body hr {
      border-top: 1px solid #ddd;
      margin: 20px 0;
    }


    .btn {
      transition: background-color 0.3s ease, transform 0.2s;
    }

    .btn:hover {
      transform: scale(1.05);
    }

    .btn-warning {
      background-color: #ffc107;
      border-color: #ffc107;
    }

    .btn-danger {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .btn-warning:hover {
      background-color: #e0a800;
    }

    .btn-danger:hover {
      background-color: #c82333;
    }

    .table th,
    .table td {
      padding: 12px;
      text-align: center;
    }

    .table {
      margin-top: 30px;
      border-radius: 5px;
      overflow: hidden;
    }

    .table-bordered {
      border: 1px solid #ddd;
      border-collapse: collapse;
    }


    .table tbody tr {
      background-color: #f9f9f9;
    }

    .table tbody tr:hover {
      background-color: #f1f1f1;
    }

    .table thead {
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
    }

    .container {
      margin-top: 20px;
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease-in-out;
    }

    .card:hover {
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }


    .table-bordered tbody tr:hover {
      background-color: #f5f5f5;
    }


    .table th,
    .table td {
      padding: 10px;
      font-size: 14px;
    }

    .table {
      margin-top: 30px;
    }

    h4 small {
      font-size: 16px;
      color: #007bff;
      font-weight: 600;
    }


    h4 {
      font-size: 18px;
      color: #333;
    }


    .card-body h4+h4 {
      margin-top: 10px;
    }

    @media (max-width: 768px) {
      .card-body {
        flex-direction: column;
        align-items: center;
      }

      .product-image {
        width: 100%;
        max-width: 400px;
      }

      .product-image-thumbs {
        flex-direction: row;
        justify-content: center;
        gap: 5px;
      }

      .product-image-thumb img {
        width: 60px;
        height: 60px;
      }

      .btn {
        width: 100%;
        margin: 5px 0;
      }

      .table {
        margin-top: 20px;
      }
    }
  </style>
</head>

<body>
  <div id="layout-wrapper">

    <!-- HEADER -->
    <?php
    require_once "views/layouts/header.php";

    require_once "views/layouts/siderbar.php";
    ?>
  </div>

  <div class="main-content">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin tiết sản phẩm</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="col-12">
                <img style="width:45  0px;height:500px;" src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" class="product-image" style="width: 444px; height: 400px;" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <?php foreach ($listAnhSanPham as $key => $anhSP) : ?>
                  
                  <div class="product-image-thumb <?= $key == 0 ? 'active' : '' ?>">
                    <?php ?>
                    <img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="Product Image">
                  </div>
                <?php endforeach ?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Tên sản phẩm: <?= $sanpham['ten_san_pham'] ?></h3>

              <hr>
              <h4 class="mt-3">Gia tiền: <small><?= $sanpham['gia_san_pham'] ?></small></h4>
              <h4 class="mt-3">Gia khuyến mãi: <small><?= $sanpham['gia_khuyen_mai'] ?></small></h4>
              <h4 class="mt-3">Số lượng: <small><?= $sanpham['so_luong'] ?></small></h4>
              <h4 class="mt-3">Ngày nhập: <small><?= $sanpham['ngay_nhap'] ?></small></h4>
              <h4 class="mt-3">Danh mục: <small><?= $sanpham['ten_danh_muc'] ?></small></h4>
              <h4 class="mt-3">Trạng thái: <small><?= $sanpham['trang_thai'] == 1 ? 'Còn bán' : 'Hết bán' ?></small></h4>
              <h4 class="mt-3">Mô tả: <small><?= $sanpham['mo_ta'] ?></small></h4>

            </div>
          </div>
        </div>
        <div class="col-12">
          <h2>Bình luận sản phẩm</h2>
          <div class="container fluid">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Người bình luận</th>
                  <th>Nội dung</th>
                  <th>Bình luận</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td>
                      <a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id=' . $binhLuan['tai_khoan_id'] ?>">
                        <?= $binhLuan['ho_ten'] ?>
                      </a>
                    </td>
                    <td><?= $binhLuan['noi_dung'] ?></td>
                    <td><?= $binhLuan['ngay_dang'] ?></td>
                    <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                  
                  <td>

                    <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="post">
                      <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                      <input type="hidden" name="name_view" value="detail_sanpham">

                      <button class="btn btn-warning" onclick="return confirm('Bạn có muốn ẩn bình luận này hay không')">
                        <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ ẩn' ?>
                      </button>

                    </form>
                  </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
      <!-- /.card-body -->
  </div>
  <!-- /.card -->

  </section>
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
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function() {
        var $image_element = $(this).find('img');
        var newSrc = $image_element.attr('src');

        $('.product-image').fadeOut(300, function() {
          $(this).prop('src', newSrc).fadeIn(300);
        });

        $('.product-image-thumb.active').removeClass('active');
        $(this).addClass('active');
      });
    });
  </script>
</body>

</html>