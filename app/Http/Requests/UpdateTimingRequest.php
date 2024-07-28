<?php

// app/Http/Requests/UpdateTimingRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTimingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'course_id' => 'nullable|exists:courses,id',
            'city_id' => 'nullable|exists:cities,id',
            'title' => 'nullable|string|max:250',
            'price' => 'nullable|numeric|min:0',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date',
            'duration' => 'nullable|string|max:255',
            'lang' => 'nullable|string|max:5',
            'is_upcoming' => 'boolean',
        ];
    }
}
