<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
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
        // Use the refactored search method
        $query = $this->courseService->applySearchFilters($request, Course::query());
        $courses = $query->with('timings.city')->get();

        $categories = Category::all();

        return view('screen.categories', compact('courses', 'categories'));
    }
}
