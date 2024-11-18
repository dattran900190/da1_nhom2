<?php
    require_once "views/layout/css.php";
    ?>

<div class="main-content">
    <div class="contents">
        <div class="main-thanh-toan ">
            <div class="logo">
                <img src="<?= BASE_URL ?>/assets/img/logo.png" alt="">
            </div>
            <div class="thong-tin-nhan-hang">
                <div class="top">
                    <h2>Thông tin nhận hàng</h2>
                    Bạn đã có tài khoản? <a href="">Đăng nhập</a>
                </div>
                <div class="mid">
                    <form>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" placeholder="Nhập Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="ho_ten" placeholder="Nhập họ và tên">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="so_dien_thoai" placeholder="Nhập Số điện thoại">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="dia_chi" placeholder="Nhập Địa chỉ">
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-sm mb-3 p-2" id="city" aria-label=".form-select-sm">
                                <option value="" selected>Chọn tỉnh thành</option>
                            </select>

                            <select class="form-select form-select-sm mb-3 p-2" id="district" aria-label=".form-select-sm">
                                <option value="" selected>Chọn quận huyện</option>
                            </select>

                            <select class="form-select form-select-sm p-2" id="ward" aria-label=".form-select-sm">
                                <option value="" selected>Chọn phường xã</option>
                            </select>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Ghi chú (tuỳ chọn)" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Bình luận</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="main-thanh-toan2">
            <div class="van-chuyen">
                <div class="top">
                    <h2>Vận chuyển</h2>
                    <div class="form-check" style="display: flex; justify-content: space-between;">
                        <div class="chon">
                            <input class="form-check-input" type="radio" name="deliveryMethod" id="deliveryMethod1" checked disabled>
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
                        <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethodVNPAY" checked>
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
                <div class="form-check" style="display: flex; justify-content: space-between;">
                    <div class="chon">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethodCOD">
                        <label class="form-check-label" for="paymentMethodCOD">
                            Thanh toán khi giao hàng (COD)
                        </label>
                    </div>
                    <div class="icon-bank">
                        <i class="fa-regular fa-money-bill-1"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="don-hang">
            <h2>Đơn hàng</h2>
            <hr>
            <div class="thong-tin-sp">
                <div class="anh-san-pham">
                    <img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt="">
                </div>
                <div class="ten-san-pham">
                    Sản phẩm áo black đẹp
                    <br>
                    <span>Size: XL</span>
                    <br>
                    <span>Số lượng: 2</span>
                </div>
                <div class="gia-san-pham">
                    250.000 VNĐ
                </div>
            </div>
            <div class="thong-tin-sp">
                <div class="anh-san-pham">
                    <img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt="">
                </div>
                <div class="ten-san-pham">
                    Sản phẩm áo black đẹp
                    <br>
                    <span>Size: XL</span>
                    <br>
                    <span>Số lượng: 2</span>
                </div>
                <div class="gia-san-pham">
                    250.000 VNĐ
                </div>
            </div>
            <div class="thong-tin-sp">
                <div class="anh-san-pham">
                    <img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt="">
                </div>
                <div class="ten-san-pham">
                    Sản phẩm áo black đẹp
                    <br>
                    <span>Size: XL</span>
                    <br>
                    <span>Số lượng: 2</span>
                </div>
                <div class="gia-san-pham">
                    250.000 VNĐ
                </div>
            </div>
            <hr>
            <div class="ma-giam-gia mb-3">
                <input type="voucher" class="form-control" id="voucher" placeholder="Nhập mã giảm giá">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
            <hr>
            <div class="phi-tam-thoi">
                <div class="tam-tinh">
                    <p>Tạm tính</p>
                    1.111.111 VNĐ
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
                    <h5>1.141.111 VNĐ</h5>
                </div>
            </div>
            
            <div class="dat-hang">
                <a href="<?= BASE_URL ?>?act=gio-hang"><i class="fa-solid fa-angle-left"></i> Quay về giỏ hàng</a>
                <button class="btn btn-info" style="padding: 10px 20px;">ĐẶT HÀNG</button>
            </div>
        </div>
    </div>
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
