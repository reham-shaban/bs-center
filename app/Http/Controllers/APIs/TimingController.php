<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTimingRequest;
use App\Http\Requests\UpdateTimingRequest;
use App\Jobs\UpdateTimingsJob;
use App\Models\Course;
use App\Models\Timing;
use Illuminate\Http\Request;
use Exception;

class TimingController extends Controller
{
    // Show timings for one course
    public function indexCourseTimings(Request $request, $slug)
    {
        try {
            $perPage = $request->input('per_page', config('pagination.per_page'));
            $course = Course::where('slug', $slug)->first();

            if (!$course) {
                return response()->json(['message' => 'Course not found'], 404);
            }

            $timings = $course->timings()->paginate($perPage);

            return response()->json($timings);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve timings.', 'message' => $e->getMessage()], 500);
        }
    }

    // Bulk toggle hidden status for timings
    public function bulkHide(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'integer|exists:courses,id'
        ]);

        // Get the array of IDs from the request
        $ids = $request->input('ids');

        // Perform the bulk update to toggle the hidden status and get the number of affected rows
        $affectedRows = 0;
        $timings = Timing::whereIn('id', $ids)->get();

        foreach ($timings as $timing) {
            $timing->hidden = !$timing->hidden;
            $timing->save();
            $affectedRows++;
        }

        if ($affectedRows === 0) {
            return response()->json(['error' => 'No timings were updated.'], 404);
        }

        return response()->json(['message' => "$affectedRows timings updated successfully."], 200);
    }

    // Add new timings
    public function store(StoreTimingRequest $request, $slug)
    {
        try {
            // Retrieve the course by slug
            $course = Course::where('slug', $slug)->first();

            if (!$course) {
                return response()->json(['message' => 'Course not found'], 404);
            }

            // Merge course_id, title, and lang into the request data
            $timingData = $request->validated();
            $timingData['course_id'] = $course->id;
            $timingData['title'] = $course->title;
            $timingData['lang'] = $course->lang;

            // Create the timing
            $timing = Timing::create($timingData);

            return response()->json($timing, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create timing.', 'message' => $e->getMessage()], 500);
        }
    }

    // Toggle is_banner
    public function toggleBanner($id)
    {
        try {
            // Find the timing by ID
            $timing = Timing::findOrFail($id);

            // Toggle the is_banner value
            $timing->is_banner = !$timing->is_banner;

            // Save the changes
            $timing->save();

            return response()->json([
                'message' => 'Timing is_banner updated successfully.',
                'timing' => $timing
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update is_banner.', 'message' => $e->getMessage()], 500);
        }
    }

    // Toggle is_upcoming
    public function toggleUpcoming($id)
    {
        try {
            // Find the timing by ID
            $timing = Timing::findOrFail($id);

            // Toggle the is_upcoming value
            $timing->is_upcoming = !$timing->is_upcoming;

            // Save the changes
            $timing->save();

            return response()->json([
                'message' => 'Timing is_upcoming updated successfully.',
                'timing' => $timing
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update is_upcoming.', 'message' => $e->getMessage()], 500);
        }
    }

    public function timingBatchUpdate(UpdateTimingRequest $request)
    {
        try {
            // Validate that selected_timings is present and is an array
            $request->validate([
                'selected_timings' => 'required|array|min:1',
                'selected_timings.*' => 'integer|exists:timings,id', // Ensure each timing ID exists in the timings table
            ]);

            // Retrieve the validated selected_timings array
            $selectedTimings = $request->input('selected_timings');

            // Retrieve all other new values to update the timings
            $newValues = $request->except('selected_timings');

            // Dispatch the job to update the timings
            UpdateTimingsJob::dispatch($selectedTimings, $newValues);

            return response()->json(['message' => 'Timings update job dispatched successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to dispatch timing update job.', 'message' => $e->getMessage()], 500);
        }
    }
}
