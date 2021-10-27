<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonQuestion;

class LessonController extends Controller
{

    public function index(){
        $all_lessons = Lesson::all();
        //$all_lessons = "Alo";
        
        //return $all_lessons;
        return view('admin.lessons.index')->with('lessons',$all_lessons) ;
    }

    public function add(Request $request){
        //return $request;

        if ($request->hasFile('video')) {
            //$destinationPath = 'path/th/save/file/';
            $video = $request->video;
            $code = rand(1111111, 9999999);
            $video_new_name=time().$code ."lv.mp4";
            $video->move('uploads/lessons/', $video_new_name);
            //$new_project->video ='uploads/lessons/' . $video_new_name;
        }

        $new_course = Lesson::create([
            'name'=>$request->name,
            'order'=>$request->order,
            'description'=>$request->description,
            'video'=> 'uploads/lessons/' . $video_new_name,
            'course_id'=>$request->id,
        ]);
        
        return redirect()->back();

    }

    public function edit(Request $request){
        //return $request;
        //echo $request;
        $my_lesson = Lesson::find($request->id);
        //return $request->name;
        $my_lesson->name = $request->name ;
        $my_lesson->order = $request->order ;
        $my_lesson->description = $request->description ;
        //$my_lesson->video = $request->video ;
        if ($request->hasFile('video')) {
            //$destinationPath = 'path/th/save/file/';
            $video = $request->video;
            $code = rand(1111111, 9999999);
            $video_new_name=time().$code ."lv.mp4";
            $video->move('uploads/lessons/', $video_new_name);
            $my_lesson->video ='uploads/lessons/' . $video_new_name;
        }
        $my_lesson->save();

        return redirect()->back();
    }

    // public function details($id){

    //     $course = Course::find($id);
    //     $course_lessons = $course->lessons ;
    //     $all_lessons = Lesson::all();

    //     $array_of_lessons = array();
    //     $x=count($course_lessons);
    //     for($i = 0;$i<=$x-1;$i++){
    //         array_push($array_of_lessons ,$course_lessons[$i]->id );
    //     }
    //     $elequent_lessons = Lesson::whereIn('id', $array_of_lessons)->orderBy('order','ASC')->get();
        
    //     //return $elequent_lessons;
    //     return view('admin.courses.details')->with(['lessons'=>$all_lessons , 'course'=>$course , 'array_of_lessons'=>$array_of_lessons, 'elequent_lessons'=>$elequent_lessons ]) ;

    // }

    public function data_to_edit(Request $request){

        $the_lesson = Lesson::find($request->id);

        return $the_lesson;

    }

    public function delete(Request $request){
        $my_lesson = Lesson::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_lesson->delete();
        //return $c;

        return response(200);;
    }

}
