<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $currentLocale = app()->getLocale(); // Get the current language

        // Fetch all blogs
        $blogs = Blog::where('lang', $currentLocale)->where('hidden', false)->get();

        // Pass blogs to the view
        return view('screen.blogs', compact('blogs'));
    }
}
