<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'first_choice',
        'second_choice',
        'correct_answer',
    ];

    public function lesson(){
        $this->belongsTo('App\Models\Lesson','question_id','lesson_id');
    }

}
