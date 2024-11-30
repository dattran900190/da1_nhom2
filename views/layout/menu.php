<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <?php
    require_once "views/layout/css.php";
    ?>
</head>
<style>
    body {
        background-color: #FFFFFF;
    }
</style>

<body>
    <div>
        <div class="all-container">
            <nav class="nav-menu" style="background-color: #F1F1F0;">
                <div class="logo">
                    <a href="<?= BASE_URL ?>"><img src="<?= BASE_URL ?>/assets/img/logo.png" alt=""></a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="<?= BASE_URL ?>?act=/">TRANG CHỦ</a></li>
                        <li class="dropdown">
                            <button class="dropbtn">
                                <a href="<?= BASE_URL ?>?act=san-pham">SẢN PHẨM
                                    <i class="fa-solid fa-angle-down"></i>
                                </a>
                            </button>
                            <div class="dropdown-content">
                                <?php foreach ($listDanhMuc as $danhMuc): ?>
                                    <!-- urlcode() Tránh các vấn đề về cú pháp trong URL như Các ký tự đặc biệt: dấu cách, &, +, = phải được mã hóa để ngăn trình duyệt hoặc máy chủ hiểu sai. -->
                                    <a href="<?= BASE_URL . '?act=san-pham&danh-muc=' . urlencode($danhMuc['id']) ?>">
                                        <?= $danhMuc['ten_danh_muc'] ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </li>

                        <li class="dropdown">
                            <button class="dropbtn"><a href="<?= BASE_URL ?>?act=bo-suu-tap">BỘ SƯU TẬP
                                    <i class="fa-solid fa-angle-down"></i></a></button>
                            <div class="dropdown-content">
                                <?php foreach ($listBoSuuTap as $boSuuTap): ?>
                                    <!-- urlcode() Tránh các vấn đề về cú pháp trong URL như Các ký tự đặc biệt: dấu cách, &, +, = phải được mã hóa để ngăn trình duyệt hoặc máy chủ hiểu sai. -->
                                    <a href="<?= BASE_URL . '?act=bo-suu-tap&bo-suu-tap=' . urlencode($boSuuTap['id']) ?>">
                                        <?= $boSuuTap['ten_bo_suu_tap'] ?></a>

                                <?php endforeach ?>
                            </div>
                        </li>
                        <li><a href="<?= BASE_URL ?>?act=gioi-thieu">GIỚI THIỆU</a></li>
                        <li><a href="<?= BASE_URL ?>?act=tin-tuc">TIN TỨC</a></li>
                        <li><a href="<?= BASE_URL ?>?act=lien-he">LIÊN HỆ</a></li>
                    </ul>
                </div>

                <div class="menu-search">
                    <ul>


                        <li class="dropdown" style="padding-top: 6px;">

                            <button class="dropbtn">

                                <a href="<?= BASE_URL ?>?act=login">
                                    <span class="material-symbols-outlined">account_circle</span>
                                </a>
                                <a for="" style="font-size: 10px; color: black;">
                                    <?php if (isset($_SESSION['user_client'])) {
                                        echo $_SESSION['user_client'];
                                    } ?>
                                </a>
                            </button>
                            <div class="dropdown-content">

                                <?php if (!isset($_SESSION['user_client'])) { ?>
                                    <a href="<?= BASE_URL . '?act=login' ?>" style="font-size: 10px; padding: 10px;">ĐĂNG NHẬP</a>
                                    <a href="<?= BASE_URL . '?act=dang-ky' ?>" style="font-size: 10px; padding-bottom: 10px;">ĐĂNG KÝ</a>
                                <?php } else { ?>
                                    <a href="<?= BASE_URL . '?act=chi-tiet-khach-hang' ?>" style="font-size: 10px; padding: 10px 0;">Tài khoản</a>
                                    <a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>" style="font-size: 10px; padding-bottom: 10px;">Đơn hàng</a>
                                    <a href="<?= BASE_URL . '?act=logout' ?>" style="font-size: 10px; padding-bottom: 10px;">Đăng xuất</a>
                                <?php } ?>
                            </div>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>?act=gio-hang">
                                <i class="fas fa-cart-plus"></i>(<?= isset($tongDonHang) ? $tongDonHang : 0 ?>)
                            </a>
                        </li>
                        <li>
                            <div class="form-group has-search">
                                <form method="GET" action="<?= BASE_URL ?>?act=tim-kiem" style="display: flex;">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="hidden" name="act" value="tim-kiem">
                                    <input type="text" class="form-control" placeholder="Search" name="query"
                                        value=""

                                        required>
                                    <button type="submit" class="btn btn-dark" style="margin-left: 5px;">Tìm kiếm</button>
                                </form>
                            </div>

                        </li>
                    </ul>

                </div>
            </nav>