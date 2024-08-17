<div class="container">
    <h1>Upcoming Courses</h1>
    @if($upcomingCourses->isNotEmpty())
        <ul>
            @foreach($upcomingCourses as $course)
                @foreach($course->timings as $timing)
                    @if($timing->is_upcoming)
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
        <p>No upcoming courses found.</p>
    @endif
</div>
