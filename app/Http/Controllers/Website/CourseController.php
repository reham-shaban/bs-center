<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\CityCategorySeo;
use App\Models\Course;
use App\Models\Timing;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        // Use the refactored search method
        $query = $this->applySearchFilters($request, Course::query());

        $courses = $query->with('timings.city')->get();
        $upcomingCourses = Course::getUpcomingCourses();
        $bannerCourses = Course::getBannerCourses();

        return view('home.home', compact('courses', 'upcomingCourses', 'bannerCourses'));
    }

    // Refactored search method
    private function applySearchFilters(Request $request, $query)
    {
        if ($request->filled('category_title')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->input('category_title') . '%');
            });
        }

        if ($request->filled('course_title')) {
            $query->where('title', 'like', '%' . $request->input('course_title') . '%');
        }

        if ($request->filled('city_title')) {
            $query->whereHas('timings.city', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->input('city_title') . '%');
            });
        }

        if ($request->filled('month')) {
            $monthName = ucfirst(strtolower($request->input('month')));
            $monthNumber = date('m', strtotime($monthName));

            $query->whereHas('timings', function ($q) use ($monthNumber) {
                $q->whereMonth('date_from', $monthNumber);
            });
        }

        if ($request->filled('duration')) {
            $query->whereHas('timings', function ($q) use ($request) {
                $q->where('duration', $request->input('duration'));
            });
        }

        return $query;
    }
}
