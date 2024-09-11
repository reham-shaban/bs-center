@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }} | Blogs
@endsection

@section('content')
<div class="breadcrumb-bar">
    <div class="about-header container">
      <ul>
        <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
        <img src="{{ asset('assets/icons/arrow.svg') }}" />
        <li>{{ $blog->slug }}</li>
      </ul>
    </div>
</div>

<section class="hero-single-blog">
    <img src="{{ asset('assets/imgs/bg-blog.webp') }}" alt="{{ $blog->image_alt }}" />
</section>

<section class="blog-details">
    <div class="container">
      <div class="blog-details-title">
        <h3>
            {{ $blog->h1 }}
        </h3>
        <div class="date">
          <img src="{{ asset('assets/icons/calender.svg') }}" alt="" />
          <span>{{ $blog->created_at }}</span>
        </div>
      </div>
      <p>
        {{ $blog->description }}
      </p>
    </div>
</section>

<section class="blog-cards container">
    <div class="blog-card-title">
      <h2>Related Blog</h2>
      <a href="{{ route('blogs.index') }}">see all</a>
    </div>
    <div class="card-container-blog container"></div>
</section>
@endsection
