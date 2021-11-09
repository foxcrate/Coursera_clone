<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Models\Student;
use App\Models\Cycle;
use App\Models\Book;
use App\Models\Project;
use App\Models\CyclePayment;
use App\Models\BookPayment;
use App\Models\RequestToProject;
use App\Models\Service;
use App\Models\ServicePayment;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    // public function __construct()
    // {
    //     /* dd(Auth::check()); */ //return false : just want to show you

    //       $this->middleware('auth:student');
    // }

    public function index(){
        $all_students = Student::orderBy('id','desc')->paginate(5);
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
        $my_student->password2 =$request->password;
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
        if($request->cycle_id != null){
            $c1 = Cycle::find($request->cycle_id);
            $c1->all_students()->attach($my_student->id);
        }

        $my_student->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){

        $the_student = Student::find($request->id);



        $array[] = [
            'name' => $the_student->name ,
            'email' =>$the_student->email  ,
            'password' =>json_decode($the_student->password) ,
            'password2' =>$the_student->password2 ,
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

    public function project_details($student_id,$project_id){
        //return [$student_id,$project_id];
        $requests_to_projects = RequestToProject::where( 'project_id' , $project_id )->where('student_id',$student_id)->get();
        //return $requests_to_projects;
        $the_project = Project::find($project_id);
        $ids_array=[];
        if(count($requests_to_projects) > 0){
            //return "You have Already Requested this project";
            return view('student.project')->with( ['project'=>$the_project,'already_requested'=>1,'ids_array'=>$ids_array,] );
        }
        //$ids_array = [];
        if($student_id != 0){
            $the_student = Student::find($student_id);
            $ids_array = $the_student->all_cycles_array();
        }
        //return $ids_array ;
        //return $ids_array;
        return view('student.project')->with(['project'=>$the_project, 'ids_array'=>$ids_array,'already_requested'=>0]);

    }

    public function my_courses($id){

        // $x = Auth::user()->get_cycles_with_money();
        // return $x[0]['project'];
        $cycles_with_money = Auth::user()->get_cycles_with_money();
        //return $cycles_with_money;
        $s1 = Student::find($id);

        $all_cycles = $s1->all_cycles;

        $accepted_requests = $this->get_accepted_requests();

        return view('student.my_courses')->with([ 'accepted_requests' => $accepted_requests , 'cycles_with_money' => $cycles_with_money ] );

    }

    public function my_books($student_id){
        
        $accepted_requests = $this->get_accepted_requests();

        return view('student.my_books')->with('accepted_requests',$accepted_requests);

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

    public function all_books($student_id){
        //return $student_id;
        $student_books = Student::find($student_id)->books;
        $books_ids=[];
        foreach($student_books as $book){
            array_push( $books_ids , $book->id );
        }
        $remaining_free_books = Auth::user()->remaining_free_books;
        $all_books = Book::all();

        return view('student.all_books')->with(['all_books'=>$all_books , 'remaining_free_books'=>$remaining_free_books , 'books_ids'=>$books_ids]);

    }

    public function all_services(){
        $all_services = Service::all();

        return view('student.all_services')->with('all_services',$all_services);

    }

    public function my_accepted_requests(){

        $accepted_requests = $this->get_accepted_requests();
        //return $accepted_requests;

        return view('student.accepted_requests')->with('accepted_requests',$accepted_requests);

    }

    public function get_accepted_requests(){

        $accepted_cycles = CyclePayment::where('student_id',Auth::user()->id)->where('status','accepted')->orderBy('updated_at','desc')->get();
        $accepted_services = ServicePayment::where('student_id',Auth::user()->id)->where('status','accepted')->orderBy('updated_at','desc')->get();
        $accepted_books = BookPayment::where('student_id',Auth::user()->id)->where('status','accepted')->orderBy('updated_at','desc')->get();

        $accepted_requests = [];
        foreach( $accepted_cycles as $x ){
            array_push($accepted_requests, ['data' => $x,'kind' => 'Cycle' , 'money_paid' => $x->amount_paid ]);
        }
        foreach( $accepted_services as $x ){
            array_push($accepted_requests, ['data' => $x,'kind' => 'Service' , 'money_paid' => $x->money_paid ]);
        }
        foreach( $accepted_books as $x ){
            array_push($accepted_requests, ['data' => $x,'kind' => 'Book' , 'money_paid' => $x->money_paid ]);
        }

        return $accepted_requests;

    }

}
