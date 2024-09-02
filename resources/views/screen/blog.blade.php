@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }} | Blogs
@endsection

@section('content')
<div class="breadcrumb-bar">
    <div class="about-header container">
      <ul>
        <li><a href="./blogs.html">Blogs</a></li>
        <img src="{{ asset('assets/icons/arrow.svg') }}" />
        <li>lorem ipsum dolor sit amet, consectetur</li>
      </ul>
    </div>
</div>

<section class="hero-single-blog">
    <img src="{{ asset('assets/imgs/bg-blog.webp') }}" alt="" />
</section>

<section class="blog-details">
    <div class="container">
      <div class="blog-details-title">
        <h3>
          Why ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempos Lorem ipsum dolor sitamet?
        </h3>
        <div class="date">
          <img src="{{ asset('assets/icons/calender.svg') }}" alt="" />
          <span>2024-11-04</span>
        </div>
      </div>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
        eiusmod tempos Lorem ipsum dolor sitamet, consectetur adipiscing elit,
        sed do eiusmod temporLorem ipsum dolor sit amet, consectetur
        adipiscing elit, sed do
      </p>
      <div class="blog-question">
        <h4>Why ipsum dolor sit amet, consectetur adipiscing s ?</h4>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempos Lorem ipsum dolor sitamet, consectetur adipiscing
          elit, sed do eiusmod temporLorem ipsum dolor sit amet, consectetur
          adipiscing elit, sed do Lorem ipsum dolor sit amet, consectetur
          adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet,
          consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor
          sit amet, consectetur adipiscing elit, sed do
        </p>
      </div>
      <div class="blog-question">
        <h4>Why ipsum dolor sit amet, consectetur adipiscing s ?</h4>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempos Lorem ipsum dolor sitamet, consectetur adipiscing
          elit, sed do eiusmod temporLorem ipsum dolor sit amet, consectetur
          adipiscing elit, sed do
        </p>
      </div>
      <div class="blog-question">
        <h4>Why ipsum dolor sit amet, consectetur adipiscing s ?</h4>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempos Lorem ipsum dolor sitamet, consectetur adipiscing
          elit, sed do eiusmod temporLorem ipsum dolor sit amet, consectetur
          adipiscing elit, sed do
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempos Lorem ipsum dolor sitamet, consectetur adipiscing
          elit, sed do eiusmod temporLorem ipsum dolor sit amet, consectetur
          adipiscing elit, sed do Lorem ipsum dolor sit amet, consectetur
          adipiscing elit, sed do eiusmod tempos Lorem ipsum dolor sitamet,
          consectetur adipiscing elit, sed do eiusmod temporLorem ipsum dolor
          sit amet, consectetur adipiscing elit, sed do
        </p>
      </div>
    </div>
</section>
<section class="blog-cards container">
    <div class="blog-card-title">
      <h2>Related Blog</h2>
      <a href="blogs.html">see all</a>
    </div>
    <div class="card-container-blog container"></div>
</section>
@endsection
