<div class="container">
    <h1>Banner Courses</h1>
    @if($bannerCourses->isNotEmpty())
        <ul>
            @foreach($bannerCourses as $course)
                @foreach($course->timings as $timing)
                    @if($timing->is_banner)
                        <li>
                            <strong>{{ $course->title }}</strong>
                            <br>
                            {{ $timing->city->title }}:
                            {{ $timing->date_from }} - {{ $timing->date_to }}
                        </li>
                    @endif
                @endforeach
            @endforeach
        </ul>
    @else
        <p>No banner courses found.</p>
    @endif
</div>
