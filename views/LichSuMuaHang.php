<?php
require_once "layout/menu.php";

?>


<div class="main-content">
    <div class="main-gio-hang container">
        <div class="gio-hang container">
            <h2>GIỎ HÀNG</h2>
            <table class="table">
                <thead>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái đơn hàng</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>
                    <?php foreach ($donHangs as $donHang): ?>
                        <tr>
                            <td><?= $donHang['ma_don_hang'] ?></td>
                            <td><?= formatDate($donHang['ngay_dat']) ?></td>
                            <td><?= formatPrice($donHang['tong_tien']) ?> VND</td>
                            <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                            <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHang['id']?>" class="btn btn-dark">Chi tiết đơn hàng</a>
                                <?php if ($donHang['trang_thai_id'] == 1) { ?>
                                    <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHang['id']?>" class="btn btn-dark" onclick="return confirm('Bạn xác nhận huỷ đơn hàng?')">
                                        Huỷ
                                    </a>
                                <?php }?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>
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