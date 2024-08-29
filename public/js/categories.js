const categories = [
  {
    imgSrc: "/assets/imgs/categories/2.png",
    title: "Quality and Productivity",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing ",
    link: "/pages/courses.html",
  },
  {
    imgSrc: "/assets/imgs/categories/3.png",
    title: "Leadership",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing ",
    link: "/pages/courses.html",
  },
  {
    imgSrc: "/assets/imgs/categories/5.png",
    title: "Oil & Gas and Petroleum",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing ",
    link: "/pages/courses.html",
  },
  {
    imgSrc: "/assets/imgs/categories/6.png",
    title: "Healthcare Management",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing ",
    link: "/pages/courses.html",
  },
  {
    imgSrc: "/assets/imgs/categories/6.png",
    title: "Project Management",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing ",
    link: "/pages/courses.html",
  },
  {
    imgSrc: "/assets/imgs/categories/1.png",
    title: "Sales And Marketing",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing ",
    link: "/pages/courses.html",
  },
  {
    imgSrc: "/assets/imgs/categories/2.png",
    title: "Quality and Productivity",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing ",
    link: "/pages/courses.html",
  },
  {
    imgSrc: "/assets/imgs/categories/3.png",
    title: "Leadership",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing ",
    link: "/pages/courses.html",
  },
];
categories.map((item) => {
  document.querySelector(".categories-cards").innerHTML += `
            <a class="category-card" href='${item.link}' >
                <img src="${item.imgSrc}" alt="${item.title}">
                <div class="card-overlay">
                    <h3>${item.title}</h3>
                    <p>${item.description}</p>
                    <span class="line-card"></span>
                    <span href='${item.link}' class="category-card-arrow"><img src="/assets/icons/arrow.svg" alt=""></span>
                </div>
            </a>
  `;
});
