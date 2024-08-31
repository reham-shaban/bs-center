@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }} | Courses
@endsection

@section('content')
<div class="breadcrumb-bar">
    <div class="about-header container">
      <ul>
        <li><a href="/pages/categories.html">Categories</a></li>
        <img src="/assets/icons/arrow.svg" alt="" />
        <li>Healthcare Management</li>
      </ul>
    </div>
</div>
<div class="hero-container hero-courses">
    <div class="container">
      <div>
        <h1>Healthcare Management</h1>
        <p>Healthcare Management</p>
      </div>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
        eiusmod tempos
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
        eiusmod tempos
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
        eiusmod tempos
      </p>
    </div>
</div>

<div class="courses-section container">
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
@endsection
