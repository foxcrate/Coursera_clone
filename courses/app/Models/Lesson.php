<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'file',
        'image',
        'video',
        'course_id',
    ];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function question(){
        return $this->hasOne('App\Models\LessonQuestion');
    }

}
