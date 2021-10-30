<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    
    public function index(){
        $all_services = Service::all();
        //$all_lessons = "Alo";
        
        //return $all_lessons;
        return view('admin.services.index')->with('services',$all_services) ;
    }

    public function add(Request $request){
        //return $request;
        if($request->has('photo')){
            $image = $request->photo;
            $code = rand(1111111, 9999999);
            $image_new_name=time().$code ."sp";
            $image->move('uploads/services/', $image_new_name);
        }

        $new_service = Service::create([
            'photo'=>'uploads/services/' . $image_new_name,
            'name'=>$request->name,
            'cost'=>$request->cost,
            'summery'=>$request->summery,
            'details'=>$request->details,
        ]);
        
        return redirect()->back();

    }

    public function edit(Request $request){
        //return $request;
        //echo $request;
        $my_service = Service::find($request->id);
        //return $request->name;
        //$my_service->photo = $request->photo ;
        if($request->has('photo')){
            $image = $request->photo;
            $code = rand(1111111, 9999999);
            $image_new_name=time().$code ."sp";
            $image->move('uploads/services/', $image_new_name);
            $my_service->photo ='uploads/services/' . $image_new_name;
        }
        $my_service->name = $request->name ;
        $my_service->cost = $request->cost ;
        $my_service->summery = $request->summery ;
        $my_service->details = $request->details ;
        $my_service->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){

        $the_service = Service::find($request->id);

        return $the_service;

    }

    public function delete(Request $request){
        $my_service = Service::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_service->delete();
        //return $c;

        return redirect()->back();
    }


}
