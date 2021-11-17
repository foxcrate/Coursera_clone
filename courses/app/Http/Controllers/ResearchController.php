<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Research;
use App\Models\Semester;
use Illuminate\Support\Facades\Auth;

class ResearchController extends Controller
{

    public function index(){
        if( Auth::user()->level != 0 && Auth::user()->level != 1 ){
            return redirect()->route('dashboard');
        }
        $all_researches= Research::orderBy('id','desc')->paginate(12);
        $all_semesters = Semester::all();

        //return $all_lessons;
        return view('admin.researches.index')->with( [ 'all_researches' => $all_researches , 'all_semesters' => $all_semesters ] ) ;
    }

    public function submitted(){
        if( Auth::user()->level != 0 && Auth::user()->level != 1 ){
            return redirect()->route('dashboard');
        }

        $all_submitted_researches = Assignment::where('submitted',1)->whereNull('grade')->where('semester_or_course','semester')->orderBy('created_at','desc')->paginate(8);

        return view('admin.researches.submitted_researches')->with('all_submitted_researches',$all_submitted_researches);

    }

    public function submitted_research_edit(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 1 ){
            return redirect()->route('dashboard');
        }

        $the_research = Assignment::find($request->id);
        $the_research->grade = $request->grade ;
        $the_research->save();

        return redirect()->back();

    }

    public function edit(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 1 ){
            return redirect()->route('dashboard');
        }
        //return $request;
        //echo $request;
        $my_research = Research::find($request->id);

        $my_research->name = $request->name ;
        $my_research->description = $request->description ;
        $my_research->semester_id = $request->semester_id ;
        $my_research->save();

        return redirect()->back();
    }

    public function add(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 1 ){
            return redirect()->route('dashboard');
        }

        $new_research = Research::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'semester_id'=>$request->semester_id,
        ]);

        return redirect()->back();

    }

    public function data_to_edit(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 1 ){
            return redirect()->route('dashboard');
        }

        $the_research = Research::find($request->id);

        return $the_research;

    }

    public function submitted_research_data(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 1 ){
            return redirect()->route('dashboard');
        }
        $the_research = Assignment::find($request->id);

        $array[] = [
            'file' => $the_research->file ,
            'grade' =>$the_research->grade  ,
        ];

        return $array[0];
    }

    public function delete(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 1 ){
            return redirect()->route('dashboard');
        }
        $my_research = Research::find($request->id);
        // $my_cycle = Cycle::destroy($request->id);
        // return $my_cycle;
        $p = $my_research->delete();
        //return $c;

        return redirect()->back();
    }

}
