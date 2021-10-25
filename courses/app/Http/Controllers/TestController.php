<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Calender;
use App\Models\Course;
use App\Models\Cycle;
use App\Models\CourseQuestion;
use App\Models\Student;
use App\Models\Lesson;
use App\Models\LessonQuestion;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\Project;
use App\Models\UploadedResearch;

class TestController extends Controller
{
    public function test(){
     
        {
            $s1 = Semester::find(1);
            $s2 = Semester::find(2);
            $s3 = Semester::find(3);
            $s4 = Semester::find(4);
            $s5 = Semester::find(5);

            $p1 = Project::find(2);
            $p2 = Project::find(3);

            $p1->semesters()->attach($s3);
            $p1->semesters()->attach($s4);

            //dd($p1, $s1, $s2);
            return $p1->semesters;

            
        }
       

    }
}