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
                <tbody >
                    <tr>
                        <td>
                            <img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt="">
                        </td>
                        <td style="padding-top: 10%;">
                            <p>Sản phẩm áo black đẹp</p>
                        </td>
                        <td style="padding-top: 9%;">
                            <div class="tang-giam-sl">
                                <span class="giam"><i class="fa-solid fa-caret-left"></i></span>
                                <span class="so">01</span>
                                <span class="them"><i class="fa-solid fa-caret-right"></i></span>
                            </div>
                        </td>
                        <td style="padding-top: 10%;">
                            <p>250.000 VNĐ</p>
                        </td>
                        <td style="padding-top: 10%;">
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt="">
                        </td>
                        <td style="padding-top: 10%;">
                            <p>Sản phẩm áo black đẹp</p>
                        </td>
                        <td style="padding-top: 9%;">
                            <div class="tang-giam-sl">
                                <span class="giam"><i class="fa-solid fa-caret-left"></i></span>
                                <span class="so">01</span>
                                <span class="them"><i class="fa-solid fa-caret-right"></i></span>
                            </div>
                        </td>
                        <td style="padding-top: 10%;">
                            <p>250.000 VNĐ</p>
                        </td>
                        <td style="padding-top: 10%;">
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://themewagon.github.io/kaira/images/product-item-1.jpg" alt="">
                        </td>
                        <td style="padding-top: 10%;">
                            <p>Sản phẩm áo black đẹp</p>
                        </td>
                        <td style="padding-top: 9%;">
                            <div class="tang-giam-sl">
                                <span class="giam"><i class="fa-solid fa-caret-left"></i></span>
                                <span class="so">01</span>
                                <span class="them"><i class="fa-solid fa-caret-right"></i></span>
                            </div>
                        </td>
                        <td style="padding-top: 10%;">
                            <p>250.000 VNĐ</p>
                        </td>
                        <td style="padding-top: 10%;">
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="thanh-toan">
            <h2>TỔNG HOÁ ĐƠN</h2>
            <table class="table">
                <thead>
                    <th>Tổng Tiền</th>
                    <th>1.111.111 VNĐ</th>
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

    them.addEventListener("click", ()=>{
        a++;
        a = (a < 10) ? "0" + a : a;
        so.innerHTML = a;
        console.log(a);
    })

    giam.addEventListener("click", ()=>{
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