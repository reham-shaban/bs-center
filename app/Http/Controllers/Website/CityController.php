<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CityController extends Controller
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

        $cities = City::with('media')->get(); // Fetch cities with their media

        return view('screen.venus', compact('courses', 'cities'));
    }
}
