<?php
require_once "layout/menu.php";

?>


<div class="main-content">
    <div class="main-gio-hang container">
        <div class="gio-hang container">
            <h2>GIỎ HÀNG</h2>
            <table class="table">
                <thead class="text-center">
                    <th>Ảnh Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Kích cỡ</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                    <th>Xoá</th>
                </thead>
                <tbody>
                    <?php
                    $tongGioHang = 0;
                    if (isset($chiTietGioHang)) : ?>


                        <?php foreach ($chiTietGioHang as $gioHang):
                            $tongTien = $gioHang['gia_khuyen_mai'] == 0 ? $gioHang['gia_san_pham'] * $gioHang['so_luong'] : $gioHang['gia_khuyen_mai'] * $gioHang['so_luong'];
                            $tongGioHang += $tongTien;
                        ?>
                            <tr style="font-size: 15px; text-align: center;">
                                <td>
                                    <img src="<?= $gioHang['hinh_anh'] ?>" alt="">
                                </td>
                                <td style="padding-top: 10%;">
                                    <p><?= $gioHang['ten_san_pham'] ?></p>
                                </td>
                                <td style="padding-top: 9%;">
                                    <form action="<?= BASE_URL . '?act=cap-nhat-so-luong' ?>" method="post">
                                        <input type="hidden" name="san_pham_id" value="<?= $gioHang['id'] ?>">
                                        <div class="quantity d-flex align-items-center">
                                            <button type="button" class="btn btn-outline-secondary decrease-btn" data-id="<?= $gioHang['id'] ?>">-</button>
                                            <input type="text" class="form-control text-center mx-2 cart-quantity" data-id="<?= $gioHang['id'] ?>" value="<?= $gioHang['so_luong'] ?>" min="1" style="width: 60px;">
                                            <button type="button" class="btn btn-outline-secondary increase-btn" data-id="<?= $gioHang['id'] ?>">+</button>
                                        </div>
                                    </form>
                                </td>
                                <td style="padding-top: 10%;">
                                    <?= $gioHang['ten_kich_co'] ?>
                                </td>
                                <td style="padding-top: 10%;">
                                    <p>
                                        <?= formatPrice($gioHang['gia_khuyen_mai']) == 0 ? formatPrice($gioHang['gia_san_pham']) : formatPrice($gioHang['gia_khuyen_mai']) ?>
                                        <strike style="font-size: 11px;"><?= $gioHang['gia_khuyen_mai'] == 0 ?  '' : formatPrice($gioHang['gia_san_pham']) ?></strike>
                                        VNĐ
                                    </p>
                                </td>
                                <td style="padding-top: 10%;">
                                    <span class="total-price"
                                        data-id="<?= $gioHang['id'] ?>"
                                        data-price="<?= $gioHang['gia_khuyen_mai'] == 0 ? $gioHang['gia_san_pham'] : $gioHang['gia_khuyen_mai'] ?>">
                                        <?= formatPrice($tongTien) ?> VNĐ
                                    </span>
                                </td>

                                <td style="padding-top: 10%;">
                                    <a href="<?= BASE_URL . '?act=xoa-gio-hang&id=' . $gioHang['id'] ?>">
                                        <i class="fa-solid fa-trash" style="color: #000;"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif ?>
                </tbody>

            </table>
        </div>
        <div class="thanh-toan">
            <h2>TỔNG HOÁ ĐƠN</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tổng Tiền Giỏ Hàng</th>
                        <th><?= formatPrice($tongGioHang) ?> VNĐ</th>
                    </tr>
                </thead>
            </table>
            <a href="<?= BASE_URL ?>?act=thanh-toan"><button class="btn btn-dark">THANH TOÁN</button></a>
            <a href="<?= BASE_URL ?>"><button class="btn btn-dark">TIẾP TỤC MUA SẮM</button></a>
        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Lấy tất cả các nút tăng/giảm số lượng
        const increaseButtons = document.querySelectorAll('.increase-btn');
        const decreaseButtons = document.querySelectorAll('.decrease-btn');

        // Xử lý tăng số lượng
        increaseButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const productId = event.target.dataset.id; // Lấy ID sản phẩm từ data-id
                const quantityInput = document.querySelector(`.cart-quantity[data-id="${productId}"]`);
                const totalPriceElement = document.querySelector(`.total-price[data-id="${productId}"]`);
                const productPrice = parseFloat(totalPriceElement.dataset.price); // Lấy giá sản phẩm từ data-price

                let currentValue = parseInt(quantityInput.value) || 1; // Giá trị hiện tại
                const max = parseInt(quantityInput.max) || Infinity;

                if (currentValue < max) {
                    quantityInput.value = currentValue + 1;
                    updateTotalPrice(totalPriceElement, productPrice, quantityInput.value); // Cập nhật tổng tiền
                }
            });
        });

        // Xử lý giảm số lượng
        decreaseButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const productId = event.target.dataset.id; // Lấy ID sản phẩm từ data-id
                const quantityInput = document.querySelector(`.cart-quantity[data-id="${productId}"]`);
                const totalPriceElement = document.querySelector(`.total-price[data-id="${productId}"]`);
                const productPrice = parseFloat(totalPriceElement.dataset.price); // Lấy giá sản phẩm từ data-price

                let currentValue = parseInt(quantityInput.value) || 1; // Giá trị hiện tại
                const min = parseInt(quantityInput.min) || 1;

                if (currentValue > min) {
                    quantityInput.value = currentValue - 1;
                    updateTotalPrice(totalPriceElement, productPrice, quantityInput.value); // Cập nhật tổng tiền
                }
            });
        });

        // Hàm cập nhật tổng tiền
        function updateTotalPrice(element, price, quantity) {
            const totalPrice = price * quantity; // Tính tổng tiền
            element.textContent = totalPrice.toLocaleString(); // Hiển thị định dạng số
        }
    });
</script>

<?php
require_once "layout/footer.php"
?>