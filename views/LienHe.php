<?php
require_once "layout/menu.php";

?>


<div class="main-content">


    <div class="title-lien-he">
        <h2>CÁCH LIÊN HỆ VỚI DỊCH VỤ KHÁCH HÀNG CỦA RALPHLAUREN</h2>
        CHỌN PHƯƠNG THỨC LIÊN HỆ ƯA THÍCH CỦA BẠN VÀ KẾT NỐI VỚI CHÚNG TÔI
    </div>
    <div class="lien-hes">
        <div class="phone">
            <h4>Điện Thoại</h4>
            Thứ hai - Thứ bảy từ 9 sáng đến 11 tối (GMT+7).
            Chủ nhật từ 10 sáng đến 9 tối (GMT+7).
            <br>
            <a href="#"><i class="fa-solid fa-phone"></i> Gọi: 0325.836.909</a>
        </div>
        <div class="chat">
            <h4>Nhắn Tin</h4>
            Thứ hai - Thứ bảy từ 9 sáng đến 11 tối (GMT+7).
            Chủ nhật từ 10 sáng đến 9 tối (GMT+7).
            <br>
            <a href="#"><i class="fa-regular fa-comment"></i> Message</a>
        </div>
    </div>
    <div class="email">
        <div class="title">
            LIÊN HỆ VỚI CHÚNG TÔI THÔNG QUA EMAIL
        </div>
        <!-- Thêm thông báo từ session -->

        <form class="form-lien-he" method="POST" action="<?= BASE_URL . '?act=them-lien-he' ?>">
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="text-center">
                    <?= $_SESSION['success_message'] ?>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['flash'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['flash'] ?>
                </div>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>
            <!-- Trường ID tài khoản (ẩn) -->
            <input type="hidden" name="id_tai_khoan" value="<?= $_SESSION['user_client']['id'] ?? '' ?>">

            <div class="mb-3">
                <input type="text" class="form-control" id="title" placeholder="Tiêu Đề" name="chu_de_lien_he"
                    value="<?= $_POST['chu_de_lien_he'] ?? '' ?>">
                <small class="text-danger"><?= $_SESSION['errors']['chu_de_lien_he'] ?? '' ?></small>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="name" placeholder="Họ Tên" name="ho_ten"
                    value="<?= $_POST['ho_ten'] ?? '' ?>">
                <small class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?? '' ?></small>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                    value="<?= $_POST['email'] ?? '' ?>">
                <small class="text-danger"><?= $_SESSION['errors']['email'] ?? '' ?></small>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="phone" placeholder="Số Điện Thoại" name="so_dien_thoai"
                    value="<?= $_POST['so_dien_thoai'] ?? '' ?>">
                <small class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?? '' ?></small>
            </div>

            <div class="mb-3">
                <textarea class="form-control" placeholder="Nội Dung" id="floatingTextarea2" style="height: 100px"
                    name="noi_dung"><?= $_POST['noi_dung'] ?? '' ?></textarea>
                <small class="text-danger"><?= $_SESSION['errors']['noi_dung'] ?? '' ?></small>
            </div>

            <button type="submit" style="width: 100%;" class="btn btn-dark">Gửi liên hệ</button>
        </form>

    </div>
    <div class="bo-suu-tap-lien-he">
        <H2>NHỮNG BỘ SƯU TẬP BẠN CÓ THỂ SẼ THÍCH</H2>
    </div>
    <div class="product-header">
        <button id="left-arrow" class="arrow">&#9664;</button>
        <div class="container" id="items-container">
            <?php foreach ($listBoSuuTap as $suTap): ?>
                <div class="item">
                    <img src="<?= $suTap['hinh_anh'] ?>" alt="" width="300px" height="400px">
                    <div class="title"><a href="<?= BASE_URL . '?act=bo-suu-tap&bo-suu-tap=' . urlencode($suTap['id']) ?>"><?= $suTap['ten_bo_suu_tap'] ?></a></div>
                    <div class="content" style="padding: 0 20px;">
                        <?= $suTap['mo_ta'] ?>
                    </div>
                    <a href="<?= BASE_URL . '?act=bo-suu-tap&bo-suu-tap=' . urlencode($suTap['id']) ?>">KHÁM PHÁ NGAY</a>
                </div>
            <?php endforeach ?>

        </div>
        <button id="right-arrow" class="arrow">&#9654;</button>
    </div>
</div>


<?php
require_once "layout/footer.php"
?>