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
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
    </div>
</div>

<section class="blogs-container container blogs-page">
    <swiper-container class="mySwiper swiper-cards" init="false">
        @foreach($blogs->chunk(4) as $blogChunk)
            <swiper-slide class="swiper-slide">
                @foreach($blogChunk as $blog)
                    <div class="card-blogs">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->image_alt }}" class="card-blog-img">
                        <div class="card-blog-content">
                            <h3>{{ $blog->title }}</h3>
                            <div class="card-blog-desc">
                                @if(strlen($blog->description) > 125)
                                    <p>{{ Str::limit($blog->description, 125) }}</p>
                                    <a href="">more</a>
                                @else
                                    <p>{{ $blog->description }}</p>
                                @endif
                            </div>
                            <div class="card-blog-footer">
                                <button><a href="">Read more</a></button>
                                <div class="card-blog-views">
                                    <img src="{{ asset('assets/icons/view.svg') }}" alt="Views">
                                    <span>{{ $blog->viewNum ?? 0 }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </swiper-slide>
        @endforeach
    </swiper-container>
    <div class="blogs-arrows">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>
@endsection
