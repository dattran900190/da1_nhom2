<?php
require_once "layout/menu.php";

?>


<div class="main-content">
    <div class="title-san-pham">
        Fall-Winter 2024 Collection
    </div>

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
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a class="btn btn-outline-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    LỌC LOẠI
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a class="btn btn-outline-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    LỌC KÍCH CỠ
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a class="btn btn-outline-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    MÀU SẮC
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>

        <div class="thu-tu">
            <div class="dropdown">
                <a class="btn btn-outline-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    THỨ TỰ
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
        
    </div>

    <div class="tat-ca-san-pham">
        <?php foreach ($listSanPham as $sanPham): ?>
            
       
        <div class="san-pham">
            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>"><img src="<?= $sanPham['hinh_anh'] ?>" alt=""></a>
            <div class="title"><?= $sanPham['ten_san_pham'] ?></div>
            <div class="price"><?= $sanPham['gia_san_pham'] ?> VNĐ</div>
            <div class="add-to-cart">
                <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                <div class="tim">
                    <a href="#"><i class="fa-regular fa-heart"></i></a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        
    </div>

    <div class="chuyen-trang">
        <ul class="pagination" id="pagination">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
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