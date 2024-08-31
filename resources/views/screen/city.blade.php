@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }}
@endsection

@section('content')
<div class="breadcrumb-bar">
    <div class="about-header container">
      <ul>
        <li>
          <a href="./venus.html">Venus</a>
        </li>
        <img src="/assets/icons/arrow.svg" alt="" />
        <li>Training Courses in Dubai</li>
      </ul>
    </div>
</div>
<section class="hero-single-course">
    <img src="/assets/imgs/bg-city.webp" alt="" />
    <div class="course-hero-title">
      <div>
        <h1>Training courses in Dubai</h1>
        <p>select categories in Dubai</p>
      </div>
    </div>
</section>
<section class="categories-section">
    <div class="container">
      <div class="section-title">
        <h2>Categories</h2>
        <p>select categories in Dubai</p>
      </div>
      <div class="categories-cards"></div>
    </div>
</section>
<section>
    <div class="section-title container">
      <h2>All courses in Dubai</h2>
    </div>
    <div class="courses-section container city">
      <div class="courses-section-head">
        <p>Courses Specializes in Healthcare Management</p>
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
