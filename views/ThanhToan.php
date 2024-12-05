<?php
require_once "views/layout/css.php";
?>

<div class="main-content">
    <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="POST">

        <div class="contents">
            <div class="main-thanh-toan ">
                <div class="logo">
                    <img src="<?= BASE_URL ?>/assets/img/logo.png" alt="">
                </div>
                <div class="thong-tin-nhan-hang">
                    <div class="top">
                        <h2>Thông tin nhận hàng</h2>
                        <!-- Bạn đã có tài khoản? <a href="">Đăng nhập</a> -->
                    </div>
                    <div class="mid">
                        <div class="mb-3">
                            <label for="">Tên người nhận</label>
                            <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="Nhập họ và tên">
                        </div>
                        <div class="mb-3">
                            <label for="">Địa chỉ Email</label>
                            <input type="email" class="form-control" name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Nhập Email">
                        </div>
                        <div class="mb-3">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" placeholder="Nhập Số điện thoại">
                        </div>
                        <div class="mb-3">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="Nhập Địa chỉ">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" name="ghi_chu" placeholder="Ghi chú đơn hàng (tuỳ chọn)" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Ghi chú</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-thanh-toan2">
                <div class="van-chuyen">
                    <div class="top">
                        <h2>Vận chuyển</h2>
                        <div class="form-check" style="display: flex; justify-content: space-between;">
                            <div class="chon">
                                <input class="form-check-input" type="radio" name="deliveryMethod" checked disabled>
                                <label class="form-check-label" for="deliveryMethod1">
                                    Giao hàng tận nơi
                                </label>
                            </div>
                            <div class="ship">30.000 VNĐ</div>
                        </div>
                    </div>
                </div>
                <div class="thanh-toan">
                    <h2>Thanh toán</h2>
                    <div class="form-check" style="display: flex; justify-content: space-between;">
                        <div class="chon">
                            <input class="form-check-input" value="1" type="radio" name="phuong_thuc_thanh_toan_id" checked>
                            <label class="form-check-label" for="paymentMethodCOD">
                                Thanh toán khi giao hàng (COD)
                            </label>
                        </div>
                        <div class="icon-bank">
                            <i class="fa-regular fa-money-bill-1"></i>
                        </div>
                    </div>
                    <div class="form-check" style="display: flex; justify-content: space-between;">
                        <div class="chon">
                            <input class="form-check-input" value="2" type="radio" name="phuong_thuc_thanh_toan_id">
                            <label class="form-check-label" for="paymentMethodVNPAY">
                                Thanh toán qua VNPAY-QR
                            </label>
                        </div>
                        <div class="icon-bank">
                            <span class="material-symbols-outlined">
                                qr_code_scanner
                            </span>
                        </div>
                    </div>

                </div>
            </div>


            <div class="don-hang">
                <h2>Thông tin sản phẩm</h2>
                <hr>

                <?php
                $tongSanPham = 0;
                foreach ($chiTietGioHang as $sanPham):
                    $tongTien = $sanPham['gia_khuyen_mai'] == 0 ? $sanPham['gia_san_pham'] * $sanPham['so_luong'] : $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                    $tongSanPham += $tongTien;
                ?>
                    <table>

                        <tbody>
                            <tr style="border-bottom: 1px solid #ccc; padding: 10px 0;">
                                <td style="padding: 10px;">
                                    <img src="<?= $sanPham['hinh_anh'] ?>" alt="Sản phẩm" >
                                </td>
                                <td style="padding: 20px; line-height: 20px; font-size: 12px;">
                                    <?= $sanPham['ten_san_pham'] ?><br>
                                    Kích cỡ: <?= $sanPham['ten_kich_co'] ?> <br>
                                    Số lượng: <?= $sanPham['so_luong'] ?> <br>
                                    Giá: <?= formatPrice($tongTien) ?> VNĐ
                                </td>
                            </tr>
                        </tbody>

                    </table>

                <?php endforeach; ?>


                <hr>
                <div class="ma-giam-gia mb-3">
                    <input type="voucher" class="form-control" id="voucher" placeholder="Nhập mã giảm giá">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
                <hr>
                <div class="phi-tam-thoi">
                    <div class="tam-tinh">
                        <p>Tạm tính</p>
                        <?= formatPrice($tongSanPham) ?> VNĐ
                    </div>
                    <div class="phi-van-chuyen">
                        <p>Phí vận chuyển</p>
                        30.000 VNĐ
                    </div>
                </div>
                <hr>

                <div class="tong-cong">
                    <div class="tong-thanh-toan">
                        <p>Tổng tiền thanh toán</p>
                        <input type="hidden" name="tong_tien" value="<?= $tongSanPham + 30000 ?>">
                        <h5><?= formatPrice($tongSanPham + 30000) ?> VNĐ</h5>
                    </div>
                </div>

                <div class="dat-hang">
                    <a href="<?= BASE_URL ?>?act=gio-hang"><i class="fa-solid fa-angle-left"></i> Quay về giỏ hàng</a>
                    <button class="btn btn-info" type="submit" style="padding: 10px 20px;">ĐẶT HÀNG</button>
                </div>
            </div>
        </div>
    </form>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Id === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id);
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }
</script>