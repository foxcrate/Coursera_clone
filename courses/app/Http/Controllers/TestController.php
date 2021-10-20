<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calender;
use App\Models\Course;
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
     
        
        $c = Course::find(1);
        $l = Lesson::find(1);

        $c->lesson = $l;


        
        dd($c);


    }
}