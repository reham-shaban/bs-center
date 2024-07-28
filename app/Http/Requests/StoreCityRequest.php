<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lang' => 'required|string|max:5',
            'title_en' => 'required|string|max:250',
            'title_ar' => 'required|string|max:255',
            'slug_en' => 'required|string|max:255|unique:cities,slug_en',
            'slug_ar' => 'required|string|max:255|unique:cities,slug_ar',
            'h1_en' => 'required|string|max:255',
            'h1_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
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
