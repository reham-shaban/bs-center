<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Course;
use App\Models\Timing;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CategoryController extends Controller
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

        // Filter categories by language and hidden, and load media URL
        $categories = Category::where('lang', $currentLocale)->where('hidden', false)->get()->map(function($category) {
            $category->media_url = $category->getFirstMediaUrl('images'); // Replace 'images' with your actual collection name
            return $category;
        });

        // Filter cities by language and hidden
        $cities = City::where('lang', $currentLocale)->where('hidden', false)->get();

        return view('screen.categories', compact('timings', 'categories', 'cities'));
    }
}
