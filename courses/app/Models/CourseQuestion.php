<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'first_answer',
        'second_answer',
        'third_answer',
        'fourth_answer',
        'correct_answer',
    ];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }


}
