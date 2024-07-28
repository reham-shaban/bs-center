<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    protected $table = 'cities';
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title_en',
        'title_ar',
        'lang',
        'slug_en',
        'slug_ar',
        'meta_keywords_ar',
        'meta_keywords_en',
        'meta_title_ar',
        'meta_title_en',
        'meta_description_ar',
        'meta_description_en',
        'meta_robots_ar',
        'meta_robots_en',
        'meta_image_size',
        'meta_type_ar',
        'meta_type_en',
        'meta_site_name_ar',
        'meta_site_name_en',
        'meta_site_ar',
        'meta_site_en',
        'meta_local_ar',
        'meta_local_en',
        'meta_card_ar',
        'meta_card_en',
        'h1_en',
        'description_en',
        'h1_ar',
        'description_ar',
        'image_alt_ar',
        'image_alt_en',
        'hidden',
    ];

    public function timings()
    {
        return $this->hasMany(Timing::class, 'city_id', 'id');
    }

    public function cityCategorySeos()
    {
        return $this->hasMany(CityCategorySeo::class, 'city_id', 'id');
    }

    public function getRouteKeyName()
    {
        $currentLocale = app()->getLocale();

        // Choose the appropriate slug field based on the current language
        $slugField = 'slug_' . $currentLocale;

        return $slugField;
    }
}
