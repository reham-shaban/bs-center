<div class="container">
    <h1>Search Courses</h1>
    <form action="{{ $searchRoute }}" method="GET">
        <div class="form-group">
            <label for="course_title">Course Title</label>
            <input type="text" name="course_title" id="course_title" class="form-control" value="{{ request('course_title') }}">
        </div>

        <div class="form-group">
            <label for="category_title">Category Title</label>
            <input type="text" name="category_title" id="category_title" class="form-control" value="{{ request('category_title') }}">
        </div>

        <div class="form-group">
            <label for="city_title">City Title</label>
            <input type="text" name="city_title" id="city_title" class="form-control" value="{{ request('city_title') }}">
        </div>

        <div class="form-group">
            <label for="month">Month</label>
            <input type="text" name="month" id="month" class="form-control" value="{{ request('month') }}" placeholder="e.g., May, November">
        </div>

        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" name="duration" id="duration" class="form-control" value="{{ request('duration') }}">
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>

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
