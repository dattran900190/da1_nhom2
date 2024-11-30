<?php
require_once "layout/menu.php";

?>


<div class="main-content">
    <br><br>
    <div class="title-san-pham" style="padding-right: 50%;">
    <h4>Kết quả tìm kiếm cho từ khóa: "<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?>"</h4>
    </div>


    <div class="tat-ca-san-pham">
        <?php
        // Kiểm tra xem tham số "danh-muc" có tồn tại trong URL
        // $ketQuaTK = [];
        // if (isset($_GET['danh-muc'])) {
        //     $danhMuc = $_GET['danh-muc'];
        //     if (isset($listSanPham)) {
        //         foreach ($listSanPham as $sanPham) {
        //             // Lọc sản phẩm theo tên danh mục
        //             if (stripos($sanPham['danh_muc_id'], $danhMuc) !== false) {
        //                 $ketQuaTK[] = $sanPham;
        //             }
        //         }
        //     }
        // } else {
        //     // Nếu không có tham số "danh-muc", hiển thị tất cả sản phẩm
        //     $ketQuaTK = $listSanPham;
        // }
        ?>

        <!-- Hiển thị danh sách sản phẩm -->
        <?php if (!empty($listSanPham)): ?>
            <?php foreach ($listSanPham as $sanPham): ?>
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
            <p style="padding-right: 60%;">Không tìm thấy sản phẩm nào cho từ khóa: "<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?>".</p>
        <?php endif; ?>
    </div>

    
</div>

</div>


<?php
require_once "layout/footer.php"
?>