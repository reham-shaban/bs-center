<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestInHouse extends Model
{
    protected $table = 'request_in_house';
    use HasFactory;

    protected $fillable = [
        'location',
        'number_of_days',
        'number_of_participants',
        'message'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
