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
use App\Models\CyclePayment;
use App\Models\Lesson;
use App\Models\LessonQuestion;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\Project;
use App\Models\Service;
use App\Models\Discussion;
use App\Models\ServicePayment;
use App\Models\UploadedResearch;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function divideAdmins()
    {

        if(Auth::user()->level == 0){
            return view('admin/dashboard');
        }
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
