<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $table = 'courses';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'h1',
        'lang',
        'overview',
        'description',
        'objectives',
        'brief',
        'image_alt',
        'image_title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_robots',
        'meta_image_size',
        'meta_type',
        'meta_site_name',
        'meta_site',
        'meta_local',
        'meta_card',
        'hidden',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function timings()
    {
        return $this->hasMany(Timing::class, 'course_id', 'id');
    }

    public function requestsOnline()
    {
        return $this->hasMany(RequestOnline::class, 'course_id', 'id');
    }

    public function requestsInHouse()
    {
        return $this->hasMany(RequestInHouse::class, 'course_id', 'id');
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class, 'course_id', 'id');
    }

    public function downloads()
    {
        return $this->hasMany(Download::class, 'course_id', 'id');
    }

    // Function to get upcoming courses
    public static function getUpcomingCourses()
    {
        $currentLocale = app()->getLocale();

        return self::where('lang', $currentLocale)
            ->where('hidden', false)
            ->whereHas('timings', function($query) {
            $query->where('is_upcoming', true)
                  ->where('date_from', '>', now())
                  ->orderBy('date_from', 'asc');
        })->with(['timings.city', 'media']) // Eager load the media relationship
        ->get()
        ->map(function ($course) {
            // Add the image URL to each course
            $course->image_url = $course->getFirstMediaUrl('images');
            return $course;
        });
    }

    // Function to get banner courses
    public static function getBannerCourses()
    {
        $currentLocale = app()->getLocale();

        return self::where('lang', $currentLocale)
            ->where('hidden', false)
            ->whereHas('timings', function($query) {
                $query->where('is_banner', true)
                    ->orderBy('date_from', 'asc');
            })
            ->with(['timings.city', 'media']) // Eager load the media relationship
            ->get()
            ->map(function ($course) {
                // Add the image URL to each course
                $course->image_url = $course->getFirstMediaUrl('images');
                return $course;
            });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')->singleFile();
    }
}
