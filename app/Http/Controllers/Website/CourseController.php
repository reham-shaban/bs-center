<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Exception;

class CourseController extends Controller
{
    public function show($slug)
    {
        $course = Course::with(['category', 'timings.city'])->where('slug', $slug)->firstOrFail();

        return view('screen.course', compact('course'));
    }

    public function getAllCourseTimings($slug)
    {
        try {
            $currentLocale = app()->getLocale(); // Get the current language
            $course = Course::where('slug', $slug)->first();

            if (!$course) {
                return response()->json(['message' => 'Course not found'], 404);
            }

            $timings = $course->timings()
                                ->with('city')
                                ->where('hidden', false)
                                ->where('lang', $currentLocale)
                                ->get();

            return response()->json(['timings' => $timings], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve timings.', 'message' => $e->getMessage()], 500);
        }
    }

}
