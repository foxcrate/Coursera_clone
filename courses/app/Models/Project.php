<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseSemester;
use App\Models\ProjectSemester;
use App\Models\SemesterCalender;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'image',
        'type',
        'video',
        'price',
        'summery',
    ];
    protected $table = "projects";



    public function semesters(){
        return $this->belongsToMany(Semester::class,'project_semesters')->distinct();
    }

    public function assignments(){
        return $this->hasMany( 'App\Models\Assignment');
    }

    public function semesters_num(){
        return count($this->semesters);
    }

    public function current_course( $remaining, $the_semester){

        if($the_semester == 1){
            if( $this->semester_calender->semester1->course_calender->course12 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 12" ;
                    return $this->semester_calender->semester1->course_calender->course12;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester1->course_calender->course11 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 11" ;
                    return $this->semester_calender->semester1->course_calender->course11;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester1->course_calender->course10 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 10" ;
                    return $this->semester_calender->semester1->course_calender->course10;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester1->course_calender->course9 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 9" ;
                    return $this->semester_calender->semester1->course_calender->course9;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester1->course_calender->course8 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 8" ;
                    return $this->semester_calender->semester1->course_calender->course8;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester1->course_calender->course7 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 7" ;
                    return $this->semester_calender->semester1->course_calender->course7;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester1->course_calender->course6 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 6" ;
                    return $this->semester_calender->semester1->course_calender->course6;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester1->course_calender->course5 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 5" ;
                    return $this->semester_calender->semester1->course_calender->course5;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester1->course_calender->course4 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 4" ;
                    return $this->semester_calender->semester1->course_calender->course4;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester1->course_calender->course3 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 3" ;
                    return $this->semester_calender->semester1->course_calender->course3;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester1->course_calender->course2 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 2" ;
                    return $this->semester_calender->semester1->course_calender->course2;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester1->course_calender->course1 != null ){
                //return "Alo";
                if( $remaining - 7 <= 0 ){
                    //return "course 1" ;
                    return $this->semester_calender->semester1->course_calender->course1;
                }else{
                    $remaining -= 7;
                }
                return $remaining;
            }
        }elseif($the_semester == 2){

            if( $this->semester_calender->semester2->course_calender->course12 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 12" ;
                    return $this->semester_calender->semester2->course_calender->course12;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester2->course_calender->course11 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 11" ;
                    return $this->semester_calender->semester2->course_calender->course11;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester2->course_calender->course10 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 10" ;
                    return $this->semester_calender->semester2->course_calender->course10;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester2->course_calender->course9 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 9" ;
                    return $this->semester_calender->semester2->course_calender->course9;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester2->course_calender->course8 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 8" ;
                    return $this->semester_calender->semester2->course_calender->course8;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester2->course_calender->course7 != null ){
                if( $remaining - 7 <= 0 ){
                   // return "course 7" ;
                    return $this->semester_calender->semester2->course_calender->course7;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester2->course_calender->course6 != null ){
                if( $remaining - 7 <= 0 ){
                   // return "course 6" ;
                    return $this->semester_calender->semester2->course_calender->course6;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester2->course_calender->course5 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 5" ;
                    return $this->semester_calender->semester2->course_calender->course5;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester2->course_calender->course4 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 4" ;
                    return $this->semester_calender->semester2->course_calender->course4;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester2->course_calender->course3 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 3" ;
                    return $this->semester_calender->semester2->course_calender->course3;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester2->course_calender->course2 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 2" ;
                    return $this->semester_calender->semester2->course_calender->course2;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester2->course_calender->course1 != null ){
                //return "Alo";
                if( $remaining - 7 <= 0 ){
                    //return "course 1" ;
                    return $this->semester_calender->semester2->course_calender->course1;
                }else{
                    $remaining -= 7;
                }
                return $remaining;
            }

        }elseif($the_semester == 3){

            if( $this->semester_calender->semester3->course_calender->course12 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 12" ;
                    return $this->semester_calender->semester3->course_calender->course12;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester3->course_calender->course11 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 11" ;
                    return $this->semester_calender->semester3->course_calender->course11;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester3->course_calender->course10 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 10" ;
                    return $this->semester_calender->semester3->course_calender->course10;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester3->course_calender->course9 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 9" ;
                    return $this->semester_calender->semester3->course_calender->course9;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester3->course_calender->course8 != null ){
                if( $remaining - 7 <= 0 ){
                    // return "course 8" ;
                    return $this->semester_calender->semester3->course_calender->course8;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester3->course_calender->course7 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 7" ;
                    return $this->semester_calender->semester3->course_calender->course7;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester3->course_calender->course6 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 6" ;
                    return $this->semester_calender->semester3->course_calender->course6;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester3->course_calender->course5 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 5" ;
                    return $this->semester_calender->semester3->course_calender->course5;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester3->course_calender->course4 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 4" ;
                    return $this->semester_calender->semester3->course_calender->course4;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester3->course_calender->course3 != null ){
                if( $remaining - 7 <= 0 ){
                   // return "course 3" ;
                    return $this->semester_calender->semester3->course_calender->course3;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester3->course_calender->course2 != null ){
                if( $remaining - 7 <= 0 ){
                    //return "course 2" ;
                    return $this->semester_calender->semester3->course_calender->course2;
                }else{
                    $remaining -= 7;
                }
            }
            if( $this->semester_calender->semester3->course_calender->course1 != null ){
                //return "Alo";
                if( $remaining - 7 <= 0 ){
                    //return "course 1" ;
                    return $this->semester_calender->semester3->course_calender->course1;
                }else{
                    $remaining -= 7;
                }
                return $remaining;
            }

        }

    }

    public function all_courses(){

        $all_semesters = $this->semesters;
        $all_courses = array();
        foreach($all_semesters as $semester){
            foreach($semester->courses as $course){
                array_push($all_courses, $course );
            }
        }

        return $all_courses;
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

    // public function cycle(){
    //     return $this->belongsTo(Cycle::class);
    // }

    public function cycle(){
        return $this->hasOne(Cycle::class);
    }

    public function cycle_students(){
        $the_cycle = $this->cycle;
        $cycle_students = $the_cycle->students;
        $ids_array = array();
        foreach($cycle_students as $student){
            array_push($ids_array, $student->id);
        }
        return $ids_array;
    }

    public function request_to_project(){
        return $this->hasMany( RequestToProject::class);
    }

    public function semester_calender(){
        return $this->hasOne( SemesterCalender::class);
    }

    public function duration(){
        $project_semesters = $this->semesters;
        $duration_sum = 0;
        foreach( $project_semesters as $semester ){

            $duration_sum += $semester->duration;

        }

        return $duration_sum;
    }

    public function duration_with_breaks(){
        $project_semesters = $this->semester_calender;
        $duration_sum = 0;

        if($this->semester_calender->semester1 != null){
            $duration_sum += $this->semester_calender->semester1->duration;

            if($this->semester_calender->semester2 != null){
                $duration_sum += 4;
                $duration_sum += $this->semester_calender->semester2->duration;

                if($this->semester_calender->semester3 != null){
                    $duration_sum += 4;
                    $duration_sum += $this->semester_calender->semester3->duration;
                }

            }

        }


        return $duration_sum;
    }

}
