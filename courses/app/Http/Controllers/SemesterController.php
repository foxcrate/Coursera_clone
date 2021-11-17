<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Project;
use App\Models\Course;
use App\Models\CourseCalender;
use Illuminate\Support\Facades\Auth;

class SemesterController extends Controller
{

    public function index(){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        $all_semesters = Semester::orderBy('id','desc')->paginate(11);

        //return $all_semesters;
        return view('admin.semesters.index')->with('semesters',$all_semesters) ;
    }

    public function add(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        //return $request;

        $new_semester = Semester::create([
            'name'=>$request->name,
            'duration'=>$request->duration,
        ]);

        return redirect()->back();

    }

    public function edit(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
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
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        //return $request;
        $my_semester = Semester::find($request->semester_id);
        $current_courses_array = [];
        if( count($my_semester->courses) > 0){
            foreach( $my_semester->courses as $course ){
                array_push( $current_courses_array , $course->id );
            }

            $my_semester->courses()->detach($current_courses_array);
        }

        $ccs = CourseCalender::where('semester_id',$request->semester_id)->get();

        foreach( $ccs as $cc ){
            $cc->delete();
        }

        $course1_id = null;
        $course2_id = null;
        $course3_id = null;
        $course4_id = null;
        $course5_id = null;
        $course6_id = null;
        $course7_id = null;
        $course8_id = null;
        $course9_id = null;
        $course10_id = null;
        $course11_id = null;
        $course12_id = null;

        if( $request->first_course != "null" ){
            $c1 = Course::find($request->first_course);
            $my_semester->courses()->attach( $c1->id );
            $course1_id = $request->first_course ;
        }
        if( $request->second_course != "null" ){
            $c1 = Course::find($request->second_course);
            $my_semester->courses()->attach( $c1->id );
            $course2_id = $request-> second_course;
        }
        if( $request->third_course != "null" ){
            $c1 = Course::find($request->third_course);
            $my_semester->courses()->attach( $c1->id );
            $course3_id = $request->third_course ;
        }
        if( $request->forth_course != "null" ){
            $c1 = Course::find($request->forth_course);
            $my_semester->courses()->attach( $c1->id );
            $course4_id = $request->forth_course ;
        }

        if( $request->fifth_course != "null" ){
            $c1 = Course::find($request->fifth_course);
            $my_semester->courses()->attach( $c1->id );
            $course5_id = $request->fifth_course ;
        }
        if( $request->sixth_course != "null" ){
            $c1 = Course::find($request->sixth_course);
            $my_semester->courses()->attach( $c1->id );
            $course6_id = $request-> sixth_course;
        }
        if( $request->seventh_course != "null" ){
            $c1 = Course::find($request->seventh_course);
            $my_semester->courses()->attach( $c1->id );
            $course7_id = $request->seventh_course ;
        }
        if( $request->eighth_course != "null" ){
            $c1 = Course::find($request->eighth_course);
            $my_semester->courses()->attach( $c1->id );
            $course8_id = $request->eighth_course ;
        }
        if( $request->ninth_course != "null" ){
            $c1 = Course::find($request->ninth_course);
            $my_semester->courses()->attach( $c1->id );
            $course9_id = $request->ninth_course ;
        }
        if( $request->tenth_course != "null" ){
            $c1 = Course::find($request->tenth_course);
            $my_semester->courses()->attach( $c1->id );
            $course10_id = $request-> tenth_course;
        }
        if( $request->eleventh_course != "null" ){
            $c1 = Course::find($request->eleventh_course);
            $my_semester->courses()->attach( $c1->id );
            $course11_id = $request->eleventh_course ;
        }
        if( $request->twelfth_course != "null" ){
            $c1 = Course::find($request->twelfth_course);
            $my_semester->courses()->attach( $c1->id );
            $course12_id = $request->twelfth_course ;
        }

        if($course1_id != null && $course2_id != null && $course3_id != null  && $course4_id != null && $course5_id != null && $course6_id != null && $course7_id != null && $course8_id != null && $course9_id != null && $course10_id != null && $course11_id != null && $course12_id != null){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
                'course2_id' => $course2_id ,
                'course3_id' => $course3_id ,
                'course4_id' => $course4_id ,
                'course5_id' => $course5_id ,
                'course6_id' => $course6_id ,
                'course7_id' => $course7_id ,
                'course8_id' => $course8_id ,
                'course9_id' => $course9_id ,
                'course10_id' => $course10_id ,
                'course11_id' => $course11_id ,
                'course12_id' => $course12_id ,
            ]);
        }elseif( $course1_id != null && $course2_id != null && $course3_id != null  && $course4_id != null && $course5_id != null && $course6_id != null && $course7_id != null && $course8_id != null && $course9_id != null && $course10_id != null && $course11_id != null ){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
                'course2_id' => $course2_id ,
                'course3_id' => $course3_id ,
                'course4_id' => $course4_id ,
                'course5_id' => $course5_id ,
                'course6_id' => $course6_id ,
                'course7_id' => $course7_id ,
                'course8_id' => $course8_id ,
                'course9_id' => $course9_id ,
                'course10_id' => $course10_id ,
                'course11_id' => $course11_id ,
            ]);
        }elseif($course1_id != null && $course2_id != null && $course3_id != null  && $course4_id != null && $course5_id != null && $course6_id != null && $course7_id != null && $course8_id != null && $course9_id != null && $course10_id != null ){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
                'course2_id' => $course2_id ,
                'course3_id' => $course3_id ,
                'course4_id' => $course4_id ,
                'course5_id' => $course5_id ,
                'course6_id' => $course6_id ,
                'course7_id' => $course7_id ,
                'course8_id' => $course8_id ,
                'course9_id' => $course9_id ,
                'course10_id' => $course10_id ,
            ]);
        }elseif( $course1_id != null && $course2_id != null && $course3_id != null  && $course4_id != null && $course5_id != null && $course6_id != null && $course7_id != null && $course8_id != null && $course9_id != null ){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
                'course2_id' => $course2_id ,
                'course3_id' => $course3_id ,
                'course4_id' => $course4_id ,
                'course5_id' => $course5_id ,
                'course6_id' => $course6_id ,
                'course7_id' => $course7_id ,
                'course8_id' => $course8_id ,
                'course9_id' => $course9_id ,
            ]);
        }
        elseif($course1_id != null && $course2_id != null && $course3_id != null  && $course4_id != null && $course5_id != null && $course6_id != null && $course7_id != null && $course8_id != null){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
                'course2_id' => $course2_id ,
                'course3_id' => $course3_id ,
                'course4_id' => $course4_id ,
                'course5_id' => $course5_id ,
                'course6_id' => $course6_id ,
                'course7_id' => $course7_id ,
                'course8_id' => $course8_id ,
            ]);
        }
        elseif($course1_id != null && $course2_id != null && $course3_id != null  && $course4_id != null && $course5_id != null && $course6_id != null && $course7_id != null){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
                'course2_id' => $course2_id ,
                'course3_id' => $course3_id ,
                'course4_id' => $course4_id ,
                'course5_id' => $course5_id ,
                'course6_id' => $course6_id ,
                'course7_id' => $course7_id ,
            ]);
        }
        elseif($course1_id != null && $course2_id != null && $course3_id != null  && $course4_id != null && $course5_id != null && $course6_id != null){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
                'course2_id' => $course2_id ,
                'course3_id' => $course3_id ,
                'course4_id' => $course4_id ,
                'course5_id' => $course5_id ,
                'course6_id' => $course6_id ,
            ]);
        }
        elseif($course1_id != null && $course2_id != null && $course3_id != null  && $course4_id != null && $course5_id != null){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
                'course2_id' => $course2_id ,
                'course3_id' => $course3_id ,
                'course4_id' => $course4_id ,
                'course5_id' => $course5_id ,
            ]);
        }
        elseif($course1_id != null && $course2_id != null && $course3_id != null  && $course4_id != null){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
                'course2_id' => $course2_id ,
                'course3_id' => $course3_id ,
                'course4_id' => $course4_id ,
            ]);
        }
        elseif($course1_id != null && $course2_id != null && $course3_id != null){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
                'course2_id' => $course2_id ,
                'course3_id' => $course3_id ,
            ]);
        }
        elseif($course1_id != null && $course2_id != null){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
                'course2_id' => $course2_id ,
            ]);
        }
        elseif($course1_id != null){
            $cc = CourseCalender::create([
                'semester_id' => $my_semester->id,
                'course1_id' => $course1_id ,
            ]);
        }

        return back()->with('good_msg',"Courses Saved Successfully");


        //     $x = $request->courses_array;
        //     for( $i=0 ; $i<count($x) ; $i++ ){
        //         $x[$i] = (int)$x[$i] ;
        //     }
        //     $my_semester->courses()->attach($x);

        // }else{
        //     $current_courses_array = [];

        //     if( count($my_semester->courses) > 0){
        //         foreach( $my_semester->courses as $course ){
        //             array_push( $current_courses_array , $course->id );
        //         }

        //         $my_semester->courses()->detach($current_courses_array);
        //     }
        // }
        //$all_semesters = Semester::all();


    }

    public function details($id){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }

        $semester = Semester::find($id);
        $semester_courses = $semester->courses ;
        $all_courses = Course::all();

        $array_of_courses = array();
        $x=count($semester_courses);
        for($i = 0;$i<=$x-1;$i++){
            array_push($array_of_courses ,$semester_courses[$i]->id );
        }

        //return $array_of_semesters;
        return view('admin.semesters.details')->with(['all_courses'=>$all_courses , 'semester'=>$semester , 'array_of_courses'=>$array_of_courses ]) ;

    }

    public function delete(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        $my_semester = Semester::find($request->id);
        // $my_semester = Semester::destroy($request->id);
        // return $my_semester;
        $c = $my_semester->delete();
        //return $c;

        return response(200);;
    }

    public function data_to_edit(Request $req){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        $project = Semester::find($req->id);
        return $project;
    }

}
