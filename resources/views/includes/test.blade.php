<div class="breadcrumb-bar">
    <div class="about-header container">
        <ul>
            <li><a href="{{ route('categories.index') }}">Categories</a></li>
            <img src="/assets/icons/arrow.svg" alt="" />
            <li><a href="">Courses</a></li>
            <img src="/assets/icons/arrow.svg" alt="" />
            <li>{{ $course->title }}</li>
        </ul>
    </div>
</div>

<section class="hero-single-course">
    <img src="{{ $course->getFirstMediaUrl('images') }}" alt="{{ $course->image_alt }}" />
    <div class="course-hero-title">
        <div>
            <h1>{{ $course->title }}</h1>
            <p>{{ $course->brief }}</p>
        </div>
    </div>
</section>

<section class="course-table container">
    <div class="flex-between">
        <!-- Popup for downloading brochure -->
        <div class="popup-bg" onclick="hidePopup()"></div>
        <div id="popup-3" class="form-popup popup">
            <form>
                <!-- Form Inputs -->
                <!-- ... -->
            </form>
        </div>
        <div class="course-buttons">
            <button class="btn-primary" type="button">
                <a href="">Request In House</a>
            </button>
            <button class="btn-primary" type="button">
                <a href="">Request Online</a>
            </button>
        </div>
    </div>
    <div class="table-container">
        <table id="row-table">
            <tr>
                <th>City</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Price</th>
                <th>Register</th>
                <th>Enquire</th>
                <th>Download & Print</th>
            </tr>
            @foreach($course->timings as $timing)
                <tr>
                    <td>{{ $timing->city->name }}</td>
                    <td>{{ $timing->date_from }}</td>
                    <td>{{ $timing->date_to }}</td>
                    <td>${{ number_format($timing->price, 2) }}</td>
                    <td><a href="">Register</a></td>
                    <td><a href="">Enquire</a></td>
                    <td><a href="">Download</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <button class="btn-primary see-more-btn">See more</button>
</section>

{{-- Overview --}}
<section class="container">
    <div class="course-content">
        <h3>Overview</h3>
        <ul class="group-1">
            <li>{{ $course->overview }}</li>
            <!-- Additional overview points if stored separately -->
        </ul>
    </div>

    {{-- Objective --}}
    <div class="course-content">
        <h3>Objective</h3>
        <ul>
            <li>{{ $course->objectives }}</li>
            <!-- Additional objectives if stored separately -->
        </ul>
    </div>

    <span style="display: block; width: 89%; margin: auto; height: 1px; background-color: #d9d9d9;"></span>
</section>
