<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6">
                <img src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" alt="Tên sản phẩm" class="img-fluid rounded">
            </div>
            <!-- Thông tin sản phẩm -->
            <div class="col-md-6">
                <h1 class="display-5"><?= $sanpham['ten_san_pham'] ?></h1>
                <p class="text-muted">Trạng thái:
                    <span class="badge bg-success"><?= $sanpham['trang_thai'] ? 'còn hàng' : 'Hết Hàng' ?></span> <!-- Thay đổi theo trạng thái -->
                </p>
                <h3 class="text-danger">Giá: <?= $sanpham['gia_san_pham'] ?> VNĐ</h3>
                <p><strong>Số lượng còn:</strong><?= $sanpham['so_luong'] ?></p>
                <p class="mt-4">
                    <strong>Mô tả sản phẩm:</strong><br>
                    <?= $sanpham['mo_ta'] ?>
                </p>
                <!-- Nút thêm vào giỏ hàng -->
                <div class="mt-4">
                    <button class="btn btn-primary btn-lg">
                        <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                    </button>
                </div>
            </div>
        </div>
        <!-- Thêm phần mô tả chi tiết nếu cần -->
        <!-- <div class="row mt-5">
            <div class="col">
                <h2>Mô tả chi tiết</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit
                    arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.
                </p>
            </div>
        </div> -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>