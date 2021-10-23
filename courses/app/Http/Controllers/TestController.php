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
            // $c = Cycle::create([
            //     'name'=> 'first',
            //     'start_date'=> '2021-10-21',
            // ]);

            // $p = new Project();
            // $p->name = 'first';
            // $p->image = 'first';
            // $p->type = 'php';
            // $p->video = 'first';
            // $p->price = 23;
            // $p->summery = 'first';
            // //$p->cycle_id = $c->id ;
            // $p->save();

            // $c = Cycle::find(1);
            // $p = Project::find(9);

            // dd($c->projects);

            // $c1 = Course::find(1);
            // $c2 = Course::find(2);
            // $c3 = Course::find(3);

            // $t1 = Teacher::find(1);
            // $t2 = Teacher::find(2);
            // $t3 = Teacher::find(3);

            // $c1->teachers()->attach($t2);
            // $c1->teachers()->attach($t2);
            // $t1->courses()->attach($c1);
            // $t1->courses()->attach($c2);

            // return($t1->courses);
        }

    $all_cycles = Cycle::all();
    return $all_cycles;        

    }
}