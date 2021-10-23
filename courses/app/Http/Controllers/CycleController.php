<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cycle;
use App\Models\Semester;
use App\Models\Project;

class CycleController extends Controller
{
    
    public function index(){
        $all_cycles = Cycle::all();
        
        //return $all_cycles;
        return view('admin.cycles.index')->with('cycles',$all_cycles) ;
    }

    public function add(Request $request){

        $new_cycle = Cycle::create([
            'name'=>$request->name,
            'start_date'=>$request->start_date,
        ]);
        
        return redirect()->back();

    }

    public function edit(Request $request){
        //echo $request;
        $my_cycle = Cycle::find($request->id);
        //return $request->name;
        $my_cycle->name = $request->name;
        $my_cycle->start_date = $request->start_date;
        $my_cycle->save();

        return response(200);;
    }

    public function delete(Request $request){
        $my_cycle = Cycle::find($request->id);
        // $my_cycle = Cycle::destroy($request->id);
        // return $my_cycle;
        $c = $my_cycle->delete();
        //return $c;

        return response(200);;
    }

}
