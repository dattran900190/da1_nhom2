<div class="header" style="background-color: #F1F1F0;">
    <div class="line-ngang"></div>
    <div class="t-new-collections">
        <div class="title">
            Bộ Sưu Tập Mới
        </div>
        <div class="content">
        Khám phá ngay bộ sưu tập mới nhất với các sản phẩm độc đáo, mang phong cách hiện đại và sang trọng. Mỗi bộ sưu tập được thiết kế tỉ mỉ, 
        phù hợp với xu hướng thời trang và nhu cầu của mọi khách hàng. Hãy đến và lựa chọn những món đồ mới nhất để làm mới phong cách của bạn!
        </div>
    </div>
 
    <div class="product-header">
        <button id="left-arrow" class="arrow">&#9664;</button>
        <div class="container" id="items-container">
            <?php foreach($listBoSuuTap as $suTap): ?>
            <div class="item">
                <img src="<?= $suTap['hinh_anh'] ?>" alt="" width="300px" height="400px">
                <div class="title"><a href="<?= BASE_URL .'?act=bo-suu-tap&bo-suu-tap=' . urlencode($suTap['ten_bo_suu_tap']) ?>"><?= $suTap['ten_bo_suu_tap'] ?></a></div>
                <div class="content" style="padding: 0 20px;">
                <?= $suTap['mo_ta'] ?>
                </div>
                <a href="<?= BASE_URL .'?act=bo-suu-tap&bo-suu-tap=' . urlencode($suTap['ten_bo_suu_tap']) ?>">KHÁM PHÁ NGAY</a>
            </div>
            <?php endforeach ?>
            
        </div>
        <button id="right-arrow" class="arrow">&#9654;</button>
    </div>
</div>
