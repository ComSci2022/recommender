<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'course_id', 'course_name', 'linguistics', 'mathematics', 'science', 'aptitude', 'total_score'
    ];
}
