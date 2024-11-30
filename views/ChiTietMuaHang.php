<?php
require_once "layout/menu.php";

?>


<div class="main-content">
    <div class="main-gio-hang container">
        <div class="gio-hang container">
            <h2>CHI TIẾT GIỎ HÀNG</h2>
            <table class="table">
                <thead>
                    <th colspan="5" class="text-center">Thông tin sản phẩm</th>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php foreach ($chiTietDonHang as $sanpham): ?>
                        <tr>
                            
                            <td>
                                <img src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" alt="" width="100px">
                            </td>
                            <td><?= $sanpham['ten_san_pham'] ?></td>
                            <td><?= number_format($sanpham['don_gia'], 0, ',', '.') ?> VNĐ</td>
                            <td><?= $sanpham['so_luong'] ?></td>
                            <td><?= number_format($sanpham['thanh_tien'], 0, ',', '.') ?> VNĐ</td>

                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>
        </div>
        <div class="gio-hang container" style="padding-top: 46px;">
            <table class="table">
                <thead>
                    <th colspan="5" class="text-center">Thông tin đơn hàng</th>
                </thead>
                <tbody>
                    <tr>
                        <th>Mã đơn hàng: </th>
                        <td><?= $donHang['ma_don_hang'] ?></td>
                    </tr>
                    <tr>
                        <th>Người nhận: </th>
                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td><?= $donHang['email_nguoi_nhan'] ?></td>
                    </tr>
                    <tr>
                        <th>Số điện thoại: </th>
                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ: </th>
                        <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
                    </tr>
                    <tr>
                        <th>Ngày đặt: </th>
                        <td><?= $donHang['ngay_dat'] ?></td>
                    </tr>
                    <tr>
                        <th>Ghi chú: </th>
                        <td><?= $donHang['ghi_chu'] ?></td>
                    </tr>
                    <tr>
                        <th>Tổng tiền: </th>
                        <td><?=  number_format($donHang['tong_tien'], 0, ',', '.') ?> VNĐ</td>
                    </tr>
                    <tr>
                        <th>Phương thức thanh toán: </th>
                        <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                    </tr>
                    <tr>
                        <th>Trạng thái đơn hàng: </th>
                        <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                    </tr>
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