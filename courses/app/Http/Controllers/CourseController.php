<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function index(){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        // $all_courses = Course::all();
        $all_courses = Course::orderBy('id','desc')->paginate(11);
        //$all_courses = "Alo";

        //return $all_courses;
        return view('admin.courses.index')->with('courses',$all_courses) ;
    }

    public function add(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        //return $request;

        $the_material = null;

        if($request->has('material')){

            $material = $request->material;
            $code = rand(1111111, 9999999);
            $material_new_name=time().$code ."pp";
            $material->move('uploads/courses/', $material_new_name);
            $the_material ='uploads/courses/' . $material_new_name;

        }

        $new_course = Course::create([
            'name'=>$request->name,
            'material'=> $the_material,
            'description'=>$request->description,
        ]);

        return redirect()->back();

    }

    public function edit(Request $request){
        //return $request;
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }

        $my_course = Course::find($request->id);
        $the_material = null;
        if($request->has('material')){

            $material = $request->material;
            $code = rand(1111111, 9999999);
            $material_new_name=time().$code ."pp";
            $material->move('uploads/courses/', $material_new_name);
            $my_course->material ='uploads/courses/' . $material_new_name;

        }

        //return $request;
        //echo $request;
        //$my_course = Course::find($request->id);
        //return $request->name;
        $my_course->name = $request->name;
        $my_course->description = $request->description;

        if($request->has('teachers_array')){
            //return $request->semesters_array;
            $current_teachers_array = [];
            // return $my_project->semesters[0]->id;

            if( count($my_course->teachers) > 0){
                foreach( $my_course->teachers as $teacher ){
                    array_push( $current_teachers_array , $teacher->id );
                }

                $my_course->teachers()->detach($current_teachers_array);
            }
            //return $request->semesters_array;
            // $x= explode(",",$request->semesters_array);
            $x = $request->teachers_array;
            for( $i=0 ; $i<count($x) ; $i++ ){
                $x[$i] = (int)$x[$i] ;
            }
            $my_course->teachers()->attach($x);

        }else{
            $current_teachers_array = [];
            // return $my_project->semesters[0]->id;

            if( count($my_course->teachers) > 0){
                foreach( $my_course->teachers as $teacher ){
                    array_push( $current_teachers_array , $teacher->id );
                }

                $my_course->teachers()->detach($current_teachers_array);
            }
        }

        $my_course->save();

        return redirect()->back();
    }

    public function details($id){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }

        $course = Course::find($id);
        $course_lessons = $course->lessons ;
        $all_lessons = Lesson::all();
        $all_teachers = Teacher::all();
        $course_teachers = $course->teachers ;

        $array_of_teachers = array();
        $y=count($course_teachers);
        for($i = 0;$i<=$y-1;$i++){
            array_push($array_of_teachers ,$course_teachers[$i]->id );
        }

        $array_of_lessons = array();
        $x=count($course_lessons);
        for($i = 0;$i<=$x-1;$i++){
            array_push($array_of_lessons ,$course_lessons[$i]->id );
        }
        $elequent_lessons = Lesson::whereIn('id', $array_of_lessons)->orderBy('order','ASC')->get();

        //return $elequent_lessons;
        return view('admin.courses.details')->with(['lessons'=>$all_lessons , 'course'=>$course , 'array_of_lessons'=>$array_of_lessons, 'elequent_lessons'=>$elequent_lessons, 'all_teachers'=>$all_teachers, 'array_of_teachers'=>$array_of_teachers ]) ;

    }

    public function delete(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        $my_course = Course::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_course->delete();
        //return $c;

        return true;
    }

    public function data_to_edit(Request $req){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        $course = Course::find($req->id);
        return $course;
    }

}
