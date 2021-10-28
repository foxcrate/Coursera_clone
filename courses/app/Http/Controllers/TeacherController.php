<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;

class TeacherController extends Controller
{
    
    public function index(){
        $all_teachers = Teacher::all();
        //$all_lessons = "Alo";
        
        //return $all_lessons;
        return view('admin.teachers.index')->with('teachers',$all_teachers) ;
    }

    public function add(Request $request){
        //return $request;

        $new_teacher = Teacher::create([
            'name'=>$request->name,
            'image'=>$request->image,
            'bio'=>$request->bio,
        ]);
        
        return redirect()->back();

    }

    public function edit(Request $request){
        //return $request;
        //echo $request;
        $my_teacher = Teacher::find($request->id);
        //return $request->name;
        $my_teacher->name = $request->name ;
        if($request->has('image')){
            $image = $request->image;
            $code = rand(1111111, 9999999);
            $image_new_name=time().$code ."tp";
            $image->move('uploads/teachers/', $image_new_name);
            $my_teacher->image ='uploads/teachers/' . $image_new_name;
        }
        $my_teacher->bio = $request->bio ;
        $my_teacher->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){

        $the_teacher = Teacher::find($request->id);

        return $the_teacher;

    }

    public function delete(Request $request){
        $my_teacher = Teacher::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_teacher->delete();
        //return $c;

        return redirect()->back();
    }

}
