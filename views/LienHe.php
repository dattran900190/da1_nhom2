<?php
require_once "layout/menu.php";

?>


<div class="main-content">


    <div class="title-lien-he">
        <h2>CÁCH LIÊN HỆ VỚI DỊCH VỤ KHÁCH HÀNG CỦA RALPHLAUREN</h2>
        CHỌN PHƯƠNG THỨC LIÊN HỆ ƯA THÍCH CỦA BẠN VÀ KẾT NỐI VỚI CHÚNG TÔI
    </div>
    <div class="lien-hes">
        <div class="phone">
            <h4>Điện Thoại</h4>
            Thứ hai - Thứ bảy từ 9 sáng đến 11 tối (GMT+7).
            Chủ nhật từ 10 sáng đến 9 tối (GMT+7).
            <br>
            <a href="#"><i class="fa-solid fa-phone"></i> Gọi: 0325.836.909</a>
        </div>
        <div class="chat">
        <h4>Nhắn Tin</h4>
            Thứ hai - Thứ bảy từ 9 sáng đến 11 tối (GMT+7).
            Chủ nhật từ 10 sáng đến 9 tối (GMT+7).
            <br>
            <a href="#"><i class="fa-regular fa-comment"></i> Message</a>
        </div>
    </div>
    <div class="email">
        <div class="title">
            LIÊN HỆ VỚI CHÚNG TÔI THÔNG QUA EMAIL
        </div>
        <form class="form-lien-he">
            <div class="mb-3">
                <input type="text" class="form-control" id="title" placeholder="Tiêu Đề">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="name" placeholder="Họ Tên">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="phone" placeholder="Số Điện Thoại">
            </div>
            <div class="mb-3">
                <textarea class="form-control" placeholder="Nội Dung" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
            <button type="submit" style="width: 100%;" class="btn btn-dark">
                Submit
            </button>
        </form>
    </div>
    <div class="bo-suu-tap-lien-he">
        <H2>NHỮNG BỘ SƯU TẬP BẠN CÓ THỂ SẼ THÍCH</H2>
    </div>
    <div class="product-header">
        <button id="left-arrow" class="arrow">&#9664;</button>
        <div class="container" id="items-container">
            <div class="item">
                <img src="https://themewagon.github.io/kaira/images/banner-image-6.jpg" alt="">
                <div class="title"><a href="">SOFT LEATHER JACKETS</a></div>
                <div class="content">
                    Scelerisque duis aliquam qui lorem ipsum dolor amet, consectetur adipiscing elit.
                </div>
                <a href="#">KHÁM PHÁ NGAY</a>
            </div>
            <div class="item">
                <img src="https://themewagon.github.io/kaira/images/banner-image-6.jpg" alt="">
                <div class="title"><a href="">SOFT LEATHER JACKETS</a></div>
                <div class="content">
                    Scelerisque duis aliquam qui lorem ipsum dolor amet, consectetur adipiscing elit.
                </div>
                <a href="#">KHÁM PHÁ NGAY</a>
            </div>
            <div class="item">
                <img src="https://themewagon.github.io/kaira/images/banner-image-6.jpg" alt="">
                <div class="title"><a href="">SOFT LEATHER JACKETS</a></div>
                <div class="content">
                    Scelerisque duis aliquam qui lorem ipsum dolor amet, consectetur adipiscing elit.
                </div>
                <a href="#">KHÁM PHÁ NGAY</a>
            </div>
            <div class="item">
                <img src="https://themewagon.github.io/kaira/images/banner-image-6.jpg" alt="">
                <div class="title"><a href="">SOFT LEATHER JACKETS</a></div>
                <div class="content">
                    Scelerisque duis aliquam qui lorem ipsum dolor amet, consectetur adipiscing elit.
                </div>
                <a href="#">KHÁM PHÁ NGAY</a>
            </div>
            <div class="item">
                <img src="https://themewagon.github.io/kaira/images/banner-image-6.jpg" alt="">
                <div class="title"><a href="">SOFT LEATHER JACKETS</a></div>
                <div class="content">
                    Scelerisque duis aliquam qui lorem ipsum dolor amet, consectetur adipiscing elit.
                </div>
                <a href="#">KHÁM PHÁ NGAY</a>
            </div>
            <div class="item">
                <img src="https://themewagon.github.io/kaira/images/banner-image-6.jpg" alt="">
                <div class="title"><a href="">SOFT LEATHER JACKETS</a></div>
                <div class="content">
                    Scelerisque duis aliquam qui lorem ipsum dolor amet, consectetur adipiscing elit.
                </div>
                <a href="#">KHÁM PHÁ NGAY</a>
            </div>
        </div>
        <button id="right-arrow" class="arrow">&#9654;</button>
    </div>
</div>


<?php
require_once "layout/footer.php"
?>