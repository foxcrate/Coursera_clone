<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cycle;
use App\Models\Semester;
use App\Models\Project;

class CycleController extends Controller
{
    
    public function index(){
        $all_cycles = Cycle::orderBy('id','desc')->paginate(12);

        $projects_ids = Project::where('id' ,'>' ,0)->pluck('id');
        $projects_names = Project::where('id' ,'>' ,0)->pluck('name');
        
        //return $projects;
        return view('admin.cycles.index')->with(['cycles' => $all_cycles , 'projects_ids' => $projects_ids , 'projects_names' => $projects_names]) ;
    }

    public function add(Request $request){

        $new_cycle = Cycle::create([
            'name'=>$request->name,
            'start_date'=>$request->start_date,
        ]);

        $the_project = Project::find($request->project_id);
        $the_project->cycle_id = $new_cycle->id;
        $the_project->save();
        
        return redirect()->back();

    }

    public function edit(Request $request){
        //return $request;
        $my_cycle = Cycle::find($request->id);
        //return $request->name;
        $my_cycle->name = $request->name;
        $my_cycle->start_date = $request->start_date;
        //$my_cycle->project_id = $request->project_id;
        $my_project = Project::find( $request->project_id );
        $my_project->cycle_id = $request->id;
        $my_project->save();
        $my_cycle->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){
        $the_cycle = Cycle::find($request->id);

        $the_project = $the_cycle->project;

        if($the_project == null){
            $the_project_id = 0;
        }else{
            $the_project_id = $the_project->id;
        }

        //dd($the_cycle , $the_project);

        $my_data[] = [
            'name' => $the_cycle->name ,
            'start_date' =>$the_cycle->email  ,
            'project_id' =>$the_project_id ,
        ];

        return $my_data[0];
    }

    public function delete(Request $request){
        $my_cycle = Cycle::find($request->id);
        // $my_cycle = Cycle::destroy($request->id);
        // return $my_cycle;
        $c = $my_cycle->delete();
        //return $c;

        return redirect()->back();
    }

}
