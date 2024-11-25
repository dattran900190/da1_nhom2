<?php
require_once "layout/menu.php";

?>

<div class="main-content">
    <div class="chi-tiet container">
        <div class="hinh-anh-chi-tiet">
            <img src="<?= $detailSanPham['hinh_anh'] ?>" alt="" style="width: 550px; ">
            <div class="anh-nho">
                <?php foreach ($listAnhSanPham as $anhSP): ?>
                    <img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="">
                <?php endforeach ?>
            </div>
        </div>
        <div class="thong-tin">
            <h2 class="text-center"><?= $detailSanPham['ten_san_pham'] ?></h2>
            <div class="gia text-center"><?= formatPrice($detailSanPham['gia_san_pham']) ?> VND</div>
            <div class="gia text-center">Số lượng sản phẩm: <?= $detailSanPham['so_luong'] . ' trong kho' ?> </div>
            <div class="sizes d-flex justify-content-center">
                <div class="size">
                    <a href="">Size M</a>
                </div>
                <div class="size">
                    <a href="">Size L</a>
                </div>
                <div class="size">
                    <a href="">Size XL</a>
                </div>
            </div>
            <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post" class="">
                <div class="mb-3">
                    
                Số lượng: <input type="hidden" name="san_pham_id" value="<?= $detailSanPham['id'] ?>">

                    <div class="input-group" style="max-width: 200px;">
                        <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(-1)">-</button>
                        <input type="number" id="so_luong" name="so_luong" value="1" min="1" class="form-control text-center">
                        <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(1)">+</button>
                    </div>
                </div>
                <div class="mua-hang d-grid">
                    <button type="submit" style="background-color: white; color: black;">Thêm vào giỏ</button>
                </div>
            </form>
            <div class="mua-hang">
                <a href=""><button>Mua ngay</button></a>
            </div>
            <div class="chi-tiet-san-pham">
                <h5>Chi tiết sản phẩm: </h5>
                <br>
                <p>Mô tả sản phẩm: <?= $detailSanPham['mo_ta'] ?></p>
                <p>Kích thước: M - L - XL</p>
                <p>Chất liệu: Polyester, Relaxed Fit.</p>
                <p>Artwork mặt trước và sau 2 bên cánh tay được in kéo lụa</p>
                <p>Nhãn trang trí BST DC | DBZ may ở thân trước.</p>
            </div>
            <div class="size-chat">
                <h5>Size chat: </h5>
                <br>
                <?php

                // Kiểm tra tên danh mục và hiển thị ảnh size tương ứng
                if ($detailSanPham['ten_danh_muc'] == 'Áo thun') { ?>
                    <img src="https://bizweb.dktcdn.net/100/369/010/files/sc-relaxed-t-shirt-2024-c2607c1d-b4a6-41c5-90bb-6967de24addd.png?v=1728447693089" alt="Size áo thun" width="300px">
                <?php } elseif ($detailSanPham['ten_danh_muc'] == 'Hoodie') { ?>
                    <img src="https://bizweb.dktcdn.net/100/369/010/files/sc-relaxed-hoodie-2024-daad13e2-783b-40a1-a9f6-7ea72b524340.png?v=1708065583424" alt="Size áo hoodie" width="300px">
                <?php } ?>
            </div>

        </div>
    </div>

    <div class="comment-rating-form">
        <div class="comment-section" style="background-color: #f9f9f9; ">
            <h5 class="comment-reply-title" style="padding-left: 20px;">ĐÁNH GIÁ SẢN PHẨM</h5>
            <div class="khach-hang">
                <div class="comment-header">
                    <div class="user-info">
                        <img src="user-avatar.jpg" alt="User Avatar" class="user-avatar">
                        <span class="username">Trần Đật</span>
                        <span class="comment-time">11-11-2024</span>
                    </div>
                    <div class="rating">
                        <span class="star-rating">⭐⭐⭐⭐⭐</span>
                    </div>
                </div>
                <div class="comment-body">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>
            <div class="product-rating">
                <label>Đánh giá:</label>
                <div class="stars">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5">⭐</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4">⭐</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3">⭐</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2">⭐</label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1">⭐</label>
                </div>
            </div>
            <form id="commentform" class="comment-form">
                <div class="comment-form-comment">
                    <textarea textarea="" placeholder="Bình luận *" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required></textarea>
                    <label for="comment" data-help="Escribe algo! Lo primero que se te ocurra">Comment</label>
                </div>
                <div class="form-submit">
                    <input name="submit" type="submit" id="submit" class="submit" value=" Gửi ">
                </div>
            </form>
        </div>
    </div>


    <div class="cac-san-pham-khac">
        <h3>Các sản phẩm khác</h3>
        <div class="san-pham-moi">
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
        </div>
    </div>


</div>


<?php
require_once "layout/footer.php"
?>