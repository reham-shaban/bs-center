document.addEventListener("DOMContentLoaded", function () {
  const customSelectWrappers = document.querySelectorAll(
    ".custom-select-wrapper"
  );
  console.log(customSelectWrappers);
  customSelectWrappers.forEach((wrapper) => {
    const customSelect = wrapper.querySelector(".custom-select");
    const customSelectTrigger = customSelect.querySelector(
      ".custom-select-trigger"
    );
    const customOptions = customSelect.querySelector(".custom-options");
    const options = customOptions.querySelectorAll(".custom-option");

    customSelectTrigger.addEventListener("click", function () {
      const customSelect = customSelectTrigger.closest(".custom-select");
      document.querySelectorAll(".custom-select").forEach((el) => {
        if (el !== customSelect) {
          el.classList.remove("open");
        }
      });
      customSelect.classList.toggle("open");
    });

    options.forEach((option) => {
      option.addEventListener("click", function () {
        customSelectTrigger.querySelector("span").textContent =
          this.textContent;
        customSelect.classList.remove("open");
      });
    });
  });

  document.addEventListener("click", function (e) {
    const isClickInside = Array.from(customSelectWrappers).some((wrapper) =>
      wrapper.contains(e.target)
    );
    if (!isClickInside) {
      customSelectWrappers.forEach((wrapper) => {
        wrapper.querySelector(".custom-select").classList.remove("open");
      });
    }
  });
});

// document.addEventListener("DOMContentLoaded", function () {
//   const cardData = [
//     {
//       imgSrc: "/assets/imgs/course-img.png",
//       title: "Strategic planning in healthcare organizations",
//       startDate: "10 Sep",
//       endDate: "20 Sep",
//       location: "Istanbul",
//       year: "2024",
//     },
//     {
//       imgSrc: "/assets/imgs/course-img.png",
//       title: "Strategic planning in healthcare organizations",
//       startDate: "10 Sep",
//       endDate: "20 Sep",
//       location: "Istanbul",
//       year: "2024",
//     },
//     {
//       imgSrc: "/assets/imgs/course-img.png",
//       title: "Strategic planning in healthcare organizations",
//       startDate: "10 Sep",
//       endDate: "20 Sep",
//       location: "Istanbul",
//       year: "2024",
//     },
//     {
//       imgSrc: "/assets/imgs/course-img.png",
//       title: "Strategic planning in healthcare organizations",
//       startDate: "10 Sep",
//       endDate: "20 Sep",
//       location: "Istanbul",
//       year: "2024",
//     },
//     {
//       imgSrc: "/assets/imgs/course-img.png",
//       title: "Strategic planning in healthcare organizations",
//       startDate: "10 Sep",
//       endDate: "20 Sep",
//       location: "Istanbul",
//       year: "2024",
//     },
//     {
//       imgSrc: "/assets/imgs/course-img.png",
//       title: "Strategic planning in healthcare organizations",
//       startDate: "10 Sep",
//       endDate: "20 Sep",
//       location: "Istanbul",
//       year: "2024",
//     },
//     {
//       imgSrc: "/assets/imgs/course-img.png",
//       title: "Strategic planning in healthcare organizations",
//       startDate: "10 Sep",
//       endDate: "20 Sep",
//       location: "Istanbul",
//       year: "2024",
//     },
//     {
//       imgSrc: "/assets/imgs/course-img.png",
//       title: "Strategic planning in healthcare organizations",
//       startDate: "10 Sep",
//       endDate: "20 Sep",
//       location: "Istanbul",
//       year: "2024",
//     },
//   ];

//   const cardContainer = document.querySelector(".card-container");

//   cardData.forEach((data) => {
//     const card = document.createElement("a");
//     card.href = "/pages/course.html";
//     card.classList.add("card");

//     card.innerHTML = `
//             <img src="${data.imgSrc}" alt="${data.title}">
//             <div class="card-content">
//                 <div class="card-title">${data.title}</div>
//                 <div class="card-dates">
//                   <img src="/assets/icons/calender2.svg" alt="" />
//                   <span>${data.startDate} to ${data.endDate} ${data.year}</span>
//                 </div>
//               <div class="card-location">
//                 <img src="/assets/icons/location.svg" alt="" class="location-icon"  />
//               <span>${data.location}</span></div>
//                 <div class="card-buttons">
//                     <a href='./pages/requestInHouse.html' class="btn-primary">Register Now</a>
//                     <a href="./pages/course.html" class="btn-secondary">Learn more</a>
//                 </div>
//             </div>
//         `;

//     cardContainer?.appendChild(card);
//   });
// });

document.addEventListener("DOMContentLoaded", function () {
  const cardData = [
    {
      imgSrc: "/assets/imgs/categories/1.png",
      title: "Sales and Marketing",
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

  const cardContainer2 = document.querySelector(".wrap");
  cardData.forEach((data) => {
    const card = document.createElement("div");
    card.classList.add("swiper-slide");
    card.innerHTML = `
            <div class="category-card" onclick=(changePage())>
                <img src="${data.imgSrc}" alt="${data.title}">
                <div class="card-overlay">
                    <h3>${data.title}</h3>
                    <p>${data.description}</p>
                    <span class="line-card"></span>
                    <a href='${data.link}' class="category-card-arrow"><img src="./assets/icons/arrow.svg" alt=""></a>
                </div>
            </div>
        `;

    cardContainer2?.appendChild(card);
  });
});
function changePage() {
  window.location.href = "/pages/courses.html";
}

document.addEventListener("DOMContentLoaded", function () {
  const faqData = [
    {
      question: "What courses are available?",
      answer:
        "We offer a variety of courses including web development, data science, and digital marketing.",
    },
    {
      question: "How can I enroll in a course?",
      answer:
        "You can enroll in a course by visiting our website, selecting the course you are interested in, and clicking the enroll button.",
    },
    {
      question: "What is the duration of the courses?",
      answer:
        "Course durations vary. Most courses range from 4 weeks to 12 weeks.",
    },
    {
      question: "Are there any prerequisites?",
      answer:
        "Some courses have prerequisites, which are listed on the course description page.",
    },
    {
      question: "Do you offer certification?",
      answer:
        "Yes, we offer certificates upon successful completion of our courses.",
    },
    {
      question: "Can I get a refund if I am not satisfied?",
      answer:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet, consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor ",
    },
  ];

  const faqContainer = document.querySelector(".faq-container");

  faqData.forEach((data) => {
    const faqItem = document.createElement("div");
    faqItem.classList.add("faq-item");

    faqItem.innerHTML = `
            <div class="faq-question">
                <span class="green-circle"></span>${data.question}
                <span class="faq-toggle">
                <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.70312 9.54688L1.32812 3.17188C0.859375 2.70312 0.859375 2 1.32812 1.57812L2.35938 0.5C2.82812 0.078125 3.53125 0.078125 3.95312 0.5L8.45312 5.04688L13 0.5C13.4219 0.078125 14.125 0.078125 14.5938 0.5L15.625 1.57812C16.0938 2 16.0938 2.70312 15.625 3.17188L9.25 9.54688C8.82812 9.96875 8.125 9.96875 7.70312 9.54688Z" fill="#696984"/>
                </svg>
                </span>
            </div>
            <div class="faq-answer">${data.answer}</div>
        `;

    faqContainer?.appendChild(faqItem);

    const questionElement = faqItem.querySelector(".faq-question");
    questionElement.addEventListener("click", function () {
      document.querySelectorAll(".faq-item").forEach((el) => {
        if (el !== faqItem && el.classList.contains("open")) {
          el.classList.remove("open");
        }
      });
      faqItem.classList.toggle("open");
    });
  });
});
window.addEventListener("scroll", function () {
  const imageContainer = document.getElementsByClassName("whats-app");
  const heroSection = document.querySelector("#hero1");
  const heroHeight = heroSection?.offsetHeight;
  if (window.scrollY >= heroHeight) {
    imageContainer[0]?.classList.add("fixed");
  } else {
    imageContainer[0]?.classList.remove("fixed");
  }
});
