const swiperEl = document.querySelector(".swiper-cards");

        const params = {
            injectStyles: [
                ".swiper-pagination-bullet {",
                "  width: 27px;",
                "  height: 27px;",
                "  text-align: center;",
                "  line-height: 20px;",
                "  font-size: 14px;",
                "  color: #000;",
                "  opacity: 1;",
                "  background: transparent;",
                "  align-content: center;",
                "}",
                "",
                ".swiper-pagination-bullet-active {",
                "  color: #fff;",
                "  background: #253A7B;",
                "}",
            ],
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            },
        };

        Object.assign(swiperEl, params);
        swiperEl.initialize();
