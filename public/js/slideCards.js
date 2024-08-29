document.addEventListener("DOMContentLoaded", function () {
  const data = [
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
    {
      img: "../assets/imgs/card-blog.png",
      title:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur ",
      desc: " Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor eiusmod temporLorem ipsum......",
      viewNum: 251,
      link: "./blog.html",
    },
  ];
  const slidesPerView = 4;
  const totalSlides = Math.ceil(data.length / slidesPerView);

  for (let i = 0; i < totalSlides; i++) {
    const slide = document.createElement("swiper-slide");
    slide.classList.add("swiper-slide");

    for (
      let j = i * slidesPerView;
      j < (i + 1) * slidesPerView && j < data.length;
      j++
    ) {
      const card = document.createElement("div");
      card.classList.add("card-blogs");

      const item = data[j];

      card.innerHTML = `
  <img src="${item.img}" alt="${item.title}" class="card-blog-img">
  <div class="card-blog-content">
    <h3>${item.title}</h3>
   <div class="card-blog-desc">
    ${
      item.desc.length > 125
        ? `<p>${item.desc}</p>
          <a href='${item.link}'>more</a> 
        `
        : `<p>${item.desc}</p>`
    }
   </div>
    <div class="card-blog-footer">
    <button><a href='${item.link}'>Read more</a></button>
    <div class="card-blog-views">
      <img  src="../assets/icons/view.svg" alt="">
     <span>${item.viewNum}</span>
     </div>
    </div>
  </div>`;

      slide.appendChild(card);
    }

    document.querySelector(".mySwiper").appendChild(slide);
  }

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
      "align-content: center;",
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
});
