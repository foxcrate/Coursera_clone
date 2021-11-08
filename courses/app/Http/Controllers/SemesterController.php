<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Project;
use App\Models\Course;

class SemesterController extends Controller
{
    
    public function index(){
        $all_semesters = Semester::orderBy('id','desc')->paginate(11);
        
        //return $all_semesters;
        return view('admin.semesters.index')->with('semesters',$all_semesters) ;
    }

    public function add(Request $request){
        //return $request;

        $new_semester = Semester::create([
            'name'=>$request->name,
            'duration'=>$request->duration,
        ]);
        
        return redirect()->back();

    }

    public function edit(Request $request){
        //return $request;
        //echo $request;
        $my_semester = Semester::find($request->id);
        //return $request->name;
        $my_semester->name = $request->name;
        $my_semester->duration = $request->duration;
        $my_semester->save();

        return redirect()->back();
    }

    public function mass_edit(Request $request){
        //return $request;
        $my_semester = Semester::find($request->id);

        if($request->has('courses_array')){
            //return $request->semesters_array;
            $current_courses_array = [];
            // return $my_project->semesters[0]->id;

            if( count($my_semester->courses) > 0){
                foreach( $my_semester->courses as $course ){
                    array_push( $current_courses_array , $course->id );
                }
                
                $my_semester->courses()->detach($current_courses_array);
            }
            //return $request->semesters_array;
            // $x= explode(",",$request->semesters_array);
            $x = $request->courses_array;
            for( $i=0 ; $i<count($x) ; $i++ ){
                $x[$i] = (int)$x[$i] ;
            }
            $my_semester->courses()->attach($x);

        }else{
            $current_courses_array = [];
            // return $my_project->semesters[0]->id;

            if( count($my_semester->courses) > 0){
                foreach( $my_semester->courses as $course ){
                    array_push( $current_courses_array , $course->id );
                }
                
                $my_semester->courses()->detach($current_courses_array);
            }
        }

        $all_semesters = Semester::all();
        return view('admin.semesters.index')->with('semesters',$all_semesters) ;

    }

    public function details($id){

        $semester = Semester::find($id);
        $semester_courses = $semester->courses ;
        $all_courses = Course::all();

        $array_of_courses = array();
        $x=count($semester_courses);
        for($i = 0;$i<=$x-1;$i++){
            array_push($array_of_courses ,$semester_courses[$i]->id );
        }
        
        //return $array_of_semesters;
        return view('admin.semesters.details')->with(['courses'=>$all_courses , 'semester'=>$semester , 'array_of_courses'=>$array_of_courses ]) ;

    }

    public function delete(Request $request){
        $my_semester = Semester::find($request->id);
        // $my_semester = Semester::destroy($request->id);
        // return $my_semester;
        $c = $my_semester->delete();
        //return $c;

        return response(200);;
    }

    public function data_to_edit(Request $req){
        $project = Semester::find($req->id);
        return $project;
    }

}
