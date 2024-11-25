<?php
require_once "layout/menu.php";

?>


<div class="main-content">
    <div class="main-gio-hang container">
        <div class="gio-hang container">
            <h2>GIỎ HÀNG</h2>
            <table class="table">
                <thead>
                    <th>Ảnh Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Xoá</th>
                </thead>
                <tbody>
                    <?php $tongGioHang = 0;
                    foreach ($chiTietGioHang as $gioHang):
                    ?>
                        <tr>
                            <td>
                                <img src="<?= $gioHang['hinh_anh'] ?>" alt="">
                            </td>
                            <td style="padding-top: 10%;">
                                <p><?= $gioHang['ten_san_pham'] ?></p>
                            </td>
                            <td style="padding-top: 9%;">
                                <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post" class="">
                                    <div class="mb-3">

                                        <input type="hidden" name="san_pham_id" value="<?= $detailSanPham['id'] ?>">

                                        <div class="input-group" style="max-width: 200px;">
                                            <!-- Nút giảm số lượng -->
                                            <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(-1)">-</button>
                                            <!-- Ô nhập số lượng -->
                                            <input type="number" id="so_luong" name="so_luong" value="1" min="1" class="form-control text-center">
                                            <!-- Nút tăng số lượng -->
                                            <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(1)">+</button>
                                        </div>
                                    </div>

                                </form>
                            </td>
                            <td style="padding-top: 10%;">
                                <p>
                                    <?php if ($gioHang['gia_khuyen_mai']) { ?>
                                        <?= formatPrice($gioHang['gia_khuyen_mai']) . 'đ' ?>
                                    <?php   } else { ?>

                                        <?= formatPrice($gioHang['gia_san_pham']) . 'đ' ?>
                                    <?php   } ?>
                                    </span> VNĐ
                                </p>
                            </td>
                            <td style="padding-top: 10%;">
                                <i class="fa-solid fa-trash"></i>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="thanh-toan">
            <h2>TỔNG HOÁ ĐƠN</h2>
            <table class="table">
                <?php
                $tongTien = 0;
                if ($gioHang['gia_khuyen_mai']) {
                    $tongTien = $gioHang['gia_khuyen_mai'] * $gioHang['so_luong'];
                } else {
                    $tongTien = $gioHang['gia_san_pham'] * $gioHang['so_luong'];
                }
                $tongGioHang += $tongTien;
                echo formatPrice($tongTien);
                ?>
                <thead>
                    <th>Tổng Tiền</th>
                    <th><?= formatPrice($tongTien) ?> VNĐ</th>
                </thead>
            </table>
            <a href="<?= BASE_URL ?>?act=thanh-toan"><button class="btn btn-dark">THANH TOÁN</button></a>
            <a href=""><button class="btn btn-dark">TIẾP TỤC MUA SẮM</button></a>
        </div>
    </div>

</div>

<script>
    const them = document.querySelector('.them'),
        giam = document.querySelector('.giam'),
        so = document.querySelector('.so');

    let a = 1;

    them.addEventListener("click", () => {
        a++;
        a = (a < 10) ? "0" + a : a;
        so.innerHTML = a;
        console.log(a);
    })

    giam.addEventListener("click", () => {
        if (a > 1) {
            a--;
            a = (a < 10) ? "0" + a : a;
            so.innerHTML = a;
        }
    })
</script>

<?php
require_once "layout/footer.php"
?>