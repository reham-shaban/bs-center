<?php

// app/Http/Requests/UpdateCityRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lang' => 'nullable|string|max:5',
            'title_en' => 'nullable|string|max:250',
            'title_ar' => 'nullable|string|max:255',
            'slug_en' => 'nullable|string|max:255|unique:cities,slug_en,' . $this->city->id,
            'slug_ar' => 'nullable|string|max:255|unique:cities,slug_ar,' . $this->city->id,
            'h1_en' => 'nullable|string|max:255',
            'h1_ar' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_keywords_en' => 'nullable|string|max:255',
            'meta_robots_en' => 'nullable|string|max:255',
            'meta_type_en' => 'nullable|string|max:255',
            'meta_site_name_en' => 'nullable|string|max:255',
            'meta_site_en' => 'nullable|string|max:255',
            'meta_local_en' => 'nullable|string|max:255',
            'meta_card_en' => 'nullable|string',
            'meta_title_ar' => 'nullable|string|max:255',
            'meta_description_ar' => 'nullable|string',
            'meta_keywords_ar' => 'nullable|string|max:255',
            'meta_robots_ar' => 'nullable|string|max:255',
            'meta_type_ar' => 'nullable|string|max:255',
            'meta_site_name_ar' => 'nullable|string|max:255',
            'meta_site_ar' => 'nullable|string|max:255',
            'meta_local_ar' => 'nullable|string|max:255',
            'meta_card_ar' => 'nullable|string',
            'meta_image_size' => 'nullable|string|max:255',
            'image_alt_en' => 'nullable|string|max:255',
            'image_alt_ar' => 'nullable|string|max:255',
        ];
    }
}
