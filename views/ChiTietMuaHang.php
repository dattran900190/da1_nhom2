<?php
require_once "layout/menu.php";
?>

<div class="main-content">
    <div class="container">
        <!-- Cart Details Section -->
        <div class="gio-hang mb-5">
            <br>
            <h2 class="text-center mb-4">CHI TIẾT ĐƠN HÀNG</h2>
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Kích cỡ</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chiTietDonHang as $sanpham): ?>
                        <tr>
                            <td class="text-center">
                                <img src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" alt="" width="100px">
                            </td>
                            <td><?= $sanpham['ten_san_pham'] ?></td>
                            <td class="text-center"><?= number_format($sanpham['don_gia'], 0, ',', '.') ?> VNĐ</td>
                            <td class="text-center"><?= $sanpham['so_luong'] ?></td>
                            <td class="text-center"><?= $sanpham['kich_co'] ?></td>
                            <td class="text-center"><?= number_format($sanpham['thanh_tien'], 0, ',', '.') ?> VNĐ</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <!-- Order Information Section -->

   
    <div class="gio-hang">
        <h2 class="text-center mb-4">Thông tin đơn hàng</h2>
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th colspan="2" class="text-center">Chi tiết đơn hàng</th>
                </tr>
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
                    <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VNĐ</td>
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

<?php
require_once "layout/footer.php";
?>