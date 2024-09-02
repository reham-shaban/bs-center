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
  ];
  data.forEach((item) => {
    const card = document.createElement("div");
    card.classList.add("card-blogs");
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
      <img  src="{{ asset('assets/icons/view.svg') }}" alt="">
     <span>${item.viewNum}</span>
     </div>
    </div>
  </div>`;

    document.querySelector(".card-container-blog").appendChild(card);
  });
});
