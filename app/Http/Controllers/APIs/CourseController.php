<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseDetailsRequest;
use App\Http\Requests\StoreCourseSEORequest;
use App\Http\Requests\UpdateCourseDetailsRequest;
use App\Http\Requests\UpdateCourseSEORequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Show courese with lang 'en' or 'ar' & pagination
    public function index(Request $request)
    {
        try {
            $perPage = $request->input('per_page', config('pagination.per_page'));
            $lang = $request->input('lang');

            $query = Course::query();

            if ($lang) {
                $query->where('lang', $lang);
            }

            $courses = $query->with('category:id,title')
                         ->select('id', 'title', 'slug', 'h1', 'category_id')
                         ->paginate($perPage);

            // Add image URLs to each course
            $courses->transform(function ($course) {
                $course->image = $course->getFirstMediaUrl('images');
                unset($course->media);
                return $course;
            });

            return response()->json($courses, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve courses.', 'message' => $e->getMessage()], 500);
        }
    }

    // Create new course with course details
    public function store(StoreCourseDetailsRequest $request)
    {
        try {
            $validatedData = $request->validated();

            // Create the course
            $course = Course::create($validatedData);

            // Handle image upload and association
            if ($request->hasFile('image')) {
                $course->addMediaFromRequest('image')->toMediaCollection('images');
            }
            return response()->json($course, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create course.', 'message' => $e->getMessage()], 500);
        }
    }

    // Show course fields
    public function show($slug)
    {
        try {
            // Find the course by slug
            $course = Course::where('slug', $slug)->firstOrFail();

            return response()->json($course, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Course not found', 'message' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve course.', 'message' => $e->getMessage()], 500);
        }
    }

    // update course details
    public function update(UpdateCourseDetailsRequest $request, $slug)
    {
        try {
            // Find the course by slug
            $course = Course::where('slug', $slug)->firstOrFail();

            $course->update($request->validated());

            // Handle image upload and association
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $course
                    ->clearMediaCollection('images')
                    ->addMedia($image)
                    ->toMediaCollection('images');
            }

            return response()->json($course, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Course not found', 'message' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update course.', 'message' => $e->getMessage()], 500);
        }
    }

    // Update course SEO
    public function updateSEO(UpdateCourseSEORequest $request, $slug)
    {
        try {
            // Find the course by slug
            $course = Course::where('slug', $slug)->firstOrFail();
            $course->update($request->validated());
            return response()->json($course, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Course not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update course SEO', 'message' => $e->getMessage()], 500);
        }
    }

    // Bulk hide courses
    public function bulkHide(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'integer|exists:categories,id'
        ]);

        // Get the array of IDs from the request
        $ids = $request->input('ids');

        // Perform the bulk update and get the number of affected rows
        $affectedRows = Course::whereIn('id', $ids)->update(['hidden' => true]);

        if ($affectedRows === 0) {
            return response()->json(['error' => 'No courses were updated.'], 404);
        }

        return response()->json(['message' => "$affectedRows courses hidden successfully."], 200);
    }

    // Unhide after being hidden
    public function unhide($id)
    {
        try {
            $course = Course::findOrFail($id);

            if ($course->hidden) {
                $course->hidden = false;
                $course->save();
                return response()->json(['message' => 'Course unhidden successfully'], 200);
            } else {
                return response()->json(['error' => 'Course is not hidden'], 400);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Course not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to unhide course', 'message' => $e->getMessage()], 500);
        }
    }


}
