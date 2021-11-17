<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestToProject;
use App\Models\Cycle;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class ProjectsRequestsController extends Controller
{

    public function index(){
        if( Auth::user()->level != 0 && Auth::user()->level != 1 ){
            return redirect()->route('dashboard');
        }
        $all_requests = RequestToProject::where('status','pending')->orderBy('id','desc')->paginate(11);
        //$all_requests = RequestToProject::whereIn('status',['pending','accepted'])->orderBy('id','desc')->paginate(11);
        $all_cycles = Cycle::all();
        //$all_lessons = "Alo";

        //return $all_lessons;
        return view('admin.requests_to_projects.index')->with( [ 'all_requests' => $all_requests , 'all_cycles' => $all_cycles ] ) ;
    }

    public function request_to_join($student_id,$project_id){

        //return [$student_id,$project_id] ;

        $rp = RequestToProject::create([
            'student_id' => $student_id ,
            'project_id' => $project_id ,
            'status' => 'pending' ,
        ]);

        return redirect()->back();

    }

    public function edit(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 1 ){
            return redirect()->route('dashboard');
        }
        //return $request;
        $the_student = Student::find($request->student_id);
        //$the_student->cycle_id = $request->cycle_id;
        $the_student->all_cycles()->attach($request->cycle_id);
        $the_student->save();
        $the_student->make_assignments($request->cycle_id);


        $the_request = RequestToProject::find($request->request_id);
        $the_request->status = 'accepted';
        $the_request->save();

        return redirect()->back();

    }

}
