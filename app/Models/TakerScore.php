<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TakerScore extends Model
{
    protected $primaryKey = 'taker_id';
    public $incrementing = false;
    protected $fillable = [
        'Taker ID', 'Last Name', 'First Name', 'Middle Initial', 'Linguistics', 'Mathematics', 'Science', 'Aptitude',
    ];

    // Calculate and return the total score attribute
    public function getTotalScoreAttribute()
    {
        return $this->attributes['linguistics'] + $this->attributes['mathematics'] + $this->attributes['science'] + $this->attributes['aptitude'];
    }
}