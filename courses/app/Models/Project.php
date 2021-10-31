<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseSemester;
use App\Models\ProjectSemester;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'type',
        'video',
        'price',
        'summery',
    ];
    protected $table = "projects";

    public function semesters(){
        return $this->belongsToMany(Semester::class,'project_semesters');
    }

    public function courses_count(){
        
        $all_semesters = $this->semesters;
        $courses_count = 0;
        foreach($all_semesters as $semester){
            $courses_count = $courses_count + count( $semester->courses );
        }

        return $courses_count;
    }

    public function teachers_count(){
        
        $all_semesters = $this->semesters;
        $teachers_array = array();
        foreach($all_semesters as $semester){
            $all_courses = $semester->courses;
            foreach($all_courses as $course){
                $all_teachers = $course->teachers;
                foreach($all_teachers as $teacher){
                    array_push($teachers_array,$teacher);
                }
            }
        }

        return $teachers_array;
    }

    public function cycle(){
        return $this->belongsTo(Cycle::class);
    }

    public function request_to_project(){
        return $this->hasMany( 'RequestToProject::class');
    }

}
