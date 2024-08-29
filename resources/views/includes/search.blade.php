<section class="search-section home-search-section">
    <div class="container">
        <h2>Search For Your Course</h2>
        <div class="home-search">
            <form action="{{ $searchRoute }}" method="GET" class="search-courses-form">
                <div class="row1">
                    <div>
                        <input type="text" name="course_title" id="course_title" placeholder="Search for course" value="{{ request('course_title') }}">
                        <img src="{{ asset('assets/icons/search.svg') }}" alt="">
                    </div>
                    <input class="category-input" type="text" name="category_title" id="category_title" placeholder="Categories" value="{{ request('category_title') }}">
                </div>
                <div class="row2">
                    <div class="custom-select-wrapper">
                        <div class="custom-select">
                            <div class="custom-select-trigger">
                                <span>{{ request('city_title', 'Venue') }}</span>
                                <img src="{{ asset('assets/icons/arrow-down-2.svg') }}" alt="Arrow Down">
                            </div>
                            <div class="custom-options">
                                @foreach($cities as $city)
                                    <span class="custom-option" data-value="{{ $city->title }}">{{ $city->title }}</span>
                                @endforeach
                            </div>
                        </div>
                        <input type="hidden" name="city_title" id="city_title_input" value="{{ request('city_title') }}">
                    </div>

                    <div class="custom-select-wrapper">
                        <div class="custom-select">
                            <div class="custom-select-trigger">
                                <span>{{ request('month', 'Month') }}</span>
                                <img src="{{ asset('assets/icons/arrow-down-2.svg') }}" alt="Arrow Down">
                            </div>
                            <div class="custom-options">
                                @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                    <span class="custom-option" data-value="{{ strtolower($month) }}">{{ $month }}</span>
                                @endforeach
                            </div>
                        </div>
                        <input type="hidden" name="month" id="month_input" value="{{ request('month') }}">
                    </div>

                    <div class="custom-select-wrapper">
                        <div class="custom-select">
                            <div class="custom-select-trigger">
                                <span>{{ request('duration', 'Duration') }}</span>
                                <img src="{{ asset('assets/icons/arrow-down-2.svg') }}" alt="Arrow Down">
                            </div>
                            <div class="custom-options">
                                <span class="custom-option" data-value="1week">1 Week</span>
                                <span class="custom-option" data-value="1month">1 Month</span>
                                <span class="custom-option" data-value="3months">3 Months</span>
                                <span class="custom-option" data-value="6months">6 Months</span>
                            </div>
                        </div>
                        <input type="hidden" name="duration" id="duration_input" value="{{ request('duration') }}">
                    </div>

                </div>
                <div class="row3">
                    <button type="submit">Search
                        <img src="{{ asset('assets/icons/arrow-right.svg') }}" alt="">
                    </button>
                    <button type="button" onclick="resetForm()">Reset
                        <img src="{{ asset('assets/icons/reload.svg') }}" alt="">
                    </button>
                </div>
            </form>
        </div>

        @if(request()->hasAny(['course_title', 'category_title', 'city_title', 'month', 'duration']))
            @if(isset($courses) && $courses->isNotEmpty())
                <h2>Search Results</h2>

                <div class="card-container">
                    @foreach($courses as $course)
                        @php
                            $firstTiming = $course->timings->first();
                            $imgSrc = $course->image_url ?? '/assets/imgs/default-course-img.png'; // Fallback image
                        @endphp
                        <a href="" class="card">
                            <img src="{{ $imgSrc }}" alt="{{ $course->title }}">
                            <div class="card-content">
                                <div class="card-title">{{ $course->title }}</div>
                                <div class="card-dates">
                                    <img src="{{ asset('assets/icons/calender2.svg') }}" alt="" />
                                    @if($firstTiming)
                                        <span>{{ $firstTiming->date_from }} to {{ $firstTiming->date_to }} {{ $firstTiming->date_to }}</span>
                                    @else
                                        <span>No timings available</span>
                                    @endif
                                </div>
                                <div class="card-location">
                                    <img src="{{ asset('assets/icons/location.svg') }}" alt="" class="location-icon" />
                                    @if($firstTiming)
                                        <span>{{ $firstTiming->city->title }}</span>
                                    @else
                                        <span>Location not available</span>
                                    @endif
                                </div>
                                <div class="card-buttons">
                                    <a href="" class="btn-primary">Register Now</a>
                                    <a href="" class="btn-secondary">Learn more</a>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @elseif(isset($courses))
                <p>No courses found.</p>
            @endif
        @endif
</section>

<script>
    function resetForm() {
        const form = document.querySelector('.search-courses-form');

        // Reset form inputs
        form.reset();

        // Clear the query string by reloading the page without query parameters
        window.location.href = window.location.pathname;
    }
    document.querySelectorAll('.custom-option').forEach(option => {
        option.addEventListener('click', function() {
            const select = this.closest('.custom-select');
            const hiddenInput = select.parentElement.querySelector('input[type="hidden"]');

            if (hiddenInput) {
                // Update the hidden input with the selected value
                hiddenInput.value = this.getAttribute('data-value');
                console.log('Updated input:', hiddenInput.name, hiddenInput.value);

                // Update the trigger text with the selected option's text
                select.querySelector('.custom-select-trigger span').textContent = this.textContent;
            } else {
                console.error('Hidden input not found for:', select);
            }
        });
    });



</script>
