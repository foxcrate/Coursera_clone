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

        // $t1 = Teacher::create([
        //     'name'=>'one',
        //     'image'=>'one',
        //     'bio'=>'one',
        // ]);
        // $t2 = Teacher::create([
        //     'name'=>'one',
        //     'image'=>'one',
        //     'bio'=>'one',
        // ]);
        // $t3 = Teacher::create([
        //     'name'=>'one',
        //     'image'=>'one',
        //     'bio'=>'one',
        // ]);
        // $t4 = Teacher::create([
        //     'name'=>'one',
        //     'image'=>'one',
        //     'bio'=>'one',
        // ]);
    
        $c1 = Course::find(1);
        // $c1->teachers()->attach([$t1->id,$t2->id]);
        return $c1->teachers;

    }
}