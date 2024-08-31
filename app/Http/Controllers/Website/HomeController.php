<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Services\CourseService;
use App\Models\Course;
use App\Models\Timing;
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
        $currentLocale = app()->getLocale(); // Get the current language

        // Start with the Timing model and apply filters
        $query = Timing::where('lang', $currentLocale)->where('hidden', false);
        $query = $this->courseService->applySearchFilters($request, $query);

        // Get the filtered timings with related course and city data
        $timings = $query->with(['course', 'city'])
                        ->get(['course_id', 'city_id', 'date_from', 'date_to'])
                        ->map(function ($timing) {
                            return [
                                'course_title' => $timing->course->title,
                                'course_image' => $timing->course->getFirstMediaUrl('images'), // Adjust the media collection name if needed
                                'date_from' => $timing->date_from,
                                'date_to' => $timing->date_to,
                                'city_title' => $timing->city->title,
                            ];
                        });

        // Fetch filtered cities
        $cities = City::where('lang', $currentLocale)
                      ->where('hidden', false)
                      ->get();

        // Fetch filtered banner courses
        $bannerCourses = Course::getBannerCourses();

        // Fetch filtered categories
        $categories = Category::where('lang', $currentLocale)
                              ->where('hidden', false)
                              ->get();

        return view('screen.home', compact('timings', 'bannerCourses', 'cities', 'categories'));
    }

    public function getUpcomingCourses()
    {
        $upcomingCourses = Course::getUpcomingCourses();
        return response()->json($upcomingCourses);
    }

    public function searchCourses(Request $request)
    {
        $currentLocale = app()->getLocale(); // Get the current language

        // Apply language and hidden filters to the search query
        $query = $this->courseService->applySearchFilters(
            $request,
            Course::query()->where('lang', $currentLocale)->where('hidden', false)
        );

        return response()->json($query->get());
    }
}
