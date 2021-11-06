<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseSemester;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'material',
        'order',
    ];

    protected $table = 'courses';

    public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'course_teachers');
    }

    public function semesters(){
        return $this->belongsToMany(Semester::class,'course_semesters');
    }

    public function questions(){
        return $this->hasMany('App\Models\CourseQuestion');
    }

}
