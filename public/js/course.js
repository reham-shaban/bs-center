document.addEventListener("DOMContentLoaded", function () {
  const tableData = [
    {
      city: "London",
      startDate: "19 Jun 2023",
      endDate: "29 Jun 2023",
      price: "$4,500",
    },
    {
      city: "London",
      startDate: "19 Jun 2023",
      endDate: "29 Jun 2023",
      price: "$4,500",
    },
    {
      city: "London",
      startDate: "19 Jun 2023",
      endDate: "29 Jun 2023",
      price: "$4,500",
    },
  ];

  const table = document.getElementById("row-table");

  tableData.forEach((item) => {
    const row = table.insertRow();
    row.insertCell().textContent = item.city;
    row.insertCell().textContent = item.startDate;
    row.insertCell().textContent = item.endDate;
    row.insertCell().textContent = item.price;

    // Create and add the Register button
    const registerBtn = document.createElement("a");
    registerBtn.textContent = "Register";
    registerBtn.href = "/pages/registration.html";
    registerBtn.classList.add("table-btn");
    row.insertCell().appendChild(registerBtn);

    // Create and add the Enquire button
    const enquireBtn = document.createElement("a");
    enquireBtn.textContent = "Enquire";
    enquireBtn.href = "/pages/enquireNow.html";
    enquireBtn.classList.add("table-btn");
    row.insertCell().appendChild(enquireBtn);

    const tableBtn = document.createElement("a");
    tableBtn.textContent = "Download/Print";
    tableBtn.style.cursor = "pointer";
    tableBtn.classList.add("table-btn");
    tableBtn.addEventListener("click", showPopup);
    const registerImg = document.createElement("img");
    registerImg.src = "/assets/icons/download.svg";
    registerImg.className = "downloadIcon";
    tableBtn.appendChild(registerImg);
    row.insertCell().appendChild(tableBtn);
  });
});

function showPopup() {
  document.querySelector(".popup").style.display = "block";
  document.querySelector(".popup-bg").style.display = "block";
}
function hidePopup() {
  document.querySelector(".popup").style.display = "none";
  document.querySelector(".popup-bg").style.display = "none";
}
window.addEventListener("click", function (event) {
  if (event.target === document.querySelector(".popup-bg")) {
    hidePopup();
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const data = [
    {
      imgSrc: "../assets/imgs/card-blog.png",
      title: "Strategic planning in healthcare organizations",
      startDate: "2024-07-01",
      endDate: "2024-07-10",
      location: "Istanbul",
    },
    {
      imgSrc: "../assets/imgs/card-blog.png",
      title: "Strategic planning in healthcare organizations",
      startDate: "2024-07-01",
      endDate: "2024-07-10",
      location: "Istanbul",
    },
    {
      imgSrc: "../assets/imgs/card-blog.png",
      title: "Strategic planning in healthcare organizations",
      startDate: "2024-07-01",
      endDate: "2024-07-10",
      location: "Istanbul",
    },
    {
      imgSrc: "../assets/imgs/card-blog.png",
      title: "Strategic planning in healthcare organizations",
      startDate: "2024-07-01",
      endDate: "2024-07-10",
      location: "Istanbul",
    },
  ];

  const cardContainer = document.querySelector(".card-container-courses");

  data.forEach((data) => {
    const card = document.createElement("a");
    card.href = "/pages/course.html";
    card.classList.add("card");

    card.innerHTML = `
            <img src="${data.imgSrc}" alt="${data.title}">
            <div class="card-content">
                <div class="card-title">${data.title}</div>
                <div class="card-dates">
                  <img src="/assets/icons/calender2.svg" alt="" />
                  <span>${data.startDate} To ${data.endDate}</span>
                </div>
                <div class="card-location">
                  <img src="/assets/icons/location.svg" alt="" class="location-icon"  />
                  <span>${data.location}</span></div>
                </div>
                <div class="card-buttons">
                    <a href='/pages/registration.html' class="btn-primary">Register Now</a>
                    <a href="course.html" class="btn-secondary">Learn more</a>
                </div>
            </div>
        `;

    cardContainer.appendChild(card);
  });
});
