<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'city_id',
        'title',
        'price',
        'date_from',
        'date_to',
        'duration',
        'lang',
        'is_upcoming',
        'is_banner',
        'hidden',
    ];

    // Helper function
    public static function getUpcoming($query) {
        $query = $query->where('hidden', false)
                    ->where('is_upcoming', true);

        // Get the filtered timings with related course and city data
        $timings = $query->with(['course', 'city'])
                        ->get(['id', 'course_id', 'city_id', 'date_from', 'date_to'])
                        ->map(function ($timing) {
                            return [
                                'id' => $timing->id,
                                'course_title' => $timing->course->title,
                                'course_slug' => $timing->course->slug,
                                'course_image' => $timing->course->getFirstMediaUrl('images'),
                                'image_alt' => $timing->course->image_alt,
                                'h1' => $timing->course->h1,
                                'date_from' => $timing->date_from,
                                'date_to' => $timing->date_to,
                                'city_title' => $timing->city->title,
                            ];
                        });

        return $timings;
    }

    public static function getBanner($query) {
        $query = $query->where('hidden', 0)
                    ->where('is_banner', 1);

        // Get the filtered timings with related course and city data
        $timings = $query->with(['course', 'city'])
                        ->get(['id', 'course_id', 'city_id', 'date_from', 'date_to'])
                        ->map(function ($timing) {
                            return [
                                'id' => $timing->id,
                                'course_title' => $timing->course->title,
                                'course_slug' => $timing->course->slug,
                                'course_image' => $timing->course->getFirstMediaUrl('images'),
                                'image_alt' => $timing->course->image_alt,
                                'h1' => $timing->course->h1,
                                'date_from' => $timing->date_from,
                                'date_to' => $timing->date_to,
                                'city_title' => $timing->city->title,
                            ];
                        });

        return $timings;
    }

    // Define relationships
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function registers()
    {
        return $this->hasMany(Register::class, 'timing_id', 'id');
    }

    public function setIsUpcomingAttribute($value)
    {
        $this->attributes['is_upcoming'] = intval($value);
    }

    public function setIsBannerAttribute($value)
    {
        $this->attributes['is_banner'] = intval($value);
    }

}
