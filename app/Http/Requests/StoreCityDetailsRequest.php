<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCityDetailsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lang' => 'nullable|string|max:5',
            'title' => 'required|string|max:250',
            'slug' => 'required|string|max:255|unique:cities,slug',
            'h1' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'hidden' => 'boolean',
            'image_alt' => 'nullable|string|max:255',
        ];
    }

}
