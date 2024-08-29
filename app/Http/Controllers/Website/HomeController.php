<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Services\CourseService;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index(Request $request)
    {
        // Use the refactored search method
        $query = $this->courseService->applySearchFilters($request, Course::query());

        $courses = $query->with('timings.city')->get();
        $cities = City::all();
        $upcomingCourses = Course::getUpcomingCourses();
        $bannerCourses = Course::getBannerCourses();

        return view('screen.home', compact('courses', 'upcomingCourses', 'bannerCourses', 'cities'));
    }

}
