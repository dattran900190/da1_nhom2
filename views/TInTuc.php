<?php
require_once "layout/menu.php";

?>
<style>
/* Slides container */
.slides {
    display: flex;
    transition: transform 0.5s ease-in-out; /* Hiệu ứng lướt mượt */
}

/* Mỗi slide */
.slide {
    flex: 0 0 100%;
    height: 600px;
}

.slide img {
    width: 100%;
    height: 500px;
    object-fit: cover;
}




</style>



<div class="main-content">
    
<div class="slideshow-container" >
    <div class="slides">
        <?php foreach ($listBanner as $banner): ?>
            <?php if ($banner['trang_thai'] == 1): ?>
                <div class="slide">
                    <img src="<?= 'uploads/banner/' . $banner['banner_img']; ?>" />
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <!-- Slide giả (lặp lại slide đầu tiên) -->
        <div class="slide">
            <img src="<?= 'uploads/banner/' . $listBanner[0]['banner_img']; ?>" alt="Banner" />
        </div>
    </div>
</div>




    
    <div class="tin-tucs">
        <div class="top container">
            <div class="title">TIN TỨC NỔI BẬT</div>
            <a href="#">XEM TẤT CẢ TIN TỨC</a>
        </div>
        <div class="mid">
            <div class="tin-tuc">
                <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>"><img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/09/h5-blog-img-02.jpg" alt=""></a>
                <div class="day"><a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">11/01/2024</a></div>
                <div class="title"><a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Oranges And Lemons For The Fresh Start</a> </div>
            </div>
            <div class="tin-tuc">
                <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>"><img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/09/h5-blog-img-04.jpg" alt=""></a>
                <div class="day"><a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">11/01/2024</a></div>
                <div class="title"><a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Different Types Of Japanese Teapots</a> </div>
            </div>
            <div class="tin-tuc">
                <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>"><img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/09/h5-blog-img-03.jpg" alt=""></a>
                <div class="day"><a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">11/01/2024</a></div>
                <div class="title"><a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Let Your Hair Down And Just Have Fun</a></div>
            </div>
            <div class="tin-tuc">
                <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>"><img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/10/slide-02.jpg" alt=""></a>
                <div class="day"><a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">11/01/2024</a></div>
                <div class="title"><a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Everything You Need To Buy</a></div>
            </div>
        </div>
    </div>
    <div class="line-ngang" style="margin: 5% 0;"></div>

    <div class="main-tin-tuc container">
        <div class="title-tin-tuc">
            BÀI VIẾT MỚI NHẤT
        </div>
        <div class="bai-viets">
            <div class="main-bai-viet">
                <div class="bai-viet">
                    <div class="anh-bai-viet">
                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>"><img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/08/h1-blog-img-06-768x1005.jpg" alt=""></a>
                    </div>
                    <div class="ngay-thang">
                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Ngày đăng: 11/11/2024</a>
                    </div>
                    <div class="title">
                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">How I’m Styling Everyday Black Outfits</a>
                    </div>
                    <div class="content">
                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">
                        Lorem ipsum dolor sit amet, consec tetur adip iscing elit. Donec ac lectus mi. Curab itur non ligula facilisis, ultrices ex sed, 
                        viverra justo. Curabitur con dim entum, sem nec ornare fermentum, augue erat bibe ndum urna, vitae dignissim tellus turpis a est nus.
                        </a>
                    </div>
                    <div class="doc-them">
                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">ĐỌC THÊM <i class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
                <div class="bai-viet">
                    <div class="anh-bai-viet">
                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>"><img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/08/h1-blog-img-05.jpg" alt=""></a>
                    </div>
                    <div class="ngay-thang">
                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Ngày đăng: 11/11/2024</a>
                    </div>
                    <div class="title">
                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Filming from different angles and positions</a>
                    </div>
                    <div class="content">
                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">
                            Eu sem integer vitae justo eget magna fermentum iaculis. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus.
                            Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. A condimentum vitae sapien pellentesque habitant morbi.
                        </a>
                    </div>
                    <div class="doc-them">
                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">ĐỌC THÊM <i class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-bai-viet">
                <div class="dang-ky-email">
                    <h3>Subscribe to Our Newsletter</h3>
                    <div class="gui-mail">
                        <div class="top" style="display: flex;">
                            <p>Recive news via email </p>
                            <!-- <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Gửi</a> -->
                        </div>
                        <div class="mid">
                            <form action="">
                                <input type="email" id="email" placeholder="Nhập Email">
                                <button type="email">Gửi</button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="search-tin-tuc">
                    <div class="gui-search">
                        <div class="top" style="display: flex;">
                            <p>Tìm kiếm</p>
                            <!-- <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>"><i class="fa-solid fa-magnifying-glass"></i></a> -->
                        </div>
                        <div class="mid">
                            <form action="">
                                <input type="text" id="search" placeholder="Nhập tên tin tức....">
                                <button type="search">Tìm</button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="categories">
                    <div class="title">
                        Cagetoty
                    </div>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Beauty</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Collections</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Creative</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Culture</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Editorial</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Furniture</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Health</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Life</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Lifestyle</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Long reads</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">News</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Organic</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Pastel</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Remedies</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Sculpture</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Smart</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Spring</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Story</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Studio</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Videos</a>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Vintage</a>
                </div>

                <div class="bai-viet-pho-bien">
                    <div class="title" style="font-size: 1.5rem;">
                        Bài viết phổ biến
                    </div>
                    <div class="bai-viet">

                        <div class="thong-tins">
                            <div class="thong-tin">
                                <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>"><img src=https://gavino.qodeinteractive.com/wp-content/uploads/2022/08/h1-blog-img-07-768x1005.jpg" alt=""></a>
                                <div class="content">
                                    <div class="ngay-thang">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Ngày đăng: 11/11/2024</a>
                                    </div>
                                    <div class="title">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">We Know The Secret Of Perfect Balance</a>
                                    </div>
                                </div>
                            </div>
                            <div class="thong-tin">
                                <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>"><img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/08/h1-blog-img-19.jpg" alt=""></a>
                                <div class="content">
                                    <div class="ngay-thang">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Ngày đăng: 11/11/2024</a>
                                    </div>
                                    <div class="title">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">We Know The Secret Of Perfect Balance</a>
                                    </div>
                                </div>
                            </div>
                            <div class="thong-tin">
                                <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>"><img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/08/h1-blog-img-20.jpg" alt=""></a>
                                <div class="content">
                                    <div class="ngay-thang">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Ngày đăng: 11/11/2024</a>
                                    </div>
                                    <div class="title">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">We Know The Secret Of Perfect Balance</a>
                                    </div>
                                </div>
                            </div>
                            <div class="thong-tin">
                                <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>"><img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/08/home-1-img-8.jpg" alt=""></a>
                                <div class="content">
                                    <div class="ngay-thang">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">Ngày đăng: 11/11/2024</a>
                                    </div>
                                    <div class="title">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc' ?>">We Know The Secret Of Perfect Balance</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="kenh-tin-tuc">
                    <div class="title">Instagram</div>
                    <img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/08/blog-sidebarr-img.jpg" alt="">
                    <br>
                    <br>
                    <br>
                    <div class="title">Theo dõi chúng tôi</div>
                    <div class="kenh">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-youtube"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-pinterest"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line-ngang" style="margin: 5% 0;"></div>

    <div class="tim-hieu-them container">
        <div class="title">TÌM HIỂU THÊM</div>
        <div class="contents">
            <div class="content">
                <img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/08/home-1-img-2.jpg" alt="">
                <div class="text">Nội dung content</div>
            </div>
            <div class="content">
                <img src="https://gavino.qodeinteractive.com/wp-content/uploads/2022/08/home-1-img-3.jpg" alt="">
                <div class="text">Nội dung content</div>
            </div>
        </div>
    </div>

</div>
<script>
   
   document.addEventListener("DOMContentLoaded", () => {
    const slidesContainer = document.querySelector(".slides");
    const slides = document.querySelectorAll(".slide");
    const totalSlides = slides.length;
    const slideWidth = 100; // Mỗi slide chiếm 100% chiều rộng
    let currentIndex = 0; // Chỉ số slide hiện tại

    // Hàm chuyển sang slide tiếp theo
    function nextSlide() {
        currentIndex++;
        slidesContainer.style.transform = `translateX(-${currentIndex * slideWidth}%)`;

        // Nếu đến slide giả, reset về slide đầu tiên
        if (currentIndex === totalSlides - 1) {
            setTimeout(() => {
                slidesContainer.style.transition = "none"; // Tắt hiệu ứng chuyển động
                currentIndex = 0; // Reset về slide đầu tiên
                slidesContainer.style.transform = `translateX(0)`;
                setTimeout(() => {
                    slidesContainer.style.transition = "transform 0.5s ease-in-out"; // Bật lại hiệu ứng
                }, 50);
            }, 500); // Đợi hiệu ứng chạy xong trước khi reset
        }
    }

    // Tự động chuyển slide mỗi 3 giây
    setInterval(nextSlide, 3000);
});

</script>
  

<?php
require_once "layout/footer.php"
?>