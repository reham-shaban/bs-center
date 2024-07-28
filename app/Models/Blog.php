<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    protected $table = 'blogs';
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'lang',
        'description',
        'image',
        'image_alt',
        'image_title',
        'slug',
        'meta_keywords',
        'meta_title',
        'meta_description',
        'meta_robots',
        'meta_image_size',
        'meta_type',
        'meta_site_name',
        'meta_site',
        'meta_local',
        'meta_card',
        'h1',
        'hidden',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
