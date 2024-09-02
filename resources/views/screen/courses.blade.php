@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }} | Courses
@endsection

@section('content')
<div class="breadcrumb-bar">
    <div class="about-header container">
      <ul>
        <li><a href="{{ route('categories.index') }}">Categories</a></li>
        <img src="{{ asset('assets/icons/arrow.svg') }}" alt="" />
        <li>{{ $category->title }}</li>
      </ul>
    </div>
</div>
<div class="hero-container hero-courses">
    <div class="container">
        <h1>{{ $category->title }}</h1>
        {{ $category->description }}
    </div>
</div>

<div class="courses-section container">
    <div class="courses-section-head">
      <p>Courses Specializes in {{ $category->title }}</p>
      <div class="search-area">
        <input
          type="text"
          class="search-area-input"
          placeholder="Search for courses"
        />
        <img src="{{ asset('assets/icons/search.svg') }}" />
      </div>
    </div>
    <div class="courses-items"></div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slug = "{{ $category->slug }}";
        const url = `/categories/${slug}/courses`;
        console.log("in scripte -------------")
        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log("in scripte -------------")
                console.log("in scripte -------------")
                console.log(data)
                const container = document.querySelector(".courses-items");
                container.innerHTML = ''; // Clear the container before adding new data

                data.courses.forEach(item => {
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

