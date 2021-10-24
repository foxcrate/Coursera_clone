<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $all_projects = Project::all();
        
        //return $all_cycles;
        return view('admin.projects.index')->with('projects',$all_projects) ;
    }

    public function add(Request $request){

        // $new_project = Project::create([
        //     'name'=>$request->name,
        //     'image'=>$request->image,
        //     'type'=>$request->type,
        //     'video'=>$request->video,
        //     'price'=>$request->price,
        //     'summery'=>$request->summery,
        // ]);
        //return $request;

        $new_project = new Project();

        $new_project->name = $request->name;
        //$new_project->image = $request->image;
        if ($request->hasFile('image')) {
            //$destinationPath = 'path/th/save/file/';
            $image = $request->image;
            $code = rand(1111111, 9999999);
            $image_new_name=time().$code ."pp";
            $image->move('uploads/projects/', $image_new_name);
            $new_project->image ='uploads/projects/' . $image_new_name;
        }
        else{
            $new_project->image =null;
        }

        $new_project->type = $request->type;
        //$new_project->video = $request->video;
        if ($request->hasFile('video')) {
            //$destinationPath = 'path/th/save/file/';
            $video = $request->video;
            $code = rand(1111111, 9999999);
            $video_new_name=time().$code ."pp";
            $video->move('uploads/projects/', $video_new_name);
            $new_project->video ='uploads/projects/' . $video_new_name;
        }
        else{
            $new_project->video =null;
        }

        $new_project->price = $request->price;
        $new_project->summery = $request->summery;
        $saved = $new_project->save();

        
        
        if($saved){
            return redirect()->back();
        }else{
            return redirect()->back()->with('error',"Didn't save the record");
        }

    }

    public function edit(Request $request){
        //echo $request;
        $my_project = Project::find($request->id);
        //return $request->name;
        $my_project->name = $request->name;
        //$new_project->image = $request->image;
        $image = $request->image;
        $code = rand(1111111, 9999999);
        $image_new_name=time().$code ."pp";
        $image->store('uploads/projects/', $image_new_name);
        $my_project->image ='uploads/provider/' . $image_new_name;

        $my_project->type = $request->type;
        //$new_project->video = $request->video;
        $video = $request->video;
        $code = rand(1111111, 9999999);
        $video_new_name=time().$code ."pv";
        $video->store('uploads/projects/', $video_new_name);
        $my_project->video ='uploads/provider/' . $video_new_name;

        $my_project->price = $request->price;
        $my_project->summery = $request->summery;
        $my_project->save();

        return response(200);;
    }

    public function delete(Request $request){
        $my_project = Project::find($request->id);
        // $my_cycle = Cycle::destroy($request->id);
        // return $my_cycle;
        $p = $my_project->delete();
        //return $c;

        return response(200);;
    }
}
