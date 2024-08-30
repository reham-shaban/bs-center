@extends('layouts.app')

@section('content')

{{-- Banner courses --}}
@include('includes.isbanner')

{{-- Search --}}
<section class="search-section home-search-section">
    <div class="container">
        <h2>Search For Your Course</h2>
        <div class="home-search">
            @include('includes.search-form', ['searchRoute' => route('home.index')])
        </div>
    </div>
</section>

{{-- Search Results --}}
@include('includes.search-results', ['timings' => $timings])


{{-- Upcoming courses --}}
<section class="search-courses home-courses">
    <div class="container">
        <h2>Upcoming Courses</h2>
        <div class="card-container"></div>
    </div>
</section>

{{-- About us --}}
<section class="search-courses about-us">
    <div class="container">
        <div class="about">
            <div class="about-left">
                <h2>About <strong>BSC</strong> Project</h2>
                <p>At BSC, we believe in the power of education to unlock human potential. Our team of passionate
                    educators and industry experts have curated a diverse
                    range of courses tailored to empower learners at every stage</p>
                <a href="./pages/about.html">Learn more</a>
            </div>
            <div class="about-right">
                <div class="part-about">
                    <div>
                        <img src="./assets/imgs/about/icon1.svg" alt="">
                    </div>
                    <p>Certification
                        of completion</p>
                </div>
                <div class="part-about">
                    <div>
                        <img src="./assets/imgs/about/icon2.svg" alt="">
                    </div>
                    <p>Money Back
                        Guarantee</p>
                </div>
                <div class="part-about">
                    <div>
                        <img src="./assets/imgs/about/icon3.svg" alt="">
                    </div>
                    <p>32 Moduls
                        Access on</p>
                </div>
                <div class="part-about">
                    <div>
                        <img src="./assets/imgs/about/icon4.svg" alt="">
                    </div>
                    <p>Access on all devices</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Categories --}}
@include('includes.home-categories-list')

{{-- Our Success --}}
<section class="search-courses success">
    <div class="container">
        <h2>Our Success</h2>
        <div class="statistics-list">
        </div>
</section>

{{-- Our Services --}}
<section class="search-courses services">
    <div class="container">
        <h2>Our Services</h2>
        <div class="service-cards">
            <div class="service-card">
                <div class="service-svg">
                    <img src="./assets/icons/serv-icon1.svg" alt="">
                </div>
                <h5>Public</h5>
                <p><span>Lorem ipsum dolor sit amet, </span>consectetur adipiscing elit, sed do eiusmod tempor Lorem
                    ipsum dolor sit amet, consectetur adipiscing </p>
            </div>
            <div class="service-card">
                <div class="service-svg">
                    <img src="./assets/icons/serv-icon2.svg" alt="">
                </div>
                <h5>Online</h5>
                <p><span>Lorem ipsum dolor sit amet, </span>consectetur adipiscing elit, sed do eiusmod tempor Lorem
                    ipsum dolor sit amet, consectetur adipiscing </p>
            </div>
            <div class="service-card">
                <div class="service-svg">
                    <img src="./assets/icons/serv-icon3.svg" alt="">
                </div>
                <h5>In-house</h5>
                <p><span>Lorem ipsum dolor sit amet, </span>consectetur adipiscing elit, sed do eiusmod tempor Lorem
                    ipsum dolor sit amet, consectetur adipiscing </p>
            </div>
        </div>
</section>

{{-- FAQ  --}}
<section class="search-courses faqs">
    <div class="container">
        <h2>FAQ</h2>
    </div>
    <div class="faqs-container">
        <h4>frequently asked question</h4>
        <div class="faq-container"></div>
    </div>
</section>

{{-- Trusted by  --}}
<section class="search-courses trusted">
    <div class="container">
        <h2>Trusted By</h2>
    </div>
    <div class="swiper mySwiper-about">
        <div class="swiper-wrapper wrap2">
            <div class="swiper-slide"><img src="./assets/imgs/logos/logo1.png" alt=""></div>
            <div class="swiper-slide"><img src="./assets/imgs/logos/logo2.png" alt=""></div>
            <div class="swiper-slide"><img src="./assets/imgs/logos/logo3.png" alt=""></div>
            <div class="swiper-slide"><img src="./assets/imgs/logos/logo4.png" alt=""></div>
            <div class="swiper-slide"><img src="./assets/imgs/logos/logo1.png" alt=""></div>
        </div>
    </div>
</section>


@endsection
