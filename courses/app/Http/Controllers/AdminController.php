<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Calender;
use App\Models\Course;
use App\Models\Cycle;
use App\Models\CourseQuestion;
use App\Models\Student;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\CyclePayment;
use App\Models\Lesson;
use App\Models\LessonQuestion;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\Project;
use App\Models\Service;
use App\Models\Discussion;
use App\Models\ServicePayment;
use App\Models\Admin;
use App\Models\UploadedResearch;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        $all_admins= Admin::orderBy('id','desc')->paginate(10);
        //$all_lessons = "Alo";

        //return $all_lessons;
        return view('admin.admins.index')->with('all_admins',$all_admins) ;

    }

    public function add(Request $request){

        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');

        }
        $new_admin = Admin::create([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'password2'=>$request->password,
            'email'=>$request->email,
            'level'=>$request->role,
        ]);

        return redirect()->back();

    }

    public function edit(Request $request){

        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        //return $request;
        //echo $request;
        $my_admin = Admin::find($request->id);
        $my_admin->name = $request->name ;
        $my_admin->email = $request->email ;
        $my_admin->level = $request->role ;
        $my_admin->password = Hash::make($request->password);
        $my_admin->password2 = $request->password;

        $my_admin->save();

        return redirect()->back();

    }

    public function data_to_edit(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }

        $the_admin = Admin::find($request->id);

        return $the_admin;
    }

    public function delete(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        $my_admin = Admin::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_admin->delete();
        //return $c;

        return redirect()->back();
    }

    public function dashboard(){
        $all_courses = Course::all();
        $num_of_courses = $all_courses->count();

        $all_students = Student::all();
        $num_of_students = $all_students->count();

        $all_projects = Project::all();
        $num_of_projects = $all_projects->count();

        ////
        $all_teachers = Teacher::all();
        $num_of_teachers = $all_teachers->count();

        $all_semesters = Semester::all();
        $num_of_semesters = $all_semesters->count();

        $all_cycles = Cycle::all();
        $num_of_cycles = $all_cycles->count();

        $all_cycle_payments = CyclePayment::all();
        $num_of_cycle_payments = $all_cycle_payments->count();

        $all_service_payments = ServicePayment::all();
        $num_of_service_payments = $all_service_payments->count();

        $all_services = Service::all();
        $num_of_services = $all_services->count();

        $all_books = Book::all();
        $num_of_books = $all_books->count();

        $all_questions = CourseQuestion::all();
        $num_of_questions = $all_questions->count();

        $all_users = User::all();
        $num_of_users = $all_users->count();

        $all_discussions = Discussion::all();
        $num_of_discussions = $all_discussions->count();

        $all_uploaded_researches = UploadedResearch::all();
        $num_of_uploaded_researches = $all_uploaded_researches->count();


        return view('admin/dashboard')->with([ 'num_of_courses'=>$num_of_courses , 'num_of_students'=>$num_of_students , 'num_of_projects'=>$num_of_projects
                                            , 'num_of_teachers'=>$num_of_teachers
                                            , 'num_of_cycles'=>$num_of_cycles , 'num_of_cycle_payments'=>$num_of_cycle_payments
                                             , 'num_of_service_payments'=>$num_of_service_payments , 'num_of_services'=>$num_of_services
                                             , 'num_of_books'=>$num_of_books , 'num_of_questions'=>$num_of_questions
                                            , 'num_of_users'=>$num_of_users , 'num_of_discussions'=>$num_of_discussions
                                             , 'num_of_uploaded_researches'=>$num_of_uploaded_researches , 'num_of_semesters'=>$num_of_semesters ]);
    }

}
