@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }} | Categories
@endsection

@section('content')
<div class="breadcrumb-bar">
    <div class="about-header container">
      <ul>
        <li><a class="main-li" href="/index.html">Categories</a></li>
        <img src="/assets/icons/arrow.svg" />
      </ul>
    </div>
</div>

{{-- Search --}}
<div class="hero-container hero-categories">
    <div class="container">
      <div>
        <h1>All Categories</h1>
        <p>Lorem ipsum dolor sit amet, consectetur</p>
      </div>
      @include('includes.search-form', ['searchRoute' => route('categories.index')])
    </div>
</div>

{{-- Search Results --}}
@include('includes.search-results', ['timings' => $timings])

{{-- Categores list --}}
<section class="categories-section">
      <div class="container">
          <div class="categories-cards" id="category-data" data-categories='@json($categories)'></div>
      </div>
</section>
@endsection
