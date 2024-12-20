<?php
require_once "layout/menu.php";

?>


<div class="main-content">
    <!-- <div class="title-san-pham">
        Fall-Winter 2024 Collection
    </div> -->

    <div class="banner">
        <img src="<?= BASE_URL ?>/assets/img/bannerSP2.jpg" alt="">
    </div>

    <div class="loc-san-pham">
        <div class="loc">
            <div class="dropdown">
                <a class="btn btn-outline-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    LỌC GIÁ
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Giá dưới 100.000đ</a></li>     
                    <li><a class="dropdown-item" href="#">100.000đ - 200.000đ</a></li>
                    <li><a class="dropdown-item" href="#">200.000đ - 300.000đ</a></li>
                    <li><a class="dropdown-item" href="#">300.000đ - 500.000đ</a></li>
                    <li><a class="dropdown-item" href="#">Giá trên 500.000đ</a></li>
                </ul>
            </div>

            <!-- <div class="dropdown">
                <a class="btn btn-outline-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    LỌC LOẠI
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div> -->

            <div class="dropdown">
                <a class="btn btn-outline-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    LỌC KÍCH CỠ
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">S</a></li>
                    <li><a class="dropdown-item" href="#">M</a></li>
                    <li><a class="dropdown-item" href="#">L</a></li>
                    <li><a class="dropdown-item" href="#">XL</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a class="btn btn-outline-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    LỌC KÍCH CỠ
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Đen</a></li>
                    <li><a class="dropdown-item" href="#">Trắng</a></li>
                    <li><a class="dropdown-item" href="#">Be</a></li>
                    <li><a class="dropdown-item" href="#">Hồng</a></li>
                </ul>
            </div>

            <!-- <div class="dropdown-content">
                <?php foreach ($listMauSanPham as $listMauSanPham): ?>
                    <a href="<?= BASE_URL . '?act=san-pham&mau-sac=' . urlencode($mau['id']) ?>">
                        <?= $listMauSanPham['ten_mau'] ?>
                    </a>
                <?php endforeach; ?>
            </div> -->
            <!-- <div class="dropdown">
                <form action="<?= BASE_URL . '?act=loc-san-pham' ?>" method="post">
                    <a class="btn btn-outline-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        MÀU SẮC
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($listMauSanPham as $mau): ?>
                            <li>
                                <a class="dropdown-item" href="<?= BASE_URL . '?act=san-pham&mau-sac=' . urlencode($mau['id']) ?>">
                                    <?= $mau['ten_mau'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </form>
            </div> -->
        </div>

        <div class="thu-tu">
            <div class="dropdown">
                <a class="btn btn-outline-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    THỨ TỰ
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Mới nhất</a></li>
                    <li><a class="dropdown-item" href="#">Giá tăng dần</a></li>
                    <li><a class="dropdown-item" href="#">Giá giảm dần</a></li>
                </ul>
            </div>
        </div>

    </div>


    <div class="tat-ca-san-pham">
        <?php
        // Kiểm tra xem tham số "danh-muc" có tồn tại trong URL
        $ketQuaTK = [];
        if (isset($_GET['danh-muc'])) {
            $danhMuc = $_GET['danh-muc'];
            if (isset($listSanPham)) {
                foreach ($listSanPham as $sanPham) {
                    // Lọc sản phẩm theo tên danh mục
                    if (stripos($sanPham['danh_muc_id'], $danhMuc) !== false) {
                        $ketQuaTK[] = $sanPham;
                    }
                }
            }
        } else {
            // Nếu không có tham số "danh-muc", hiển thị tất cả sản phẩm
            $ketQuaTK = $listSanPham;
        }
        ?>

        <!-- Hiển thị danh sách sản phẩm -->
        <?php if (!empty($ketQuaTK)): ?>
            <?php foreach ($ketQuaTK as $sanPham): ?>
                <div class="san-pham">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>">
                        <img src="<?= $sanPham['hinh_anh'] ?>" alt="" style="padding-bottom: 50px;">
                    </a>
                    <div class="title"><?= $sanPham['ten_san_pham'] ?></div>
                    <div class="price"><?= formatPrice($sanPham['gia_khuyen_mai']) == 0 ? formatPrice($sanPham['gia_san_pham']) : formatPrice($sanPham['gia_khuyen_mai']) ?>
                        <strike style="font-size: 11px;"><?= $sanPham['gia_khuyen_mai'] == 0 ?  '' : formatPrice($sanPham['gia_san_pham']) ?></strike>
                        VND
                    </div>

                </div>
            <?php endforeach; ?>


        <?php else: ?>
            <p>Không tìm thấy sản phẩm nào trong danh mục này.</p>
        <?php endif; ?>
    </div>

    <div class="chuyen-trang">
        <ul class="pagination" id="pagination">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
    <!-- <div class="chuyen-trang">
    <ul class="pagination"></ul> -->
</div>

</div>


<?php
require_once "layout/footer.php"
?>