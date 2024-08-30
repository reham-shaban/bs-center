{{-- Search Results --}}

@if(request()->hasAny(['course_title', 'category_title', 'city_title', 'month', 'duration']))

        <section class="search-courses home-courses">
            <div class="container">
                <h2>Search Results</h2>
                @if(isset($courses) && $courses->isNotEmpty())
                <div class="search-card-container" id="search-data" data-search="{{ $courses }}">
                </div>
                @else
                    No courses found.
                @endif
            </div>
        </section>

@endif

{{-- Java Script --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const coursesData = document.getElementById('search-data').getAttribute('data-search');
    const courses = JSON.parse(coursesData);

    const cardContainer = document.querySelector(".search-card-container");

    courses.forEach((course) => {
          const card = document.createElement("a");
          card.href = `/courses/${course.slug}`; // Dynamic link to the course detail page
          card.classList.add("card");

          card.innerHTML = `
              <img src="${course.image_url}" alt="${course.title}">
              <div class="card-content">
                  <div class="card-title">${course.title}</div>
                  <div class="card-dates">
                    <img src="/assets/icons/calender2.svg" alt="" />
                    <span>${course.timings[0].date_from} to ${course.timings[0].date_to} ${new Date(course.timings[0].date_from).getFullYear()}</span>
                  </div>
                <div class="card-location">
                  <img src="/assets/icons/location.svg" alt="" class="location-icon"  />
                <span>${course.timings[0].city.name}</span></div>
                  <div class="card-buttons">
                      <a href='/courses/${course.slug}/register' class="btn-primary">Register Now</a>
                      <a href="/courses/${course.slug}" class="btn-secondary">Learn more</a>
                  </div>
              </div>
          `;

          cardContainer?.appendChild(card);
        });
});
</script>
