<div>
    @if($bannerCourses->isNotEmpty())
    <section id="hero1" class="hero">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($bannerCourses as $course)
                <div class="swiper-slide">
                    <div class="img-container">
                        <img src="{{ $course->image_url }}" alt="{{ $course->image_alt }}">
                        <div class="overlay"></div>
                        <div class="content">
                            <h1>{{ $course->h1 }}</h1>
                            <p>{{ $course->timings->first()->date_from }}</p>
                            <p>{{ $course->timings->first()->city->name }}</p>
                            <div class="buttons-hero">
                                <a href="{{ route('register') }}" class="register-button">Register Now</a>
                                <a href="{{ route('course.show', ['slug' => $course->slug]) }}" class="learn-more-button">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
    </section>
    <div class="swiper-button-next hero-btn"></div>
    <div class="swiper-button-prev hero-btn"></div>

    @endif
</div>
