<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'first_choice',
        'second_choice',
        'third_choice',
        'fourth_choice',
        'correct_answer',
    ];

    public function course(){
        $this->belongsTo('App\Models\Course','question_id','course_id');
    }


}
