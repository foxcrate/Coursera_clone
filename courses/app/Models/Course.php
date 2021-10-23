<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'courses';

    public function lessons(){
        $this->hasMany('App\Models\Lesson');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'course_teachers');
    }

    public function semester(){
        return $this->belongsTo('App\Models\Semester');
    }

    public function questions(){
        return $this->hasMany('App\Models\CourseQuestion');
    }

}
