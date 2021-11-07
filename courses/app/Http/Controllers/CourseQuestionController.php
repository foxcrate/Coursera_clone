<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseQuestion;

class CourseQuestionController extends Controller
{
    
    public function index(){
        $all_courses = Course::all();
        $all_course_question= CourseQuestion::orderBy('id','desc')->paginate(8);
        //$all_lessons = "Alo";
        
        //return $all_lessons;
        return view('admin.course_question.index')->with([ 'all_course_question'=>$all_course_question , 'all_courses'=>$all_courses ]) ;
    }

    public function add(Request $request){
        //return $request;

        if( !$request->has('third_answer') ){
            $third_answer = null;
        }else{
            $third_answer = $request->third_answer;
        }
        
        if( !$request->has('fourth_answer') ){
            $fourth_answer = null;
        }else{
            $fourth_answer = $request->fourth_answer;
        }

        $new_course_question = CourseQuestion::create([
            'question'=>$request->question,
            'first_answer'=>$request->first_answer,
            'second_answer'=>$request->second_answer,
            'third_answer'=>$third_answer,
            'fourth_answer'=>$fourth_answer,
            'correct_answer'=>$request->correct_answer,
            'course_id'=>$request->course_id,
        ]);
        
        return redirect()->back();

    }

    public function edit(Request $request){
        //return $request;

        if( !$request->has('third_answer') ){
            $third_answer = null;
        }else{
            $third_answer = $request->third_answer;
        }
        
        if( !$request->has('fourth_answer') ){
            $fourth_answer = null;
        }else{
            $fourth_answer = $request->fourth_answer;
        }

        $my_course_question = CourseQuestion::find($request->id);

        $my_course_question->question = $request->question ;
        $my_course_question->first_answer = $request->first_answer ;
        $my_course_question->second_answer = $request->second_answer ;
        $my_course_question->third_answer = $third_answer ;
        $my_course_question->fourth_answer = $fourth_answer ;
        $my_course_question->correct_answer = $request->correct_answer ;
        $my_course_question->course_id = $request->course_id ;

        $my_course_question->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){

        $my_course_question = CourseQuestion::find($request->id);

        return $my_course_question;

    }

    public function delete(Request $request){
        $my_course_question = CourseQuestion::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_course_question->delete();
        //return $c;

        return redirect()->back();
    }

}
