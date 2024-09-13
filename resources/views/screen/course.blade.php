@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }} | Course
@endsection

@section('content')
<div class="breadcrumb-bar">
    <div class="about-header container">
      <ul>
        <li><a href="{{ route('categories.index') }}">Categories</a></li>
        <img src="{{ asset('assets/icons/arrow.svg') }}" alt="" />
        <li>
            @if($course->category && $course->category->slug)
                <a href="{{ route('courses.index', ['slug' => $course->category->slug]) }}">Courses</a>
            @else
            <a href="#">Courses</a>
            @endif
        </li>
        <img src="{{ asset('assets/icons/arrow.svg') }}" alt="" />
        <li>{{ $course->title }}</li>
      </ul>
    </div>
</div>

<section class="hero-single-course">
    @if ( $course->image )
    <img src="{{ $course->image }}" alt="" />
    @else
    <img src="{{ asset('assets/imgs/bg-blog.webp') }}" alt="" />
    @endif
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
        <form action="{{ route('download.store') }}" method="POST">
        @csrf
          <input type="hidden" name="course_id" value="{{ $course->id }}">
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
                      name="phone"
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
                  name="email"
                  id="position"
                />
              </div>
              <div class="input-container">
                <label for="company">Company</label>
                <input
                  type="text"
                  placeholder="Company"
                  id="company"
                  name="company_name"
                />
              </div>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit">Send</button>
            <div class="g-recaptcha" data-sitekey="your_site_key"></div>
          </div>
        </form>
      </div>
      <div class="course-buttons">
        <button class="btn-primary" type="button">
          <a href="{{ route('request-in-house.index', ['slug' => $course->slug]) }}">Request In House</a>
        </button>
        <button class="btn-primary" type="button">
          <a href="{{ route('request-online.index', ['slug' => $course->slug]) }}">Request Online</a>
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
        @if($course->category && $course->category->slug)
        <a href="{{ route('courses.index', ['slug' => $course->category->slug]) }}">see all</a>
        @else
        <a href="#">see all</a>
        @endif
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
    document.addEventListener('DOMContentLoaded', () => {
        const slug = @json($course->slug);
        const url = `/${slug}/related-timings`;
        console.log("in scripte -------------")
        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log("in scripte -------------")
                console.log("in scripte -------------")
                console.log(data)
                const container = document.querySelector(".courses-container");
                container.innerHTML = ''; // Clear the container before adding new data

                data.timings.forEach(item => {
                    container.innerHTML += `
                        <div class="card">
                            <img src="${item.course_image}" alt="${item.image_alt}">
                            <div class="card-title">${item.course_title}</div>
                            <div class="card-dates">
                                <img src="/assets/icons/calender2.svg" alt="" />
                                <span>${item.date_from} to ${item.date_to}</span>
                            </div>
                            <div class="card-location">
                                <img src="/assets/icons/location.svg" alt="" class="location-icon" />
                                <span>${item.city_title}</span>
                            </div>
                            <div class="card-buttons">
                                <a href='/request-in-house' class="btn-primary">Register Now</a>
                                <a href="/course/${item.course_slug}" class="btn-secondary">Learn more</a>
                            </div>
                        </div>
                    `;
                });
            })
            .catch(error => console.error('Error fetching related timings:', error));
    });
</script>

@endsection
