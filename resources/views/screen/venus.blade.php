@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }} | Venus
@endsection

@section('content')
<div class="breadcrumb-bar">
    <div class="about-header container">
      <ul>
        <li><a href="./venus.html">Venus</a></li>
        <img src="../assets/icons/arrow.svg" />
        <li>lorem ipsum dolor sit amet, consectetur</li>
      </ul>
    </div>
</div>

{{-- Search Section --}}
<div class="hero-container hero-venus">
    <div class="container">
      <div>
        <h1>Explore Our Venue</h1>
        <p>lorem ipsum dolor sit amet, consectetur</p>
      </div>
      @include('includes.search-form', ['searchRoute' => route('cities.index')])
    </div>
</div>

{{-- Search Results --}}
@include('includes.search-results', ['timings' => $timings])

{{-- Venus List --}}
<section>
      <div class="container">
      <div class="venus-cards-container">
          @foreach($cities as $city)
          <a class="venus-card" href="">
              <img src="{{ $city->getFirstMediaUrl('images') }}" alt="{{ $city->image_alt }}" class="card-img" />
              <div>
              <span href="">
                  <img src="/assets/icons/arrow.svg" alt="" />
              </span>
              <h3>{{ $city->title }}</h3>
              </div>
          </a>
          @endforeach
      </div>
      </div>
</section>
@endsection
