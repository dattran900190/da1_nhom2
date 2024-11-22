<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/image 1.png" alt="" height="30px" width="80px">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/image 1.png" alt="" height="30px" width="80px">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">Phan Khanh</span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome Anna!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Quản lý</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php BASE_URL_ADMIN ?>?act=/">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php BASE_URL_ADMIN ?>?act=quan-ly-danh-muc-san-pham">
                    <i class="fa-sharp fa-solid fa-layer-group"></i> <span data-key="t-dashboards">Quản lý danh mục sản phẩm</span>
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarDanhMuc" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDanhMuc"  <?php BASE_URL_ADMIN ?>?act=quan-ly-tai-khoan-quan-tri-vien >
                    <i class="fa-solid fa-users"></i> <span data-key="t-dashboards">Quản lý người dùng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDanhMuc">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php BASE_URL_ADMIN ?>?act=quan-ly-tai-khoan-quan-tri-vien" class="nav-link" data-key="t-sweet-alerts">
                                    Tài Khoản Quản trị viên
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="<?php BASE_URL_ADMIN ?>?act=quan-ly-tai-khoan-khach-hang"  class="nav-link" data-key="t-nestable-list">
                                    Tài khoản khách hàng
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
          
                  
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php BASE_URL_ADMIN ?>?act=quan-ly-san-pham">
                    <i class="fa-brands fa-product-hunt"></i> <span data-key="t-dashboards">Quản lý sản phẩm</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php BASE_URL_ADMIN ?>?act=quan-ly-bo-suu-tap">
                    <i class="fa-regular fa-barcode"></i> <span data-key="t-dashboards">Quản lý Bộ Sưu Tập</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php BASE_URL_ADMIN ?>?act=quan-ly-banner">
                    <i class="fa-solid fa-folder-open"></i> <span data-key="t-dashboards">Quản lý banner</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php BASE_URL_ADMIN ?>?act=quan-ly-binh-luan">
                    <i class="fa-solid fa-comment"></i> <span data-key="t-dashboards">Quản lý bình luận</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php BASE_URL_ADMIN ?>?act=quan-ly-danh-gia-trang-thai-don-hang">
                    <i class="fa-brands fa-medium"></i> <span data-key="t-dashboards">Quản lý đánh giá trạng thái đơn hàng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php BASE_URL_ADMIN ?>?act=quan-ly-don-hang">
                    <i class="fa-solid fa-cart-plus"></i> <span data-key="t-dashboards">Quản lý đơn hàng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php BASE_URL_ADMIN ?>?act=quan-ly-khuyen-mai">
                    <i class="fa-solid fa-bolt"></i> <span data-key="t-dashboards">Quản lý khuyến mãi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php BASE_URL_ADMIN ?>?act=quan-ly-lien-he">
                    <i class="fa-solid fa-paper-plane"></i> <span data-key="t-dashboards">Quản lý liên hệ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php BASE_URL_ADMIN ?>?act=quan-ly-tin-tuc">
                        <i class="fa-solid fa-passport"></i> <span data-key="t-dashboards">Quản lý Tin tức</span>
                    </a>
                </li>
                





                
                

            

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>