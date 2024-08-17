<?php

namespace App\Services;

use Illuminate\Http\Request;

class CourseService
{
    public function applySearchFilters(Request $request, $query)
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
