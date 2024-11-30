<div class="footer" style="background-color: #F1F1F0;">
    <div class="contact-email">
        <div class="title">Đăng ký nhận bản tin của chúng tôi</div>
        <form action="">
            <input type="text" placeholder="Địa Chỉ Email Của Bạn">
            <button>ĐĂNG KÝ</button>
        </form>

    </div>
    <div class="mid">
        <div class="content1">
            <div class="logo">
                <img src="<?= BASE_URL ?>/assets/img/logo.png" alt="">
            </div>
            <div class="c-content">
                Chúng tôi mang đến những bộ sưu tập thời trang tinh tế, giúp bạn thể hiện phong cách cá nhân với sự kết hợp
                hoàn hảo giữa chất liệu cao cấp và thiết kế hiện đại, tạo nên vẻ đẹp tự tin và nổi bật cho mỗi bước đi của bạn.
            </div>
            <div class="social">
                <ul>
                    <li><i class="fa-brands fa-facebook"></i></li>
                    <li><i class="fa-brands fa-twitter"></i></li>
                    <li><i class="fa-brands fa-youtube"></i></li>
                    <li><i class="fa-brands fa-instagram"></i></li>
                    <li><i class="fa-brands fa-pinterest"></i></li>
                </ul>
            </div>
        </div>
        <div class="content2">
            <div class="title">Quick Links</div>
            <div class="list-content">
                <ul>
                    <li><a href="#">TRANG CHỦ</a></li>
                    <li><a href="#">SẢN PHẨM</a></li>
                    <li><a href="#">SẢN PHẨM MỚI</a></li>
                    <li><a href="#">Bộ SƯU TẬP</a></li>
                    <li><a href="#">TIN TỨC</a></li>
                    <li><a href="#">LIÊN HỆ</a></li>
                </ul>
            </div>
        </div>
        <div class="content2">
            <div class="title">Help & Info</div>
            <div class="list-content">
                <ul>
                    <li><a href="#">Theo Dõi Đơn Hàng</a></li>
                    <li><a href="#">Đổi Trả + Hoàn Tiền</a></li>
                    <li><a href="#">Vận Chuyển + Giao Hàng</a></li>
                    <li><a href="#">Liên Hệ Với Chúng Tôi</a></li>
                    <li><a href="#">Tìm Chúng Tôi Dễ Dàng</a></li>
                    <li><a href="#">Câu Hỏi Thường Gặp</a></li>
                </ul>

            </div>
        </div>
        <div class="content3">
            <div class="title">Liên Hệ Với Chúng Tôi</div>
            <div class="list-content">
                Bạn có câu hỏi hoặc đề xuất nào không?
                <a href="">dattlph49133@gmail.com</a>
                <br>
                <br>
                Bạn cần hỗ trợ? Hãy gọi cho chúng tôi.
                <br>
                <a href="">03324385872</a>
            </div>
        </div>

    </div>
    <div class="line-ngang"></div>
    <div class="end-web">
        <div class="ship">
            <p>Chúng tôi vận chuyển với:</p>
            <ul>
                <li><img src="<?= BASE_URL ?>/assets/img/logo_ship-removebg-preview.png" alt=""></li>
                <li><img src="<?= BASE_URL ?>/assets/img/logo_ship1-removebg-preview.png" alt=""></li>
            </ul>
            <p>Phương thức thanh toán:</p>
            <ul>
                <li><img src="<?= BASE_URL ?>/assets/img/zaloPay.png" alt=""></li>
                <li><img src="<?= BASE_URL ?>/assets/img/momo.png" alt=""></li>
                <li><img src="<?= BASE_URL ?>/assets/img/visa-removebg-preview.png" alt=""></li>
            </ul>
        </div>

        <div class="Copyright">
            © Bản quyền 2022 Ralph Lauren. Tất cả quyền lợi được bảo vệ. Thiết kế bởi datlph49133
            <br>
            Phân phối bởi cao đẳng FPT Polytechnic
        </div>

    </div>
</div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // First set of arrows
    const container = document.getElementById("items-container");
    const leftArrow = document.getElementById("left-arrow");
    const rightArrow = document.getElementById("right-arrow");

    function scrollToNextSet1() {
        const itemWidth = container.querySelector(".item").offsetWidth;
        if (container.scrollLeft + container.clientWidth >= container.scrollWidth - itemWidth) {
            container.scrollLeft = 0;
        } else {
            container.scrollLeft += itemWidth;
        }
    }

    function scrollToPrevSet1() {
        const itemWidth = container.querySelector(".item").offsetWidth;
        if (container.scrollLeft <= itemWidth) {
            container.scrollLeft = container.scrollWidth;
        } else {
            container.scrollLeft -= itemWidth;
        }
    }

    rightArrow.addEventListener("click", scrollToNextSet1);
    leftArrow.addEventListener("click", scrollToPrevSet1);

    // Second set of arrows
    const containerV2 = document.getElementById("items-container-v2");
    const leftArrowV2 = document.getElementById("left-arrow-v2");
    const rightArrowV2 = document.getElementById("right-arrow-v2");

    function scrollToNextSet2() {
        const itemWidthV2 = containerV2.querySelector(".san-pham").offsetWidth;
        if (containerV2.scrollLeft + containerV2.clientWidth >= containerV2.scrollWidth - itemWidthV2) {
            containerV2.scrollLeft = 0;
        } else {
            containerV2.scrollLeft += itemWidthV2;
        }
    }

    function scrollToPrevSet2() {
        const itemWidthV2 = containerV2.querySelector(".san-pham").offsetWidth;
        if (containerV2.scrollLeft <= itemWidthV2) {
            containerV2.scrollLeft = containerV2.scrollWidth;
        } else {
            containerV2.scrollLeft -= itemWidthV2;
        }
    }

    rightArrowV2.addEventListener("click", scrollToNextSet2);
    leftArrowV2.addEventListener("click", scrollToPrevSet2);


    // Second set of arrows
    const containerV3 = document.getElementById("items-container-v3");
    const leftArrowV3 = document.getElementById("left-arrow-v3");
    const rightArrowV3 = document.getElementById("right-arrow-v3");

    function scrollToNextSet3() {
        const itemWidthV3 = containerV3.querySelector(".san-pham").offsetWidth;
        if (containerV3.scrollLeft + containerV3.clientWidth >= containerV3.scrollWidth - itemWidthV3) {
            containerV3.scrollLeft = 0;
        } else {
            containerV3.scrollLeft += itemWidthV3;
        }
    }

    function scrollToPrevSet3() {
        const itemWidthV3 = containerV3.querySelector(".san-pham").offsetWidth;
        if (containerV3.scrollLeft <= itemWidthV3) {
            containerV3.scrollLeft = containerV3.scrollWidth;
        } else {
            containerV3.scrollLeft -= itemWidthV3;
        }
    }

    rightArrowV3.addEventListener("click", scrollToNextSet3);
    leftArrowV3.addEventListener("click", scrollToPrevSet3);

    // Second set of arrows
    const containerV4 = document.getElementById("items-container-v4");
    const leftArrowV4 = document.getElementById("left-arrow-v4");
    const rightArrowV4 = document.getElementById("right-arrow-v4");

    function scrollToNextSet4() {
        const itemWidthV4 = containerV4.querySelector(".san-pham").offsetWidth; // Sửa thành ".san-pham"
        if (containerV4.scrollLeft + containerV4.clientWidth >= containerV4.scrollWidth - itemWidthV4) {
            containerV4.scrollLeft = 0;
        } else {
            containerV4.scrollLeft += itemWidthV4;
        }
    }

    function scrollToPrevSet4() {
        const itemWidthV4 = containerV4.querySelector(".san-pham").offsetWidth; // Sửa thành ".san-pham"
        if (containerV4.scrollLeft <= itemWidthV4) {
            containerV4.scrollLeft = containerV4.scrollWidth;
        } else {
            containerV4.scrollLeft -= itemWidthV4;
        }
    }

    rightArrowV4.addEventListener("click", scrollToNextSet4);
    leftArrowV4.addEventListener("click", scrollToPrevSet4);


    // document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    //     anchor.addEventListener("click", function(e) {
    //         e.preventDefault();

    //         const target = document.querySelector(this.getAttribute("href"));
    //         target.scrollIntoView({
    //             behavior: "smooth",
    //             block: "start"
    //         });
    //     });
    // });

    // function changeQuantity(delta) {
    //     const quantityInput = document.getElementById('so_luong');
    //     let currentQuantity = parseInt(quantityInput.value) || 1; // Lấy giá trị hiện tại hoặc mặc định là 1
    //     currentQuantity += delta;
    //     if (currentQuantity < 1) currentQuantity = 1; // Không cho phép số lượng < 1
    //     quantityInput.value = currentQuantity;
    // }



    // chuyển trang

    //     const products = document.querySelectorAll('.san-pham');
    // const itemsPerPage = 20; // 4 columns x 5 rows
    // const totalPages = Math.ceil(products.length / itemsPerPage);
    // let currentPage = 1;

    // // Function to show products for the current page
    // function showPage(page) {
    //     products.forEach((product, index) => {
    //         if (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage) {
    //             product.style.display = 'block';
    //         } else {
    //             product.style.display = 'none';
    //         }
    //     });
    // }

    // // Function to update pagination buttons
    // function updatePagination() {
    //     const pagination = document.querySelector('.pagination');
    //     pagination.innerHTML = '';

    //     for (let i = 1; i <= totalPages; i++) {
    //         const li = document.createElement('li');
    //         li.classList.add(i === currentPage ? 'active' : '');
    //         li.innerHTML = `<a href="#">${i}</a>`;
    //         li.addEventListener('click', (e) => {
    //             e.preventDefault();
    //             currentPage = i;
    //             showPage(currentPage);
    //             updatePagination();
    //         });
    //         pagination.appendChild(li);
    //     }
    // }

    // // Initialize the pagination
    // showPage(currentPage);
    // updatePagination();
</script>

</html>