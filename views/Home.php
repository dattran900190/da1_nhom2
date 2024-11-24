<?php
require_once "layout/menu.php";

require_once "layout/header.php";
?>


<div class="main-content">
    <div class="chinh-sach">
        <div class="csach">
            <div class="logo">
                <span class="material-icons-outlined">currency_exchange</span>
            </div>
            <div class="title">Nhận Ưu Đãi 20%</div>
            <div class="content">
            Tận hưởng ngay giảm giá 20% cho tất cả các sản phẩm khi mua sắm tại cửa hàng chúng tôi. Đừng bỏ lỡ cơ hội này!
            </div>
        </div>
        <div class="csach">
            <div class="logo">
                <span class="material-icons-outlined">local_shipping</span>
            </div>
            <div class="title">Miễn Phí Trả Hàng</div>
            <div class="content">
            Bạn có thể yên tâm với dịch vụ trả hàng miễn phí trong vòng 30 ngày nếu sản phẩm không như mong đợi.
            </div>
        </div>
        <div class="csach">
            <div class="logo">
                <span class="material-symbols-outlined">
                    redeem
                </span>
            </div>
            <div class="title">Bao Bì Đặc Biệt</div>
            <div class="content">
            Tất cả sản phẩm đều được đóng gói cẩn thận với bao bì đẹp mắt và an toàn, đảm bảo hàng đến tay bạn trong tình trạng tốt nhất.
            </div>
        </div>
        <div class="csach">
            <div class="logo">
                <span class="material-icons-outlined">support_agent</span>
            </div>
            <div class="title">Hỗ Trợ 24/24</div>
            <div class="content">
            Chúng tôi luôn sẵn sàng hỗ trợ bạn mọi lúc, mọi nơi, với đội ngũ chăm sóc khách hàng hoạt động 24 giờ mỗi ngày.
            </div>
        </div>

    </div>

    <div class="phan-loai">
        <div class="san-pham">
            <a href="<?= BASE_URL . '?act=san-pham' ?>"><img src="<?= BASE_URL ?>/assets/img/danh-cho-nam.jpg"" alt=""></a>
            <div class="title">SẢN PHẨM CHO NAM</div>
        </div>
        <div class="san-pham">
            <a href="<?= BASE_URL . '?act=san-pham' ?>"><img src="<?= BASE_URL ?>/assets/img/danh-cho-nu.jpg"" alt=""></a>
            <div class="title">SẢN PHẨM CHO NỮ</div>
        </div>
        <div class="san-pham">
            <a href="<?= BASE_URL . '?act=san-pham' ?>"><img src="<?= BASE_URL ?>/assets/img/danh-cho-phu-kien.jpg"" alt=""></a>
            <div class="title">SẢN PHẨM PHỤ KIỆN</div>
        </div>
    </div>

    <div class="san-pham-moi">
        <div class="top">
            <div class="title">SẢN PHẨM MỚI</div>
            <div class="xem-them"><a href="#">XEM TẤT CẢ SẢN PHẨM</a></div>
        </div>
        <button id="left-arrow-v2" class="arrow-v2">&#9664;</button>
        <div class="mid" id="items-container-v2">
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <button id="right-arrow-v2" class="arrow-v2">&#9654;</button>
    </div>

    <div class="nen-bst">

        <div class="bo-suu-tap-popular">
            <div class="anh-bo-suu-tap">
                <img src="https://themewagon.github.io/kaira/images/single-image-2.jpg" alt="">
            </div>
            <div class="content">
                <div class="title">Bộ sưu tập mùa đông cổ điển 2024</div>
                <div class="s-content">
                Khám phá bộ sưu tập mùa đông cổ điển, nơi giao thoa giữa sự ấm áp và phong cách vượt thời gian. Với những thiết kế tinh tế, 
                chất liệu cao cấp và màu sắc ấm áp, bộ sưu tập này mang đến vẻ đẹp sang trọng và thanh lịch cho mỗi ngày lạnh giá. Những chiếc áo khoác dày dặn,
                 khăn choàng mềm mại, và những đôi giày thời trang sẽ là người bạn đồng hành lý tưởng, giúp bạn giữ ấm mà vẫn nổi bật trong mọi dịp.
                </div>
                <button>SẢN PHẨM BỘ SỨU TẬP</button>
            </div>
        </div>
    </div>

    <div class="san-pham-ban-chay">
        <div class="top">
            <div class="title">SẢN PHẨM BÁN CHẠY</div>
            <div class="xem-them"><a href="#">XEM TẤT CẢ SẢN PHẨM</a></div>
        </div>
        <button id="left-arrow-v3" class="arrow-v3">&#9664;</button>
        <div class="mid" id="items-container-v3">
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <button id="right-arrow-v3" class="arrow-v3">&#9654;</button>
    </div>

    <div class="video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/yCBNYpMgDmE?si=6VHN6ONJxs3GW3KH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>

    <div class="keo-chu" style="background-color: #F1F1F0;">
        <div class="title">
        Chúng Tôi Yêu Thích Những Lời Khen Tốt.
        </div>
        <div class="all-chu">
            <div class="chu">
            Tạo trải nghiệm mua sắm dễ dàng và nhanh chóng Đảm bảo giao diện website thân thiện và dễ điều hướng.
             Các khách hàng cần có thể tìm kiếm, xem sản phẩm và thanh toán một cách nhanh chóng và tiện lợi.
            </div>
            <div class="chu">
            Hình ảnh sản phẩm chất lượng cao Sử dụng hình ảnh sắc nét và rõ ràng để người
             mua có thể xem chi tiết từng sản phẩm. Hình ảnh đẹp giúp khách hàng dễ dàng hình dung về sản phẩm trước khi mua.
            </div>
            <div class="chu">
            Cung cấp mô tả chi tiết cho sản phẩm Thêm các thông tin về chất liệu, kích thước, màu sắc,
             và hướng dẫn bảo quản giúp khách hàng quyết định mua sắm dễ dàng hơn và giảm thiểu sự không hài lòng.
            </div>
            <div class="chu">
            Chính sách giao hàng và đổi trả rõ ràng Đảm bảo các chính sách về giao hàng,
             đổi trả sản phẩm được trình bày rõ ràng để khách hàng cảm thấy yên tâm khi mua hàng.
            </div>
        </div>
    </div>

    <div class="san-pham-co-the-thich">
        <div class="top">
            <div class="title">SẢN PHẨM CÓ THỂ BẠN SẼ THÍCH</div>
            <div class="xem-them"><a href="#">XEM TẤT CẢ SẢN PHẨM</a></div>
        </div>
        <button id="left-arrow-v4" class="arrow-v4">&#9664;</button>
        <div class="mid" id="items-container-v4">
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="san-pham">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"><img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt=""></a>
                <div class="title">Dark florish onepiece</div>
                <div class="price">100.000 VND</div>
                <div class="add-to-cart">
                    <a href="#"><i class="fa-solid fa-cart-plus"></i> THÊM GIỎ HÀNG</a>
                    <div class="tim">
                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <button id="right-arrow-v4" class="arrow-v4">&#9654;</button>
    </div>

    <div class="blogs">
        <div class="top">
            <div class="title">TIN TỨC NỔI BẬT</div>
            <div class="xem-them"><a href="#">XEM TẤT CẢ TIN TỨC</a></div>
        </div>
        <div class="mid">
            <div class="blog">
                <img src="https://themewagon.github.io/kaira/images/post-image1.jpg" alt="">
                <div class="day">11/01/2024</div>
                <div class="title">How to look outstanding in pastel</div>
                <div class="content">Dignissim lacus,turpis ut suspendisse vel tellus.Turpis purus,gravida orci,fringilla...</div>
            </div>
            <div class="blog">
                <img src="https://themewagon.github.io/kaira/images/post-image1.jpg" alt="">
                <div class="day">11/01/2024</div>
                <div class="title">Top 10 fashion trend for summer</div>
                <div class="content">Dignissim lacus,turpis ut suspendisse vel tellus.Turpis purus,gravida orci,fringilla...</div>
            </div>
            <div class="blog">
                <img src="https://themewagon.github.io/kaira/images/post-image1.jpg" alt="">
                <div class="day">11/01/2024</div>
                <div class="title">Crazy fashion with unique moment</div>
                <div class="content">Dignissim lacus,turpis ut suspendisse vel tellus.Turpis purus,gravida orci,fringilla...</div>
            </div>
        </div>
    </div>

    <div class="thuong-hieu">
        <ul>
            <li>
                <img src="https://cdn.shopify.com/s/files/1/0558/6413/1764/files/Rewrite_Yves_Saint_Laurent_Logo_Design_History_Evolution_0_1024x1024.jpg?v=1695907301" alt="">
            </li>
            <li>
                <img src="https://cdn.worldvectorlogo.com/logos/boss-mens-wear-1.svg" alt="">
            </li>
            <li>
                <img src="https://t4.ftcdn.net/jpg/03/97/36/75/360_F_397367515_GYSuQtv6HDhvbkodzHXko2Of7Wb6mRes.jpg" alt="">
            </li>
            <li>
                <img src="https://static.vecteezy.com/system/resources/previews/008/518/601/non_2x/graphic-of-clothing-logo-design-template-free-vector.jpg" alt="">
            </li>
            <li>
                <img src="https://i.pinimg.com/736x/95/db/e9/95dbe9457b02f38b2e18393ceaafee7f.jpg" alt="">
            </li>
        </ul>
    </div>
</div>
<?php
require_once "layout/footer.php"
?>