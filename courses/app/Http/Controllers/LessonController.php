<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonQuestion;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{

    public function index(){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        $all_lessons = Lesson::all();
        //$all_lessons = "Alo";

        //return $all_lessons;
        return view('admin.lessons.index')->with('lessons',$all_lessons) ;
    }

    public function add(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        //return $request;

        if ($request->hasFile('video')) {
            //$destinationPath = 'path/th/save/file/';
            $video = $request->video;
            $code = rand(1111111, 9999999);
            $video_new_name=time().$code ."lv.mp4";
            $video->move('uploads/lessons/', $video_new_name);
            //$new_project->video ='uploads/lessons/' . $video_new_name;
        }

        $new_lesson = Lesson::create([
            'name'=>$request->name,
            'order'=>$request->order,
            'description'=>$request->description,
            'video'=> 'uploads/lessons/' . $video_new_name,
            'youtube_link'=> $request->youtube_link,
            'course_id'=>$request->id,
        ]);

        $new_lesson_question = LessonQuestion::create([
            'lesson_id'=> $new_lesson->id,
            'question' => $request->question ,
            'first_answer' => $request->first_answer ,
            'second_answer' => $request->second_answer ,
            'correct_answer' => $request->correct_answer ,
        ]);

        return redirect()->back();

    }

    public function edit(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
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
        $my_lesson->youtube_link = $request->youtube_link ;
        $my_lesson->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }

        $the_lesson = Lesson::find($request->id);

        $the_lesson_question = $the_lesson->question;

        $data = [
            'lesson'=>$the_lesson,
            'lesson_question'=>$the_lesson_question,
        ];

        return $data;

    }

    public function delete(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        $my_lesson = Lesson::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_lesson->delete();
        //return $c;

        return redirect()->back();
    }

}
