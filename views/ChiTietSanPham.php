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
            <div class="gia text-center">
                <strike style="font-size: 11px;"><?= $detailSanPham['gia_khuyen_mai'] == 0 ?  '' : formatPrice($detailSanPham['gia_san_pham']) ?></strike>
                <?= formatPrice($detailSanPham['gia_khuyen_mai']) == 0 ? formatPrice($detailSanPham['gia_san_pham']) : formatPrice($detailSanPham['gia_khuyen_mai']) ?>
                VND
            </div>
            <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="POST" id="add-to-cart-form">
                <div class="sizes d-flex justify-content-center flex-wrap mb-3">
                    <?php foreach ($listKichCo as $kichCo) : ?>
                        <div class="size px-2">
                            <input type="radio" id="size_<?= $kichCo['id'] ?>" name="kich_co" value="<?= $kichCo['id'] ?>" class="btn-check" required>
                            <label class="btn btn-outline-secondary" for="size_<?= $kichCo['id'] ?>">
                                <?= $kichCo['ten_kich_co'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <input type="hidden" name="san_pham_id" value="<?= $detailSanPham['id'] ?>">
                <!-- <input type="hidden" name="mau_id" value="<?= $detailSanPham['mau'] ?>"> -->


                <div class="mb-3">
                    <label for="cart_quantity" class="form-label">Số lượng:</label>
                    <div class="quantity d-flex align-items-center">
                        <button type="button" class="btn btn-outline-secondary" id="decrease">-</button>
                        <input type="number" class="form-control text-center mx-2" id="cart_quantity" name="so_luong" value="1" min="1" max="<?= $detailSanPham['so_luong'] ?>" style="width: 60px;" required>
                        <button type="button" class="btn btn-outline-secondary" id="increase">+</button>
                    </div>
                </div>

                <div class="mua-hang d-grid">
                    <button type="submit" style="background-color: white; color: black;">Thêm vào giỏ</button>
                </div>

            </form>
            <div class="mua-hang">
                <!-- <form action="<?= BASE_URL . '?act=thanh-toan-mua-ngay' ?>" method="post">
                    <input type="hidden" name="id_san_pham" value="<?= $detailSanPham['id'] ?>">
                    <input type="hidden" name="gia_san_pham"
                        value="<?= $detailSanPham['gia_khuyen_mai'] == 0 ? $detailSanPham['gia_san_pham'] : $detailSanPham['gia_khuyen_mai'] ?>">
                        <input type="hidden" name="kich_co" value="">
                    <input type="hidden" name="so_luong" id="hidden_quantity"> -->

                <button type="submit">Mua ngay</button>
                <!-- </form> -->
            </div>

            <div class="chi-tiet-san-pham">
                <h5>Chi tiết sản phẩm: </h5>
                <br>
                <p>Mô tả sản phẩm: <?= $detailSanPham['mo_ta'] ?></p>
                <p>Kích thước: S - M - L - XL</p>

            </div>
            <?php
            // Kiểm tra tên danh mục và hiển thị ảnh size tương ứng
            if ($detailSanPham['ten_danh_muc'] == 'Áo thun') : ?>
                <div class="size-chat">
                    <h5>Size chat: </h5>
                </div>
                <img src="https://bizweb.dktcdn.net/100/369/010/files/sc-relaxed-t-shirt-2024-c2607c1d-b4a6-41c5-90bb-6967de24addd.png?v=1728447693089" alt="Size áo thun" width="300px">
            <?php elseif ($detailSanPham['ten_danh_muc'] == 'Hoodie') : ?>
                <img src="https://bizweb.dktcdn.net/100/369/010/files/sc-relaxed-hoodie-2024-daad13e2-783b-40a1-a9f6-7ea72b524340.png?v=1708065583424" alt="Size áo hoodie" width="300px">
            <?php elseif ($detailSanPham['ten_danh_muc'] == 'Sweatshirt') : ?>
                <img src="https://bizweb.dktcdn.net/100/369/010/files/sc-sweater-monogram-2023.png?v=1702570995624" alt="Size áo sweatshirt" width="300px">
            <?php elseif ($detailSanPham['ten_danh_muc'] == 'Áo tay dài') : ?>
                <img src="https://bizweb.dktcdn.net/100/369/010/files/sc-speed-d-ls-t-shirt-white-2024-5f23635e-3b8f-4ff7-a2ba-09dabf5817a2.png?v=1731571613393" alt="Size áo tay dài" width="300px">
            <?php endif; ?>

        </div>
    </div>

    <div class="comment-rating-form">
        <div class="comment-section" style="background-color: #f9f9f9; ">
            <br>
            <h5 class="comment-reply-title" style="padding-left: 20px;">BÌNH LUẬN SẢN PHẨM</h5>
            <?php foreach ($listBinhLuan as $binhLuan) { ?>
                <div class="khach-hang">
                    <div class="comment-header">
                        <div class="user-info">
                            <img src="<?= BASE_URL . $binhLuan['anh_dai_dien'] ?>" alt="User Avatar" class="user-avatar">
                            <span class="username"><?= $binhLuan['ho_ten'] ?></span>
                            <span class="comment-time"><?= $binhLuan['ngay_dang'] ?></span>
                        </div>

                    </div>
                    <div class="comment-body">
                        <p><?= $binhLuan['noi_dung'] ?></p>
                    </div>
                </div>
            <?php  } ?>
            <div class="product-rating">
                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success">
                        <?= $_SESSION['success_message'] ?>
                    </div>
                    <?php unset($_SESSION['success_message']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['error_message'] ?>
                    </div>
                    <?php unset($_SESSION['error_message']); ?>
                <?php endif; ?>

                <label>Bình luận:</label>

            </div>
            <?php if (!isset($_SESSION['user_client'])) { ?>
                <p class="text-danger text-center">Vui lòng đăng nhập để gửi bình luận</p><br>
            <?php } else { ?>
                <form id="commentform" class="comment-form" action="<?= BASE_URL . '?act=gui-binh-luan' ?>" method="POST">
                    <div class="comment-form-comment">
                        <input type="hidden" name="tai_khoan_id" value="<?= $_SESSION['user_client_id'] ?>">

                        <input type="hidden" name="san_pham_id" value="<?= $detailSanPham['id'] ?>">
                        <textarea textarea="" placeholder="Bình luận *" id="noi_dung" name="noi_dung" cols="45" rows="8" maxlength="65525" required></textarea>

                    </div>
                    <div class="form-submit">
                        <input type="submit" id="submit" class="submit" value=" Gửi ">
                    </div>
                </form>
            <?php } ?>

        </div>
    </div>


    <div class="cac-san-pham-khac">
        <h3 style="padding-right: 7%;">Các sản phẩm khác</h3>
        <div class="san-pham-moi">
            <div class="mid" id="items-container-v2">
                <?php
                $maxProducts = 4;
                $count = 0;

                foreach ($listSanPham as $sanPham) {
                    // Bỏ qua sản phẩm có id <=  6
                    if ($sanPham['id'] <= 4) {
                        continue;
                    }

                    // Kiểm tra nếu đã đạt đủ số lượng sản phẩm
                    if ($count >= $maxProducts) {
                        break;
                    }
                ?>
                    <div class="san-pham">
                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>">
                            <img src="<?= $sanPham['hinh_anh'] ?>" alt="" style="padding-bottom: 50px;">
                        </a>
                        <div class="title"><?= $sanPham['ten_san_pham'] ?></div>
                        <div class="price"><?= formatPrice($sanPham['gia_san_pham']) ?> VND</div>

                    </div>
                <?php
                    $count++; // Tăng bộ đếm số lượng sản phẩm đã hiển thị
                }
                ?>

            </div>
        </div>
    </div>
</div>


</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const quantityInput = document.getElementById('cart_quantity');
        const increaseBtn = document.getElementById('increase');
        const decreaseBtn = document.getElementById('decrease');

        increaseBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value) || 1; // Giá trị mặc định là 1 nếu rỗng
            const max = parseInt(quantityInput.max) || Infinity; // Giới hạn trên (nếu không đặt max thì không giới hạn)

            if (currentValue < max) {
                quantityInput.value = currentValue + 1;
            }
        });

        decreaseBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value) || 1; // Giá trị mặc định là 1 nếu rỗng
            const min = parseInt(quantityInput.min) || 1; // Giới hạn dưới mặc định là 1

            if (currentValue > min) {
                quantityInput.value = currentValue - 1;
            }
        });

        quantityInput.addEventListener('input', () => {
            let currentValue = parseInt(quantityInput.value) || 1; // Giá trị mặc định
            const min = parseInt(quantityInput.min) || 1; // Giới hạn dưới
            const max = parseInt(quantityInput.max) || Infinity; // Giới hạn trên

            if (currentValue < min) {
                quantityInput.value = min;
            } else if (currentValue > max) {
                quantityInput.value = max;
            }
        });
    });
    // document.addEventListener('DOMContentLoaded', () => {
    //     const sizeRadios = document.querySelectorAll('input[name="kich_co"]');
    //     const hiddenSizeInput = document.querySelector('form[action*="thanh-toan-mua-ngay"] input[name="kich_co"]');

    //     sizeRadios.forEach(radio => {
    //         radio.addEventListener('change', () => {
    //             if (radio.checked) {
    //                 hiddenSizeInput.value = radio.value; // Update hidden input value
    //             }
    //         });
    //     });
    // });

    // const buyNowForm = document.querySelector('.mua-hang form');
    // buyNowForm.addEventListener('submit', () => {
    //     document.getElementById('hidden_quantity').value = document.getElementById('cart_quantity').value;
    // });
</script>

<?php
require_once "layout/footer.php"
?>