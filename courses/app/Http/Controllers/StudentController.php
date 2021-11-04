<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Models\Student;
use App\Models\Cycle;
use App\Models\Project;
use App\Models\CyclePayment;
use App\Models\Service;
use App\Models\ServicePayment;
use App\Models\Course;

class StudentController extends Controller
{

    // public function __construct()
    // {
    //     /* dd(Auth::check()); */ //return false : just want to show you

    //       $this->middleware('auth:student');
    // }

    public function index(){
        $all_students = Student::all();
        //$all_lessons = "Alo";
        
        //return $all_lessons;
        return view('admin.students.index')->with('students',$all_students) ;
    }

    public function add(Request $request){
        //return $request;

        $new_student = Student::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>json_encode($request->password),
            'phone1'=>$request->phone1,
            'phone2'=>$request->phone2,
            'case'=>$request->case,
            'country'=>$request->country,
            'status'=>$request->status,
            'passport'=>$request->passport,
            'job'=>$request->job,
            'general_note'=>$request->general_note,
            'payment_note'=>$request->payment_note,
            // 'due_date'=>$request->due_date,
            'money_paid'=>$request->money_paid,
            'money_to_pay'=>$request->money_to_pay,
        ]);
        
        return redirect()->back();

    }

    public function edit(Request $request){
        //return $request;
        //echo $request;
        $my_student = Student::find($request->id);
        //return $request->name;
        $my_student->name = $request->name;
        $my_student->email = $request->email;
        $my_student->password = Hash::make($request->password);
        // $my_student->password = json_encode($request->password);
        $my_student->case = $request->case;
        $my_student->phone1 = $request->phone1;
        $my_student->phone2 = $request->phone2;
        $my_student->status = $request->status;
        $my_student->passport = $request->passport;
        $my_student->job = $request->job;
        $my_student->country = $request->country;
        $my_student->general_note = $request->general_note;
        $my_student->payment_note = $request->payment_note;
        $my_student->money_paid = $request->money_paid;
        $my_student->money_to_pay = $request->money_to_pay;
        $my_student->cycle_id = $request->cycle_id;

        $c1 = Cycle::find($request->cycle_id);
        $c1->all_students()->attach($my_student->id);

        $my_student->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){

        $the_student = Student::find($request->id);



        $array[] = [
            'name' => $the_student->name ,
            'email' =>$the_student->email  ,
            'password' =>json_decode($the_student->password) ,
            'case' =>$the_student->case ,
            'phone1' =>$the_student->phone1 ,
            'phone2' =>$the_student->phone2 ,
            'status' =>$the_student->status ,
            'passport' =>$the_student->passport ,
            'job' =>$the_student->job ,
            'country' =>$the_student->country ,
            'general_note' =>$the_student->general_note ,
            'payment_note' =>$the_student->payment_note ,
            'money_paid' =>$the_student->money_paid ,
            'money_to_pay' =>$the_student->money_to_pay ,
            'cycle_id' =>$the_student->cycle_id ,
        ];

        return $array[0];

    }

    public function delete(Request $request){
        $my_student = Student::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_student->delete();
        //return $c;

        return redirect()->back();
    }

    public function all_projects(){
        $all_projects = Project::all();
        //return $all_projects;
        return view('student.all_projects')->with('projects',$all_projects) ;
    }

    public function phd_projects(){
        $php_projects = Project::where('type', 'phd')->get();

        return view('student.all_projects')->with('projects',$php_projects) ;
    }

    public function master_projects(){
        $master_projects = Project::where('type', 'master')->get();

        return view('student.all_projects')->with('projects',$master_projects) ;
    }

    public function diploma_projects(){
        $diploma_projects = Project::where('type', 'diploma')->get();

        return view('student.all_projects')->with('projects',$diploma_projects) ;
    }

    public function fellowship_projects(){
        $fellowship_projects = Project::where('type', 'fellowship')->get();

        return view('student.all_projects')->with('projects',$fellowship_projects) ;
    }

    public function project_details($id){

        $the_project = Project::find($id);
        $ids_array = $the_project->cycle_students();
        //return $ids_array;
        return view('student.project')->with(['project'=>$the_project, 'ids_array'=>$ids_array]);

    }

    public function my_courses($id){

        $s1 = Student::find($id);

        $all_cycles = $s1->all_cycles;

        return view('student.my_courses');

    }

    public function my_books(){

        

        return view('student.my_books');

    }

    public function my_payments(){

        

        return view('student.my_payments');

    }

    public function project_view($id){

        $the_project = Project::find($id);

        return view('student.project_view')->with('project',$the_project);

    }

    public function ask(){

        return view('student.ask');

    }

}
