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
                                    <span class="custom-option" data-value="{{ $city->id }}">{{ $city->title }}</span>
                                @endforeach
                            </div>
                        </div>
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
                    </div>
                </div>
                <div class="row3">
                    <button type="submit">Search
                        <img src="{{ asset('assets/icons/arrow-right.svg') }}" alt="">
                    </button>
                    <button type="reset">
                        Reset
                        <img src="{{ asset('assets/icons/reload.svg') }}" alt="">
                    </button>
                </div>
            </form>
        </div>

        @if(isset($courses) && $courses->isNotEmpty())
            <h2>Search Results</h2>
            <ul>
                @foreach($courses as $course)
                    @php
                        $firstTiming = $course->timings->first();
                    @endphp
                    <li>
                        <strong>{{ $course->title }}</strong>
                        @if($firstTiming)
                            ({{ $firstTiming->city->title }})
                            <br>
                            {{ $firstTiming->date_from }} to {{ $firstTiming->date_to }}
                        @else
                            (No timings available)
                        @endif
                    </li>
                @endforeach
            </ul>
        @elseif(isset($courses))
            <p>No courses found.</p>
        @endif

    </div>
</section>
