<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestToProject;
use App\Models\Cycle;
use App\Models\Student;

class ProjectsRequestsController extends Controller
{

    public function index(){
        $all_requests = RequestToProject::orderBy('id','desc')->paginate(10);
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
        //return $request;
        $the_student = Student::find($request->student_id);
        $the_student->cycle_id = $request->cycle_id;
        $the_student->all_cycles()->attach($request->cycle_id);
        $the_student->save();
        $the_request = RequestToProject::find($request->request_id);
        $the_request->status = 'accepted';
        $the_request->save();
        
        return redirect()->back();

    }

}
