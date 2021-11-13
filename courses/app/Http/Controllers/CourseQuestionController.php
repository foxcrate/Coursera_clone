<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseQuestion;

class CourseQuestionController extends Controller
{

    public function index3(){
        $all_courses = Course::all();
        $all_course_question= CourseQuestion::orderBy('id','desc')->paginate(11);
        //$all_lessons = "Alo";

        //return $all_lessons;
        return view('admin.course_question.index')->with([ 'all_course_question'=>$all_course_question , 'all_courses'=>$all_courses ]) ;
    }

    public function index(Request $request){
        // $info = [
        //     "draw"=> $request->draw,
        //     "data"=> [],
        //     "total" => 0,
        // ];
        // return $info;
        $all_courses = Course::all();

        return view('admin.course_question.index2')->with([ 'all_courses'=>$all_courses ]);
    }

    public function index2(Request $request){
        //return $request->start;
        $info = [
            'draw' => $request->draw,
            'data' => [],
            'total' => 0,
        ];

        $search = $request->input('search.value');

        $course_questions = CourseQuestion::where( function($query) use ( $search ) {
            $query->where( "question", "LIKE", "%".$search."%" );
        } )->take( $request->length )->skip( $request->start )->get();

        $info['total'] = CourseQuestion::where( function($query) use ( $search ) {
            $query->where( "question", "LIKE", "%".$search."%" );
        } )->count();

        $sl_no_counter = ( $request->start == 0 )? 1 : $request->start+1;

        foreach( $course_questions as $course_question ){
            $course_question->sl_no = $sl_no_counter;
            $sl_no_counter++;
        }

        $info['data'] = $course_questions;

        return $info;

        //return view('admin.course_question.index2');
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
