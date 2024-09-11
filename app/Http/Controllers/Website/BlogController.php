<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function index()
    {
        // Pass blogs to the view
        return view('screen.blogs');
    }

    public function show($slug){
        $blog = Blog::where('slug', $slug)->first();

        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }
       return view('screen.blog', compact('blog'));
    }

    public function getBlogs()
    {
        $currentLocale = app()->getLocale();
        $blogs = Blog::where('lang', $currentLocale)
                    ->where('hidden', false)
                    ->orderBy('sort_order', 'asc')
                    ->get()->map(function($blog) {
                        $blog->image_url = $blog->getFirstMediaUrl('images');
                        return $blog;
                    });
        Log::info("message");
        Log::info(["blogs" => $blogs]);
        return response()->json(["blogs" => $blogs], 200);
    }

    public function getBlogsByStatus($status)
    {
        $currentLocale = app()->getLocale();
        $blogs = Blog::where('status', $status)
                ->where('lang', $currentLocale)
                ->where('hidden', false)
                ->orderBy('sort_order', 'asc')
                ->get()->map(function($blog) {
                    $blog->image_url = $blog->getFirstMediaUrl('images');
                    return $blog;
                });;

        return response()->json([
            'blogs' => $blogs,
            200
        ]);
    }

}
