<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Cycle;
use App\Models\Project;
use App\Models\CyclePayment;
use App\Models\Service;
use App\Models\ServicePayment;
use App\Models\Course;

class StudentController extends Controller
{
    
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
            'password'=>$request->password,
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
        $my_student->password = $request->password;
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

        $my_student->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){

        $the_student = Student::find($request->id);

        return $the_student;

    }

    public function delete(Request $request){
        $my_student = Student::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_student->delete();
        //return $c;

        return redirect()->back();
    }


}
