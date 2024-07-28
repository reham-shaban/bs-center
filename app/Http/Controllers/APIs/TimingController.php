<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTimingRequest;
use App\Jobs\UpdateTimingsJob;
use App\Models\Course;
use Illuminate\Http\Request;
use Exception;

class TimingController extends Controller
{
    // Show timings for a course
    public function indexCourseTimings($slug)
    {
        try{
            $course = Course::where('slug', $slug)->first();

            if (!$course) {
                return response()->json(['message' => 'Course not found'], 404);
            }

            $timings = $course->timings()->get();

            return response()->json($timings);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrive timings.', 'message' => $e->getMessage()], 500);
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
