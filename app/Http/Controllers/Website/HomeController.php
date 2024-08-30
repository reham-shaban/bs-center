<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $bannerCourses = Course::getBannerCourses();
        $categories = Category::all();

        return view('screen.home', compact('courses', 'bannerCourses', 'cities', 'categories'));
    }

    public function getUpcomingCourses()
    {
        $upcomingCourses = Course::getUpcomingCourses();
        return response()->json($upcomingCourses);
    }

    public function searchCourses(Request $request)
    {
        $query = $this->courseService->applySearchFilters($request, Course::query());
        return response()->json($query);
    }

}
