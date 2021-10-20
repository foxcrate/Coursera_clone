<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'file',
        'video',
    ];

    public function course(){
        $this->belongsTo('App\Models\Course','lesson_id','id');
    }

    public function question(){
        $this->hasOne('App\Models\LessonQuestion','lesson_id','question_id');
    }

}
