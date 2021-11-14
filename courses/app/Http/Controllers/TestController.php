<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Calender;
use App\Models\Course;
use App\Models\Cycle;
use App\Models\CourseQuestion;
use App\Models\Student;
use App\Models\Book;
use App\Models\User;
use App\Models\CyclePayment;
use App\Models\Lesson;
use App\Models\LessonQuestion;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\Assignment;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServicePayment;
use App\Models\UploadedResearch;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

class TestController extends Controller
{
    public function test1(){

        //$s1 = Student::find(6);
        // $s2 = Student::find(3);

        //$c1 = Cycle::find(10);

        //return $s1->all_cycles[0]->project->semesters_num();

        // return $s1->cycle;

        // $c1 = Cycle::find(4);

        // return $c1->project->image;

        // $c1 = Cycle::create([

        //     'name'=>'Second Cycle',
        //     'start_date'=>'2022-1-1',

        // ]);

        //return Cycle::all();

        $s1 = Student::find(2);
        // $c2 = Cycle::find(2);
        //$c1 = Cycle::find(1);

        $s1->all_cycles()->sync(1);
        // $c1->all_students()->attach($s1->id);
        //return $s1->all_cycles;
        $all_semesters = Semester::all();

        foreach($all_semesters as $semester){
            //return $semester;
            if($semester->course_calender->course12 != null){
                $semester->duration = 12;
                $semester->save();
            }elseif($semester->course_calender->course11 != null){
                $semester->duration = 11;
                $semester->save();
            }elseif($semester->course_calender->course10 != null){
                $semester->duration = 10;
                $semester->save();
            }elseif($semester->course_calender->course9 != null){
                $semester->duration = 9;
                $semester->save();
            }elseif($semester->course_calender->course8 != null){
                $semester->duration = 8;
                $semester->save();
            }elseif($semester->course_calender->course7 != null){
                $semester->duration = 7;
                $semester->save();
            }elseif($semester->course_calender->course6 != null){
                $semester->duration = 6;
                $semester->save();
            }elseif($semester->course_calender->course5 != null){
                $semester->duration = 5;
                $semester->save();
            }elseif($semester->course_calender->course4 != null){
                $semester->duration = 4;
                $semester->save();
            }elseif($semester->course_calender->course3 != null){
                $semester->duration = 3;
                $semester->save();
            }elseif($semester->course_calender->course2 != null){
                $semester->duration = 2;
                $semester->save();
            }elseif($semester->course_calender->course1 != null){
                $semester->duration = 1;
                $semester->save();
            }
            else{
                $semester->duration = 0;
                $semester->save();
            }

        }
        return "Done";

        // $u1 = User::create([
        //     'name'=>'aaa',
        //     'email'=>'wwee@wee.com',
        //     'password'=>hash::make("12345"),
        // ]);

        // return $u1;

        //$s2->books()->attach([$c1->id,$c2->id]);
        // $p1->cycle_id = $c1->id;
        // $p1->save();
        //return $s2->cycles;

        // $c1 = Course::find(1);
        // $c1->teachers()->attach([$t1->id,$t3->id]);

    }

    public function test(){

        /////////////////////////////////////////////////////////////////////////////
        //   $services = array(
        //     array('id' => '1','photo' => '1589114989.jpg','title' => 'بحث مشترك ','cost' => '500','intro' => '<p><br></p>','content' => '<p><br></p>','created_at' => '2020-05-10 12:49:49','updated_at' => '2020-05-10 12:49:49'),
        //     array('id' => '2','photo' => '1589115306.png','title' => 'ترجمة ملخص رسالة باللغة الانجليزية','cost' => '100','intro' => '<p><br></p>','content' => '<p><br></p>','created_at' => '2020-05-10 12:55:06','updated_at' => '2020-05-10 12:55:06'),
        //     array('id' => '3','photo' => '1589115348.png','title' => 'ترجمة كاملة لرسالة باللغة الانجليزية','cost' => '400','intro' => '<p><br></p>','content' => '<p><br></p>','created_at' => '2020-05-10 12:55:48','updated_at' => '2020-05-10 12:55:48'),
        //     array('id' => '4','photo' => '1589115671.png','title' => 'طباعة وتجليد الرسالة ','cost' => '50','intro' => '<p><br></p>','content' => '<p><br></p>','created_at' => '2020-05-10 12:56:24','updated_at' => '2020-05-10 13:01:11'),
        //     array('id' => '5','photo' => '1589115805.jpg','title' => 'المساعدة فى إعداد الجزء العملي ','cost' => '250','intro' => '<p><br></p>','content' => '<p><br></p>','created_at' => '2020-05-10 13:03:25','updated_at' => '2020-05-10 13:03:25'),
        //     array('id' => '6','photo' => '1589115997.jpg','title' => 'التحليل الاحصائي ','cost' => '250','intro' => '<p><br></p>','content' => '<p><br></p>','created_at' => '2020-05-10 13:06:37','updated_at' => '2020-05-10 13:06:37'),
        //     array('id' => '7','photo' => '1589116072.jpg','title' => 'المساعدة فى إعداد الجزء النظري','cost' => '250','intro' => '<p><br></p>','content' => '<p><br></p>','created_at' => '2020-05-10 13:07:52','updated_at' => '2020-05-10 13:07:52'),
        //     array('id' => '8','photo' => '1589116201.jpg','title' => 'المساعدة فى التدقيق اللغوي للرسالة ','cost' => '100','intro' => '<p><br></p>','content' => '<p><br></p>','created_at' => '2020-05-10 13:10:01','updated_at' => '2020-05-10 13:10:01'),
        //     array('id' => '9','photo' => '1589116295.jpg','title' => 'المساعدة فى تنسيق الرسالة ككل ','cost' => '100','intro' => '<p><br></p>','content' => '<p><br></p>','created_at' => '2020-05-10 13:11:35','updated_at' => '2020-05-10 13:11:35')
        //   );
        ////////////////////////////////////////////////////////////////////////////

        //   foreach($services as $service){

        //     $s = Service::create([
        //         'id'=>$service['id'],
        //         'photo'=>$service['photo'],
        //         'name'=>$service['title'],
        //         'cost'=>$service['cost'],
        //         'summery'=>$service['intro'],
        //         'details'=>$service['content'],
        //     ]);

        //   }

        // $as = Assignment::create([
        //     'start_date'=> '2020-3-3' ,
        //     'end_date'=> '2020-3-3' ,
        //     'grade'=> 80 ,
        //     'semester_or_course'=> 'semester' ,
        //     'student_id'=> 2 ,
        //     'cycle_id'=> 1 ,
        //     'project_id'=> 116 ,
        //     'semester_id'=> 898 ,
        //     'course_id'=> 41 ,
        // ]);
        // return $as ;

        return "done";

    }

}
