<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Project;
use App\Models\Semester;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonQuestion;
use Illuminate\Support\Facades\DB;

//////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////

// , withHeadingRow
class ExcelImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key=>$row){
            // $c1 = Course::find($row['course_id']);
            // $the_order = (int)$row['order'];
           
            // $l1 = Lesson::create([
            //     'id'=>$row['id'],
            //     'name'=>$row['lesson_title'],
            //     'description'=>$row['lesson_desc'],
            //     'image'=>$row['lesson_pic'],
            //     'video'=>$row['lesson_video'],
            //     'course_id'=>$row['course_id'],
            // ]);

            // $lq = LessonQuestion::create([

            //     'question'=>$row['question'],
            //     'first_answer'=>$row['choice1'],
            //     'second_answer'=>$row['choice2'],
            //     'correct_answer'=>$row['correct_answer'],
            //     'lesson_id'=>$l1->id,

            // ]);

            // $u1 = User::create([
            //     'name'=>$row['name'],
            //     'email'=>$row['email'],
            //     'password'=> hash::make("123456789") ,
            // ]);

        }
        $u1 = User::create([
            'name'=>$collection[0]['course_title'],
            'email'=>'bww3o@bgtt.com',
            'password'=> hash::make("123456789") ,
        ]);
        //dd($collection[0]);
        
        
    }
}
