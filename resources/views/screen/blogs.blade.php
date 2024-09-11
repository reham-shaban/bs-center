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
        </ul>
    </div>
</div>

<div class="hero-container hero-blogs">
    <div class="container">
        <h1>Explore Our Blogs</h1>
    </div>
</div>

<section class="blogs-container container blogs-page">
    <swiper-container class="mySwiper swiper-cards" init="false">
      <!-- Swiper slides will be added dynamically -->
      <div class="card-blogs"></div>
    </swiper-container>
    <div class="blogs-arrows">
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
</section>

@endsection
