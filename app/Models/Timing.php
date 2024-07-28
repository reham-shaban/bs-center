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
        'hidden',
    ];

    // Define relationships
    public function course()
    {
        return $this->belongsTo(Course::class, 'courese_id', 'id');
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

    public function setIsUBanaingAttribute($value)
    {
        $this->attributes['display_in_banner'] = intval($value);
    }

}
