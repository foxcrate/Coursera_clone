<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseSemester;
use App\Models\ProjectSemester;

class Semester extends Model
{
    use HasFactory;

    protected $table = "semesters";

    protected $fillable = [
        'id',
        'name',
        'duration',
    ];

    public function courses(){
        return $this->belongsToMany(Course::class,'course_semesters');
    }

    public function projects(){
        return $this->belongsToMany(Project::class,'project_semesters');
    }

    public function research(){
        return $this->hasOne('App\Models\Research');
    }

    public function uploaded_researches(){
        return $this->hasMany( 'UploadedResearch::class');
    }
    
}
