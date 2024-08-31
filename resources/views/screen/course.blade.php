@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }} | Course
@endsection

@section('content')
<div class="breadcrumb-bar">
    <div class="about-header container">
      <ul>
        <li><a href="/Categories.html">Categories</a></li>
        <img src="/assets/icons/arrow.svg" alt="" />
        <li><a href="/courses.html">Courses</a></li>
        <img src="/assets/icons/arrow.svg" alt="" />
        <li>{{ $course->title }}</li>
      </ul>
    </div>
</div>

<section class="hero-single-course">
    <img src="/assets/imgs/bg-blog.webp" alt="" />
    <div class="course-hero-title">
      <div>
        <h1>{{ $course->h1 }}</h1>
        <p>{{ $course->title }}</p>
      </div>
    </div>
</section>

<section class="course-table container">
    <div class="flex-between">
      <div class="popup-bg" onclick="hidePopup()"></div>
      <div id="popup-3" class="form-popup popup">
        <form>
          <div>
            <div class="form-title">
              <h2>Download Brochure</h2>
            </div>
            <div class="form-inputs">
              <div class="input-container">
                <label for="name">Full Name</label>
                <input
                  type="text"
                  placeholder="Full Name"
                  id="name"
                  name="name"
                />
              </div>
              <div class="input-container">
                <label for="number">Phone number</label>
                <div class="select-box" id="select-box-1">
                  <div class="selected-option">
                    <div>
                      <span class="callcode"></span>
                    </div>
                    <input
                      type="tel"
                      name="tel"
                      id="tel"
                      class="tel"
                      placeholder="Phone Number"
                    />
                  </div>
                  <div class="options" id="options-1">
                    <input
                      type="text"
                      class="search-box"
                      placeholder="Search Country Name"
                    />
                    <ol></ol>
                  </div>
                </div>
              </div>
              <div class="input-container">
                <label for="email">Email</label>
                <input
                  type="email"
                  placeholder="hello@creative-tim.com"
                  name="position"
                  id="position"
                />
              </div>
              <div class="input-container">
                <label for="company">Company</label>
                <input
                  type="text"
                  placeholder="Company"
                  id="company"
                  name="company"
                />
              </div>
            </div>
          </div>
          <div class="form-actions">
            <button>Send</button>
            <div class="g-recaptcha" data-sitekey="your_site_key"></div>
          </div>
        </form>
      </div>
      <div class="course-buttons">
        <button class="btn-primary" type="button">
          <a href="./requestInHouse.html">Request In House</a>
        </button>
        <button class="btn-primary" type="button">
          <a href="./requestOnline.html">Request Online</a>
        </button>
      </div>
    </div>
    <div class="table-container" data-slug="{{ $course->slug }}">
      <table id="row-table">
        <tr>
          <th>City</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Price</th>
          <th>Register</th>
          <th>Enquire</th>
          <th>Download & Print</th>
        </tr>
      </table>
    </div>
    <button class="btn-primary see-more-btn">See more</button>
</section>

<section class="container">
    <div class="course-content">
      <h3>Overview</h3>
      <ul class="group-1">
        {{ $course->overview }}
      </ul>
    </div>
    <div class="course-content">
      <h3>Objective</h3>
      <ul>
        {{ $course->objectives }}
      </ul>
    </div>
    <span
      style="
        display: block;
        width: 89%;
        margin: auto;
        height: 1px;
        background-color: #d9d9d9;
      "
    ></span>
</section>

<section class="search-courses">
    <div class="container">
      <div class="course-card-title">
        <h2>Related Courses</h2>
        <a href="courses.html">see all</a>
      </div>
      <div class="courses-container"></div>
    </div>
</section>
@endsection

@section('scripts')
<!--recaptcha library  -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  function onSubmit(token) {
    document.getElementById("demo-form").submit();
  }
</script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<script
  src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
  async
  defer
></script>
<script>
      const courses = [
        {
          imgSrc: "/assets/imgs/course-img.png",
          title: "Strategic planning in healthcare organizations",
          startDate: "10 Sep",
          endDate: "20 Sep",
          location: "Istanbul",
          year: "2024",
        },
        {
          imgSrc: "/assets/imgs/course-img.png",
          title: "Strategic planning in healthcare organizations",
          startDate: "10 Sep",
          endDate: "20 Sep",
          location: "Istanbul",
          year: "2024",
        },
        {
          imgSrc: "/assets/imgs/course-img.png",
          title: "Strategic planning in healthcare organizations",
          startDate: "10 Sep",
          endDate: "20 Sep",
          location: "Istanbul",
          year: "2024",
        },
        {
          imgSrc: "/assets/imgs/course-img.png",
          title: "Strategic planning in healthcare organizations",
          startDate: "10 Sep",
          endDate: "20 Sep",
          location: "Istanbul",
          year: "2024",
        },
      ];
      courses.map((data) => {
        document.querySelector(".courses-container").innerHTML += `
            <div class="card">
            <img src="${data.imgSrc}" alt="${data.title}">
                <div class="card-title">${data.title}</div>
                <div class="card-dates">
                  <img src="/assets/icons/calender2.svg" alt="" />
                  <span>${data.startDate} to ${data.endDate} ${data.year}</span>
                </div>
                <div class="card-location">
                <img src="/assets/icons/location.svg" alt="" class="location-icon"  />
                <span>${data.location}</span>
                </div>
                <div class="card-buttons">
                    <a href='/requestInHouse.html' class="btn-primary">Register Now</a>
                    <a href="/course.html" class="btn-secondary">Learn more</a>
                </div>
            </div>
        `;
      });
</script>
@endsection
