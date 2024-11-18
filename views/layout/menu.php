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
                    <img src="<?= BASE_URL ?>/assets/img/logo.png" alt="">
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="<?= BASE_URL ?>?act=/">TRANG CHỦ</a></li>
                        <li class="dropdown">
                            <button class="dropbtn"><a href="<?= BASE_URL ?>?act=san-pham">SẢN PHẨM
                                    <i class="fa-solid fa-angle-down"></i></a></button>
                            <div class="dropdown-content">
                                <a href="#">Link 1</a>
                                <a href="#">Link 2</a>
                                <a href="#">Link 3</a>
                        </li>
                        <li class="dropdown">
                            <button class="dropbtn"><a href="<?= BASE_URL ?>?act=bo-suu-tap">BỘ SƯU TẬP
                                    <i class="fa-solid fa-angle-down"></i></a></button>
                            <div class="dropdown-content">
                                <a href="#">Link 1</a>
                                <a href="#">Link 2</a>
                                <a href="#">Link 3</a>
                        </li>
                        <li><a href="<?= BASE_URL ?>?act=gioi-thieu">GIỚI THIỆU</a></li>
                        <li><a href="<?= BASE_URL ?>?act=tin-tuc">TIN TỨC</a></li>
                        <li><a href="<?= BASE_URL ?>?act=lien-he">LIÊN HỆ</a></li>
                    </ul>
                </div>

                <div class="menu-search">
                    <ul>
                        <li class="dropdown">
                            <button class="dropbtn"><a href="<?= BASE_URL ?>?act=dang-nhap"><span class="material-symbols-outlined">account_circle</span></a></button>
                            <div class="dropdown-content">
                                <a href="<?= BASE_URL ?>?act=dang-nhap">ĐĂNG NHẬP</a>
                                <a href="<?= BASE_URL ?>?act=dang-ky">ĐĂNG KÝ</a>
                        </li>
                        <li><a href="<?= BASE_URL ?>?act=gio-hang"><i class="fas fa-cart-plus"></i></a></li>
                        <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                    </ul>
                </div>
            </nav>