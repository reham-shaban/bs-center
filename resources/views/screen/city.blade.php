@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }}
@endsection

@section('content')
<div class="breadcrumb-bar">
    <div class="about-header container">
      <ul>
        <li>
          <a href="{{ route('cities.index') }}">Venus</a>
        </li>
        <img src="/assets/icons/arrow.svg" alt="" />
        <li>Training Courses in {{ $city->title }}</li>
      </ul>
    </div>
</div>
<section class="hero-single-course">
    <img src="/assets/imgs/bg-city.webp" alt="" />
    <div class="course-hero-title">
      <div>
        <h1>Training courses in {{ $city->title }}</h1>
        <p>select categories in {{ $city->title }}</p>
      </div>
    </div>
</section>

<section class="categories-section">
    <div class="container">
      <div class="section-title">
        <h2>Categories</h2>
        <p>select categories in {{ $city->title }}</p>
      </div>
      <div class="categories-cards"></div>
    </div>
</section>

<section>
    <div class="section-title container">
      <h2>All courses in {{ $city->title }}</h2>
    </div>
    <div class="courses-section container city">
      <div class="courses-section-head">
        <p>Courses Specializes in {{ $city->title }}</p>
        <div class="search-area">
          <input
            type="text"
            class="search-area-input"
            placeholder="Search for courses"
          />
          <img src="/assets/icons/search.svg" />
        </div>
      </div>
      <div class="courses-items"></div>
    </div>
</section>
@endsection

@section('scripts')
<script>
// get categories
    document.addEventListener("DOMContentLoaded", function() {
        const slug = "{{ $city->slug }}";
        const url = `/categories/${slug}`;

        fetch(url)
                .then(response => response.json())
                .then(data => {

                    const container = document.querySelector(".categories-cards");
                    container.innerHTML = ''; // Clear the container before adding new data

                    data.forEach(item => {
                        container.innerHTML += `
                            <a class="category-card" href='/courses/${item.slug}'>
                            <img src="${item.media_url}" alt="${item.image_alt}">
                            <div class="card-overlay">
                                <h3>${item.title}</h3>
                                <p>${item.description}</p>
                                <span class="line-card"></span>
                                <span class="category-card-arrow"><img src="/assets/icons/arrow.svg" alt=""></span>
                            </div>
                        </a>
                        `;
                    });
                })
                .catch(error => console.error('Error fetching Couses:', error));
    });

// get courses
    document.addEventListener("DOMContentLoaded", function() {
        const slug = "{{ $city->slug }}";
        const url = `/get-courses/${slug}`;

        fetch(url)
                .then(response => response.json())
                .then(data => {

                    const container = document.querySelector(".courses-items");
                    container.innerHTML = ''; // Clear the container before adding new data

                    data.forEach(item => {
                        container.innerHTML += `
                            <a class="course-item" href='/course/${item.slug}'>
                            <p>${item.title}</p>
                            <span href='/course/${item.slug}'>
                                <img src="/assets/icons/arrow.svg" alt="" />
                            </span>
                            </a>
                        `;
                    });
                })
                .catch(error => console.error('Error fetching Couses:', error));
    });

</script>
@endsection
