<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust authorization logic as needed
    }

    public function rules()
    {
        return [
            'sort_order' => 'integer|nullable',
            'status' => 'integer|nullable',
            'title' => 'string|max:250|nullable',
            'h1' => 'string|max:255|nullable',
            'lang' => 'string|max:5|nullable',
            'description' => 'string|nullable',
            'image' => 'string|max:150|nullable',
            'image_alt' => 'string|max:150|nullable',
            'slug' => 'string|max:255|unique:blogs,slug,' . $this->blog->id,
            'meta_title' => 'string|max:255|nullable',
            'meta_description' => 'string|nullable',
            'meta_keywords' => 'string|nullable',
            'meta_robots' => 'string|nullable',
            'meta_image_size' => 'string|max:255|nullable',
            'meta_type' => 'string|max:255|nullable',
            'meta_site_name' => 'string|max:255|nullable',
            'meta_site' => 'string|max:255|nullable',
            'meta_local' => 'string|max:255|nullable',
            'meta_card' => 'string|max:255|nullable',
        ];
    }
}
