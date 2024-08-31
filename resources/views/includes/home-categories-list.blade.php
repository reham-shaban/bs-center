{{-- Categories --}}
<section class="search-courses categories-home categories">
    <div class="container">
        <div class="section-title">
            <h2>Categories</h2>
            <div class="arrows">
                <div class="swiper-button-prev arrow-btn"></div>
                <div class="swiper-button-next arrow-btn"></div>
            </div>
        </div>
    </div>
    <div class="swiper mySwiper2">
        <div class="swiper-wrapper my-wrap" id="category-data" data-categories="{{ $categories }}">
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const categoryData = JSON.parse(document.getElementById('category-data').dataset.categories);

        const cardContainer2 = document.querySelector(".my-wrap");
        categoryData.forEach((data) => {
            const card = document.createElement("div");
            card.classList.add("swiper-slide");
            card.innerHTML = `
                <div class="category-card" onclick=(changePage(${data.slug}))>
                    <img src="${data.image_url}" alt="${data.title}">
                    <div class="card-overlay">
                        <h3>${data.title}</h3>
                        <p>${data.description}</p>
                        <span class="line-card"></span>
                        <a href='/courses/${data.slug}' class="category-card-arrow"><img src="/assets/icons/arrow.svg" alt=""></a>
                    </div>
                </div>
            `;

            cardContainer2?.appendChild(card);
        });
    });
</script>
