<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Fetch all blogs
        $blogs = Blog::where('hidden', false)->get();

        // Pass blogs to the view
        return view('screen.blogs', compact('blogs'));
    }
}
