<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Services\CourseService;
use App\Models\Course;
use App\Models\Timing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        Log::info("current Local: ", ["local" => $currentLocale]);
        // Start with the Timing model and apply filters
        $query = Timing::where('lang', $currentLocale)->where('hidden', false);
        $query = $this->courseService->applySearchFilters($request, $query);

        // Get the filtered timings with related course and city data
        $timings = $query->with(['course', 'city'])
                        ->get(['id', 'course_id', 'city_id', 'date_from', 'date_to'])
                        ->map(function ($timing) {
                            return [
                                'id' => $timing->id,
                                'course_title' => $timing->course->title,
                                'course_slug' => $timing->course->slug,
                                'course_image' => $timing->course->getFirstMediaUrl('images'),
                                'image_alt' => $timing->course->image_alt,
                                'h1' => $timing->course->h1,
                                'date_from' => $timing->date_from,
                                'date_to' => $timing->date_to,
                                'city_title' => $timing->city->title,
                            ];
                        });

        // Fetch filtered cities
        $cities = City::where('lang', $currentLocale)
                      ->where('hidden', false)
                      ->get();
        // Fetch durations
        $durations = Timing::select('duration')->distinct()->pluck('duration');

        // Fetch filtered banner courses
        $query_banner = Timing::where('lang', $currentLocale);
        $bannerCourses = Timing::getBanner($query_banner);

        // Fetch filtered categories
        $categories = Category::where('lang', $currentLocale)
                              ->where('hidden', false)
                              ->get();

        // Add image URLs to each category
        $categories->transform(function ($category) {
            // Check if the category has associated media
            if($category && $category->getFirstMediaUrl('images')){
                $category->image_url = $category->getFirstMediaUrl('images');
            } else {
                $category->image_url = null;
            }
            return $category;
        });

        return view('screen.home', compact('timings', 'bannerCourses', 'cities', 'categories', 'durations'));
    }

    public function getUpcomingCourses()
    {
        $currentLocale = app()->getLocale(); // Get the current language
        $query = Timing::where('lang', $currentLocale);

        $upcomingCourses = Timing::getUpcoming($query);
        return response()->json($upcomingCourses);
    }

    // public function searchCourses(Request $request)
    // {
    //     $currentLocale = app()->getLocale(); // Get the current language

    //     // Apply language and hidden filters to the search query
    //     $query = $this->courseService->applySearchFilters(
    //         $request,
    //         Course::query()->where('lang', $currentLocale)->where('hidden', false)
    //     );

    //     return response()->json($query->get());
    // }
}
